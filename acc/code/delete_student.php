<?php
include '../../config/db.php';
header('Content-Type: application/json');

if (isset($_POST['std_id'])) {
    $id = mysqli_real_escape_string($con, $_POST['std_id']);

    $query = "DELETE FROM students WHERE std_id = '$id'";
    if (mysqli_query($con, $query)) {
        echo json_encode(['success' => true, 'message' => 'Student deleted successfully.']);
    } else {
        echo json_encode(['error' => 'Failed to delete student.']);
    }
} else {
    echo json_encode(['error' => 'Student ID not provided.']);
}

mysqli_close($con);
?>
