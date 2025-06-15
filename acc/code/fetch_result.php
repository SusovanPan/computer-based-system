<?php
include '../../config/db.php';

$query = "SELECT * FROM students,result WHERE students.std_id=result.std_id";
$result = mysqli_query($con, $query);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        $row['std_name'],
        $row['score'],
        $row['date'],
    ];
}

echo json_encode(['data' => $data]);
?>
