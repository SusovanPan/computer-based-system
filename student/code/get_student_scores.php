<?php
session_start();
include '../../config/db.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Not logged in']);
    exit;
}

$std_id = $_SESSION['user_id'];

$query = "SELECT date, score FROM result WHERE std_id = ? ORDER BY date ASC";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $std_id);
$stmt->execute();
$result = $stmt->get_result();

$labels = [];
$data = [];

while ($row = $result->fetch_assoc()) {
    $labels[] = $row['date'];
    $data[] = $row['score'];
}

echo json_encode([
    'labels' => $labels,
    'data' => $data
]);
?>
