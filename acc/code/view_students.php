<?php
include '../../config/db.php';
$id = $_POST['id'];
$query = "SELECT * FROM students JOIN course ON c_id = std_stream WHERE std_id = $id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

echo "<p><strong>Name:</strong> {$row['std_name']}</p>
      <p><strong>Email:</strong> {$row['std_email']}</p>
      <p><strong>Stream:</strong> {$row['c_name']}</p>
      <p><strong>Registration:</strong> {$row['std_registration']}</p>";
?>
