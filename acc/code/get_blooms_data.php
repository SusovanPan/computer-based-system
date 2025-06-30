<?php
include '../../config/db.php';

$sec_id = isset($_GET['sec_id']) ? intval($_GET['sec_id']) : 0;

$query = "
    SELECT bl.b_level AS level, COUNT(q.q_id) AS total
    FROM question q
    JOIN blooms_level bl ON q.q_blooms_level = bl.b_id
    " . ($sec_id ? "WHERE q.q_section = $sec_id " : "") . "
    GROUP BY bl.b_level
";

$result = mysqli_query($con, $query);

$labels = [];
$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['level'];
    $data[] = $row['total'];
}

echo json_encode([
    'labels' => $labels,
    'data' => $data
]);
