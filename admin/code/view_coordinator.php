<?php
include '../../config/db.php';
$id = $_POST['id'];
$query = "SELECT * FROM aca_coordinator JOIN school ON sch_id = ac_department WHERE ac_id = $id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

echo "<p><strong>Name:</strong> {$row['ac_name']}</p>
      <p><strong>Email:</strong> {$row['ac_email']}</p>
      <p><strong>Phone No:</strong> {$row['ac_phoneno']}</p>
      <p><strong>Password:</strong> {$row['ac_password']}</p>
      <p><strong>Registration:</strong> {$row['sch_name']}</p>";
?>
