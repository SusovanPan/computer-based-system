<?php
include '../../config/db.php';
header('Content-Type: application/json');

$query = "SELECT std_id AS id, std_name AS name FROM students ORDER BY std_name";
$result = mysqli_query($con, $query);

$students = [];
while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
}
echo json_encode($students);
?>
