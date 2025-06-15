<?php
require '../../config/db.php'; // DB connection
require '../../vendor/autoload.php'; // PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

function deleteQuestions($con)
{
    $deleteQuery="DELETE FROM question";
    return mysqli_query($con,$deleteQuery);
}

function insertQuestion($con, $data) {
    if (count($data) >= 8) {
        // Sanitize inputs
        $course         = $data[0];
        $section        = $data[1];
        $question       = htmlspecialchars(trim($data[2]));
        $option1        = htmlspecialchars(trim($data[3]));
        $option2        = htmlspecialchars(trim($data[4]));
        $option3        = htmlspecialchars(trim($data[5]));
        $option4        = htmlspecialchars(trim($data[6]));
        $correct_answer = htmlspecialchars(trim($data[7]));

        // Direct query execution
        $sql = "INSERT INTO question (q_course, q_section, q_text, q_op1, q_op2, q_op3, q_op4, q_ans)
                VALUES ('$course','$section','$question', '$option1', '$option2', '$option3', '$option4', '$correct_answer')";

        return mysqli_query($con, $sql);
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
        deleteQuestions($con); // delete all the questions from table first //
        if (($handle = fopen($fileTmp, "r")) !== FALSE) {
            $isFirstRow = true;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($isFirstRow)
                {
                    $isFirstRow = false; // skip header
                    continue;
                }
                if (empty(trim($data[0]))) 
                {
                    break; // Exit loop if course column is empty
                }
                if (insertQuestion($con, $data)) {
                    $count++;
                }
            }
            fclose($handle);
        }
    } else {
        deleteQuestions($con); // delete all the questions from table first //
        $spreadsheet = IOFactory::load($fileTmp);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        foreach ($rows as $index => $data) {
            if ($index === 0) continue; // skip header
            if (empty(trim($data[0]))) 
            {
                break; // Exit loop if course column is empty
            }
            if (insertQuestion($con, $data)) {
                $count++;
            }
        }
    }

    echo "$count Questions uploaded successfully!";
    $con->close();
} else {
    http_response_code(400);
    echo "No file uploaded.";
}
?>