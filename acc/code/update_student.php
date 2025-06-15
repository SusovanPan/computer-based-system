<?php
include '../../config/db.php';
header('Content-Type: application/json');

$id = $_POST['std_id'];
$registration = $_POST['std_registration'];
$name = $_POST['std_name'];
$email = $_POST['std_email'];
$password = $_POST['std_password'];
$stream=$_POST['std_stream'];

$query = "UPDATE students SET std_registration='$registration', std_name='$name', std_stream='$stream', std_email='$email', std_password='$password' WHERE std_id=$id";
//mysqli_query($con, $query);
if (mysqli_query($con, $query)) {
    echo json_encode(['status' => 'success', 'message' => 'Student updated successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update student.']);
}

mysqli_close($con);
?>
