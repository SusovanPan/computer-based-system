<?php
// Check connection
session_start();
include("../../config/db.php");

if (!$con) {
    http_response_code(500);
    die("Connection failed: " . mysqli_connect_error());
}

// Escape all input values to prevent SQL injection
$student_id = $_SESSION['user_id'];
$q1 = mysqli_real_escape_string($con, $_POST['design'] ?? '');
$q2 = mysqli_real_escape_string($con, $_POST['interface'] ?? '');
$q3 = mysqli_real_escape_string($con, $_POST['visual'] ?? '');
$q4 = mysqli_real_escape_string($con, $_POST['glitch'] ?? '');
$q5 = mysqli_real_escape_string($con, trim($_POST['remark'] ?? ''));

// Build SQL insert query
$sql = "INSERT INTO feedback (q1_ans, q2_ans, q3_ans, q4_ans, q5_ans,std_id)
        VALUES ('$q1', '$q2', '$q3', '$q4', '$q5','$student_id')";

// Execute the query
if (mysqli_query($con, $sql)) {
    echo "Feedback submitted successfully.";
} else {
    http_response_code(500);
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($con);
?>
