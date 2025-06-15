<?php
include '../../config/db.php';

$query = "SELECT * FROM students, course WHERE c_id = std_stream";
$result = mysqli_query($con, $query);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        $row['std_registration'],
        $row['std_name'],
        $row['c_name'],
        $row['std_email'],
        $row['std_password'],
        '<a href="#" class="view-btn" data-id="' . $row['std_id'] . '"><i class="fas fa-eye"></i></a>
         <a href="#" class="edit-Btn" data-id="' . $row['std_id'] . '"><i class="fas fa-edit text-warning"></i></a>
         <a href="#" class="delete-student" data-id="' . $row['std_id'] . '"><i class="fas fa-trash-alt" style="color:red"></i></a>'
    ];
}

echo json_encode(['data' => $data]);
?>
