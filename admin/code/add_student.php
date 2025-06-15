<?php
include '../../config/db.php';

require '../../vendor/autoload.php'; // for PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

if(isset($_POST['saveStudent']))
{
	$reg=$_POST['regNo'];
	$sname=$_POST['stuName'];
	$stream=$_POST['stream'];
	$email=$_POST['stuEmail'];
	$pass=$_POST['stuPass'];


	$query="INSERT INTO students(std_registration,std_name,std_stream,std_email,std_password,std_createdby) VALUES('$reg','$sname','$stream','$email','$pass',1)";
	$result = mysqli_query($con, $query) or die ("Query Unsuccessful.");

	 header("Location: http://localhost/cbt/admin/addstudents.php");
}


if(isset($_POST['import']))
{
	$file = $_FILES['excel_file']['tmp_name'];

    if (!empty($file)) {
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Assuming first row is header
        for ($i = 1; $i < count($rows); $i++)
        {
            
            $reg = $con->real_escape_string($rows[$i][0]); 
            $sname = $con->real_escape_string($rows[$i][1]);
           $stream=$con->real_escape_string($rows[$i][2]);
           //$exmne_Registration = $conn->real_escape_string($rows[$i][3]);
            $email = $con->real_escape_string($rows[$i][3]);
            $pass= $con->real_escape_string($rows[$i][4]);


            $query="INSERT INTO students(std_registration,std_name,std_stream,std_email,std_password,std_createdby) VALUES('$reg','$sname','$stream','$email','$pass',1)";
			$result = mysqli_query($con, $query) or die ("Query Unsuccessful.");

	 		header("Location: http://localhost/cbt/admin/addbulkstudents.php");
        }

        // echo "<script>alert('Students imported successfully!'); window.location='../home.php';</script>";
        //("Location: http://localhost/cee/adminpanel/admin/home.php");
    }
}


?>