<?php
include '../../config/db.php';
header('Content-Type: application/json');

if (isset($_POST['q_id'])) {
    $id = mysqli_real_escape_string($con, $_POST['q_id']);

    $query = "DELETE FROM question WHERE q_id = '$id'";
    if (mysqli_query($con, $query)) {
        echo json_encode(['success' => true, 'message' => 'Question deleted successfully.']);
    } else {
        echo json_encode(['error' => 'Failed to delete Question.']);
    }
} else {
    echo json_encode(['error' => 'Question ID not provided.']);
}

mysqli_close($con);
?>
