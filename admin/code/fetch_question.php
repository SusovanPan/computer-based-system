<?php
include '../../config/db.php';

$query = "SELECT * FROM question,course,section where q_course=c_id and q_section=sec_id";
$result = mysqli_query($con, $query);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        $row['q_id'],
        $row['c_name'],
        $row['sec_name'],
        $row['q_text'],
        $row['q_op1'],
        $row['q_op2'],
        $row['q_op3'],
        $row['q_op4'],
        $row['q_ans'],
        '<a href="#" class="edit-Btn-question" data-id="' . $row['q_id'] . '"><i class="fas fa-edit text-warning"></i></a>
         <a href="#" class="delete-question" data-id="' . $row['q_id'] . '"><i class="fas fa-trash-alt" style="color:red"></i></a>'
    ];
}

echo json_encode(['data' => $data]);
?>
