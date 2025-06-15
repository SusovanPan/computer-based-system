<?php
include '../../config/db.php';

header('Content-Type: application/json');

$id = isset($_POST['id']) ? mysqli_real_escape_string($con, $_POST['id']) : '';

if (empty($id)) {
    echo json_encode(['error' => 'No ID provided']);
    exit;
}

$query = "SELECT * FROM question WHERE q_id = '$id'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $question = mysqli_fetch_assoc($result);

    // Get all courses for stream dropdown
    $coursesQuery = "SELECT * FROM course";
    $coursesResult = mysqli_query($con, $coursesQuery);
    $courses = [];

    if ($coursesResult) {
        while ($course = mysqli_fetch_assoc($coursesResult)) {
            $courses[] = [
                'c_id' => $course['c_id'],
                'c_name' => $course['c_name']
            ];
        }
        mysqli_free_result($coursesResult);
    }

    // Get all section for section dropdown
    $sectionsQuery = "SELECT * FROM section";
    $sectionsResult = mysqli_query($con, $sectionsQuery);
    $sections = [];

    if ($sectionsResult) {
        while ($section = mysqli_fetch_assoc($sectionsResult)) {
            $sections[] = [
                'sec_id' => $section['sec_id'],
                'sec_name' => $section['sec_name']
            ];
        }
        mysqli_free_result($sectionsResult);
    }


    echo json_encode([
        'q_id' => $question['q_id'],
        'q_course' => $question['q_course'],
        'q_section' => $question['q_section'],
        'q_text' => $question['q_text'],
        'q_op1' => $question['q_op1'],
        'q_op2' => $question['q_op2'],
        'q_op3' => $question['q_op3'],
        'q_op4' => $question['q_op4'],
        'q_ans' => $question['q_ans'],
        'courses' => $courses,
        'sections' => $sections
    ]);
} else {
    echo json_encode(['error' => 'No Question found with the provided ID']);
}

mysqli_free_result($result);
mysqli_close($con);
?>
