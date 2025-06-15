<?php
include '../../config/db.php';
$id = $_POST['id'];
$query = "SELECT * FROM aca_coordinator, admin, school WHERE sch_id = ac_department AND ac_createdby=a_id AND ac_id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);


// Fetch available courses
$school_query = "SELECT * FROM school";
$school_result = mysqli_query($con, $school_query);
?>

<form id="updateAccForm">
  <input type="hidden" name="ac_id" value="<?php echo $row['ac_id']; ?>">
  <div class="form-group mb-3">
    <label>Name : </label>
    <input type="text" name="ac_name" class="form-control" value="<?php echo $row['ac_name']; ?>" required>
  </div>

  <div class="form-group mb-3">
    <label>Phone No : </label>
    <input type="text" name="ac_phoneno" class="form-control" value="<?php echo $row['ac_phoneno']; ?>" required>
  </div>


  <div class="form-group mb-3">
    <label>E-Mail : </label>
    <input type="text" name="ac_email" class="form-control" value="<?php echo $row['ac_email']; ?>" required>
  </div>

  <div class="form-group mb-3">
      <label>School</label>
      <select name="ac_school" class="form-control" required>
        <option value="">-- Select School --</option>
        <?php while ($school = mysqli_fetch_assoc($school_result)) { ?>
          <option value="<?php echo $school['sch_id']; ?>" 
            <?php if ($school['sch_id'] == $row['ac_department']) echo "selected"; ?>>
            <?php echo $school['sch_name']; ?>
          </option>
        <?php } ?>
      </select>
  </div>


  <!-- <div class="form-group mb-3">
    <label>Email</label>
    <input type="email" name="std_email" class="form-control" value="<?php echo $row['std_email']; ?>" required>
  </div> -->
  <div class="form-group mb-3">
    <label>Password</label>
    <input type="text" name="ac_password" class="form-control" value="<?php echo $row['ac_password']; ?>" required>
  </div>
  <div class="form-group mb-3">
  <!-- Add other fields as needed -->
  <button type="submit" class="btn btn-primary">Update</button>  
  </div>
  
</form>
<div id="updateResponse"></div>
