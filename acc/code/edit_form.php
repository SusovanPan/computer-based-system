<?php
include '../../config/db.php';
$id = $_POST['id'];
$query = "SELECT * FROM students,course WHERE students.std_stream=course.c_id AND students.std_id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);


// Fetch available courses
$course_query = "SELECT * FROM course";
$course_result = mysqli_query($con, $course_query);
?>

<form id="updateStudentForm">
  <input type="hidden" name="std_id" value="<?php echo $row['std_id']; ?>">
  <div class="form-group mb-3">
    <label>Registration No: </label>
    <input type="text" name="std_regi" class="form-control" value="<?php echo $row['std_registration']; ?>" required>
  </div>
  <div class="form-group mb-3">
    <label>Name</label>
    <input type="text" name="std_name" class="form-control" value="<?php echo $row['std_name']; ?>" required>
  </div>

  <div class="form-group mb-3">
      <label>Course (Stream)</label>
      <select name="std_stream" class="form-control" required>
        <option value="">-- Select Course --</option>
        <?php while ($course = mysqli_fetch_assoc($course_result)) { ?>
          <option value="<?php echo $course['c_id']; ?>" 
            <?php if ($course['c_id'] == $row['std_stream']) echo "selected"; ?>>
            <?php echo $course['c_name']; ?>
          </option>
        <?php } ?>
      </select>
  </div>


  <div class="form-group mb-3">
    <label>Email</label>
    <input type="email" name="std_email" class="form-control" value="<?php echo $row['std_email']; ?>" required>
  </div>
  <div class="form-group mb-3">
    <label>Password</label>
    <input type="text" name="std_password" class="form-control" value="<?php echo $row['std_password']; ?>" required>
  </div>
  <div class="form-group mb-3">
  <!-- Add other fields as needed -->
  <button type="submit" class="btn btn-primary">Update</button>  
  </div>
  
</form>
<div id="updateResponse"></div>
