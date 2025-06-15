<?php
session_start();
include("../../config/db.php"); // db connection //

$student_id = $_SESSION['user_id']; // Assumes student is logged in
$student_stream = $_SESSION['user_stream']; // Student's Stream
$date=date('Y-m-d');

$checkExam="SELECT * FROM question where q_course='$student_stream'";
$resultCheck=mysqli_query($con,$checkExam);
if(mysqli_num_rows($resultCheck)>0)
{
    // Check if student has taken the exam
    $sql = "SELECT * FROM result WHERE std_id = $student_id and date='$date'";
    $result = mysqli_query($con, $sql);

    if (!$result) {

        $res=array("res" => "error");

        // echo json_encode(['status' => 'error', 'message' => 'Query failed']);

    } elseif (mysqli_num_rows($result) > 0) {

        $res=array("res" => "taken");
        // echo json_encode(['status' => 'taken']);

    } else {

        $res=array("res" => "not_taken");
        // echo json_encode(['status' => 'not_taken']);
        
    }    
}
else{
    $res=array("res" => "no_exam");
}
echo json_encode($res);
// Close connection
mysqli_close($con);
?>
