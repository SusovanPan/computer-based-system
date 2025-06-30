<?php
include '../../config/db.php';

$sec_id = isset($_GET['sec_id']) ? intval($_GET['sec_id']) : 0;

$query = "
    SELECT ql.d_level AS level, COUNT(q.q_id) AS total
    FROM question q
    JOIN q_level ql ON q.q_level = ql.d_id
    " . ($sec_id ? "WHERE q.q_section = $sec_id " : "") . "
    GROUP BY ql.d_level
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
?>
