<?php
include '../../config/db.php'; // Ensure correct path

header('Content-Type: application/json');

$date = isset($_GET['date']) ? mysqli_real_escape_string($con, $_GET['date']) : '';

$query = "
  SELECT s.std_name AS name, r.score
  FROM result r
  JOIN students s ON r.std_id = s.std_id
  " . ($date ? "WHERE r.date = '$date'" : "") . "
";

$result = mysqli_query($con, $query);

if (!$result) {
  echo json_encode(['error' => 'Query failed: ' . mysqli_error($con)]);
  exit;
}

$labels = [];
$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['name'];
    $data[] = (int)$row['score'];
}

echo json_encode([
    'labels' => $labels,
    'data' => $data
]);
?>
