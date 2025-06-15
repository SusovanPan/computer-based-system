<?php
//session_start();
include("../../config/db.php"); // adjust as needed

header('Content-Type: application/json');

$response = [];

// if (!isset($_SESSION['student_id'])) {
//     $response['res'] = "failed";
//     echo json_encode($response);
//     exit;
// }

//$studentId = $_SESSION['student_id'];

$studentId=10;
$answers = isset($_POST['answer']) ? $_POST['answer'] : [];

// Check if already taken (based on any existing answer by this student)
$checkQuery = "SELECT * FROM answer WHERE std_id = '$studentId' LIMIT 1";
$checkResult = mysqli_query($con, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    $response['res'] = "alreadyTaken";
    echo json_encode($response);
    exit;
}

// Loop through submitted answers and insert them into the answer table
foreach ($answers as $qId => $answerData) {
    $qId = mysqli_real_escape_string($con, $qId);
    $qAnswer = isset($answerData['correct']) ? mysqli_real_escape_string($con, $answerData['correct']) : '';

    $insertQuery = "INSERT INTO answer (std_id, q_id, q_answer) 
                    VALUES ('$studentId', '$qId', '$qAnswer')";
    mysqli_query($con, $insertQuery);
}

$response['res'] = "success";
echo json_encode($response);
exit;
?>
