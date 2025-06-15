<?php
include '../../config/db.php';
$id = $_POST['id'];
$query = "SELECT * FROM question,section,course WHERE question.q_course=course.c_id AND question.q_section=section.sec_id AND q_id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);


// Fetch available courses
$course_query = "SELECT * FROM course";
$course_result = mysqli_query($con, $course_query);

// Fetch available section
$section_query = "SELECT * FROM section";
$section_result = mysqli_query($con, $section_query);

?>

<form id="updateQuestionForm">
  <input type="hidden" name="q_id" value="<?php echo $row['q_id']; ?>">

  <div class="form-group mb-3">
    <label>Course</label>
      <select name="q_course" class="form-control" required>
        <option value="">-- Select Course --</option>
        <?php while ($course = mysqli_fetch_assoc($course_result)) { ?>
          <option value="<?php echo $course['c_id']; ?>" 
            <?php if ($course['c_id'] == $row['q_course']) echo "selected"; ?>>
            <?php echo $course['c_name']; ?>
          </option>
        <?php } ?>
      </select>
  </div>


  <div class="form-group mb-3">
    <label>Section</label>
      <select name="q_section" class="form-control" required>
        <option value="">-- Select section --</option>
        <?php while ($section = mysqli_fetch_assoc($section_result)) { ?>
          <option value="<?php echo $section['sec_id']; ?>" 
            <?php if ($section['sec_id'] == $row['q_section']) echo "selected"; ?>>
            <?php echo $section['sec_name']; ?>
          </option>
        <?php } ?>
      </select>
  </div>

  <div class="form-group mb-3">
    <label>Question: </label>
    <input type="text" name="q_text" class="form-control" value="<?php echo htmlspecialchars_decode($row['q_text']); ?>" required>
  </div>

  <div class="form-group mb-3">
    <label>Options1</label>
    <input type="text" name="q_op1" class="form-control" value="<?php echo htmlspecialchars_decode($row['q_op1']); ?>" required>
  </div>
  
  <div class="form-group mb-3">
    <label>Option2: </label>
    <input type="text" name="q_op2" class="form-control" value="<?php echo htmlspecialchars_decode($row['q_op2']); ?>" required>
  </div>

  <div class="form-group mb-3">
    <label>Option3: </label>
    <input type="text" name="q_op3" class="form-control" value="<?php echo htmlspecialchars_decode($row['q_op3']); ?>" required>
  </div>
  
  <div class="form-group mb-3">
    <label>Option4: </label>
    <input type="text" name="q_op4" class="form-control" value="<?php echo htmlspecialchars_decode($row['q_op4']); ?>" required>
  </div>

  <div class="form-group mb-3">
    <label>Answer: </label>
    <input type="text" name="q_ans" class="form-control" value="<?php echo htmlspecialchars_decode($row['q_ans']); ?>" required>
  </div>

  <div class="form-group mb-3">
  <!-- Add other fields as needed -->
  <button type="submit" class="btn btn-primary">Update</button>  
  </div>
  
</form>
<div id="updateResponse"></div>
