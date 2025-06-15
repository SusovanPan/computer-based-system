<?php
include '../../config/db.php';

$query = "SELECT * FROM aca_coordinator, school WHERE ac_department = sch_id";
$result = mysqli_query($con, $query);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        $row['ac_name'],
        $row['ac_email'],
        $row['ac_phoneno'],
        $row['ac_password'],
        $row['sch_name'],
        '<a href="#" class="view-btn-acc" data-id="' . $row['ac_id'] . '"><i class="fas fa-eye"></i></a>
         <a href="#" class="edit-btn-acc" data-id="' . $row['ac_id'] . '"><i class="fas fa-edit text-warning"></i></a>
         <a href="#" class="delete-acc" data-id="' . $row['ac_id'] . '"><i class="fas fa-trash-alt" style="color:red"></i></a>'
    ];
}

echo json_encode(['data' => $data]);
?>
