<?php
session_start();
include("../../config/db.php"); // db connection //

header('Content-Type: application/json');

$response = [];

$studentId = $_SESSION['user_id'];

$answers = isset($_POST['answer']) ? $_POST['answer'] : [];


$date=date('Y-m-d');

// Loop through submitted answers and insert them into the answer table
foreach ($answers as $qId => $answerData) {
    $qId = mysqli_real_escape_string($con, $qId);
    $qAnswer = isset($answerData['correct']) ? mysqli_real_escape_string($con, htmlspecialchars($answerData['correct'])) : '';

    $insertQuery = "INSERT INTO answer (std_id, q_id, q_answer,date) 
                    VALUES ('$studentId', '$qId', '$qAnswer','$date')";
    mysqli_query($con, $insertQuery);
}

$count=0;
$scoreQuery="SELECT * FROM question,answer,students WHERE question.q_id=answer.q_id AND students.std_id=answer.std_id AND students.std_id='$studentId' AND answer.date='$date'";
$checkResult=mysqli_query($con,$scoreQuery);
if(mysqli_num_rows($checkResult)>0){
    while($row=mysqli_fetch_assoc($checkResult)){
        if($row['q_ans']==$row['q_answer'])
        {
            $count=$count+1;
        }
    }
}
//$date=date('Y-m-d');

$insertScore="INSERT into result(std_id,score,date) VALUES('$studentId','$count','$date')";
mysqli_query($con,$insertScore);

$response['res'] = "success";
echo json_encode($response);
exit;
?>
