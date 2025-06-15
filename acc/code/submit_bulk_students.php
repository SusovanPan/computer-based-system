<?php
require '../../config/db.php'; // DB connection
require '../../vendor/autoload.php'; // PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

function insertStudent($con, $data) {
    if (count($data) >= 5) {
        // Sanitize inputs
        $course         = mysqli_real_escape_string($con, htmlspecialchars(trim($data[0])));
        $registrationNo        = mysqli_real_escape_string($con, htmlspecialchars(trim($data[1])));
        $name       = mysqli_real_escape_string($con, htmlspecialchars(trim($data[2])));
        $email        = mysqli_real_escape_string($con, htmlspecialchars(trim($data[3])));
        $password        = mysqli_real_escape_string($con, htmlspecialchars(trim($data[4])));
        

        // Direct query execution
        $query="INSERT INTO students(std_registration,std_name,std_stream,std_email,std_password,std_createdby) VALUES('$registrationNo','$name','$course','$email','$password',1)";

        return mysqli_query($con, $query);
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csvFile'])) {
    $file = $_FILES['csvFile'];
    $fileName = $file['name'];
    $fileTmp = $file['tmp_name'];
    $fileType = mime_content_type($fileTmp);
    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowedTypes = [
        'text/csv',
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];
    $allowedExt = ['csv', 'xls', 'xlsx'];

    if (!in_array($fileType, $allowedTypes) || !in_array($ext, $allowedExt)) {
        http_response_code(400);
        echo "Invalid file type. Only CSV, XLS, and XLSX files are allowed.";
        exit;
    }

    if ($con->connect_error) {
        http_response_code(500);
        echo "Database connection failed.";
        exit;
    }

    $count = 0;

    if ($ext === 'csv') {
        if (($handle = fopen($fileTmp, "r")) !== FALSE) {
            $isFirstRow = true;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($isFirstRow) {
                    $isFirstRow = false; // skip header
                    continue;
                }
                if (empty(trim($data[0]))) 
                {
                    break; // Exit loop if course column is empty
                }
                if (insertStudent($con, $data)) {
                    $count++;
                }
            }
            fclose($handle);
        }
    } else {
        $spreadsheet = IOFactory::load($fileTmp);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        foreach ($rows as $index => $data) {
            if ($index === 0) continue; // skip header
            if (empty(trim($data[0]))) 
            {
                break; // Exit loop if course column is empty
            }
            if (insertStudent($con, $data)) {
                $count++;
            }
        }
    }

    echo "$count Students Data Uploaded Successfully!";
    $con->close();
} else {
    http_response_code(400);
    echo "No file uploaded.";
}
?>
