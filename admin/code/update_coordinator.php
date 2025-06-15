<?php
include '../../config/db.php';
header('Content-Type: application/json');

$id = $_POST['ac_id'];
$name = $_POST['ac_name'];
$email = $_POST['ac_email'];
$phoneno = $_POST['ac_phoneno'];
$password = $_POST['ac_password'];
$department=$_POST['ac_department'];

$query = "UPDATE aca_coordinator SET ac_name='$name', ac_email='$email',  ac_password='$password', ac_phoneno='$phoneno',ac_department='$department' WHERE ac_id=$id";
if (mysqli_query($con, $query)) {
    echo json_encode(['status' => 'success', 'message' => 'Coordinator updated successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update Coordinator.']);
}

mysqli_close($con);
?>
