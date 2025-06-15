<?php

include '../../config/db.php';

require '../../vendor/autoload.php'; // for PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

if(isset($_POST['saveQuestion']))
{
	$course=$_POST['course'];
	$section=$_POST['section'];
	$question=$_POST['question'];
	$option1=$_POST['option_A'];
	$option2=$_POST['option_B'];
	$option3=$_POST['option_C'];
	$option4=$_POST['option_D'];
	$answer=$_POST['answer'];

	$query="INSERT INTO question(q_course,q_section,q_text,q_op1,q_op2,q_op3,q_op4,q_ans) VALUES('$course','$section','$question','$option1','$option2','$option3','$option4','$answer')";
	$result = mysqli_query($con, $query) or die ("Query Unsuccessful.");

	header("Location: http://localhost/cbt/admin/addquestions.php");
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
            
            $course = $con->real_escape_string($rows[$i][0]); 
            $section = $con->real_escape_string($rows[$i][1]);
            $question=addslashes($con->real_escape_string($rows[$i][2]));
            $option1 = addslashes($con->real_escape_string($rows[$i][3]));
            $option2= addslashes($con->real_escape_string($rows[$i][4]));
            $option3= addslashes($con->real_escape_string($rows[$i][5]));
            $option4= addslashes($con->real_escape_string($rows[$i][6]));
            $answer= addslashes($con->real_escape_string($rows[$i][7]));


            $query="INSERT INTO question(q_course,q_section,q_text,q_op1,q_op2,q_op3,q_op4,q_ans) VALUES('$course','$section','$question','$option1','$option2','$option3','$option4','$answer')";
			$result = mysqli_query($con, $query) or die ("Query Unsuccessful.");

	 		header("Location: http://localhost/cbt/admin/addbulkquestions.php");
        }

        // echo "<script>alert('Students imported successfully!'); window.location='../home.php';</script>";
        //("Location: http://localhost/cee/adminpanel/admin/home.php");
    }
}

?>