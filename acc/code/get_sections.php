<?php
include '../../config/db.php';

$query = "SELECT sec_id, sec_name FROM section";
$result = mysqli_query($con, $query);

$sections = [];

while ($row = mysqli_fetch_assoc($result)) {
    $sections[] = [
        'sec_id' => $row['sec_id'],
        'sec_name' => $row['sec_name']
    ];
}

echo json_encode($sections);

?>
