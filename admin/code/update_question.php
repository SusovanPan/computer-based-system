<?php
include '../../config/db.php';
header('Content-Type: application/json');

$id = $_POST['q_id'];
$course = $_POST['q_course'];
$section = $_POST['q_section'];
$text = $_POST['q_text'];
$op1 = $_POST['q_op1'];
$op2=$_POST['q_op2'];
$op3 = $_POST['q_op3'];
$op4 = $_POST['q_op4'];
$ans=$_POST['q_ans'];

$query = "UPDATE question SET q_course ='$course',q_section = '$section',q_text = '$text',q_op1 = '$op1',q_op2 ='$op2',q_op3 ='$op3',q_op4 ='$op4',q_ans ='$ans' WHERE q_id = $id";

if (mysqli_query($con, $query)) {
    echo json_encode(['status' => 'success', 'message' => 'Question updated successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update Question.']);
}

mysqli_close($con);
?>
