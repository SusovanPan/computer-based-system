<?php
include '../../config/db.php';
header('Content-Type: application/json');

if (isset($_POST['ac_id'])) {
    $id = mysqli_real_escape_string($con, $_POST['ac_id']);

    $query = "DELETE FROM aca_coordinator WHERE ac_id = '$id'";
    if (mysqli_query($con, $query)) {
        echo json_encode(['success' => true, 'message' => 'Coordinator deleted successfully.']);
    } else {
        echo json_encode(['error' => 'Failed to delete Coordinator.']);
    }
} else {
    echo json_encode(['error' => 'Coordinator ID not provided.']);
}

mysqli_close($con);
?>
