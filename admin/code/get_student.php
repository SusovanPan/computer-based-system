<?php
include '../../config/db.php';

header('Content-Type: application/json');

$id = isset($_POST['id']) ? mysqli_real_escape_string($con, $_POST['id']) : '';

if (empty($id)) {
    echo json_encode(['error' => 'No ID provided']);
    exit;
}

$query = "SELECT * FROM students WHERE std_id = '$id'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $student = mysqli_fetch_assoc($result);

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

    echo json_encode([
        'std_id' => $student['std_id'],
        'std_registration' => $student['std_registration'],
        'std_name' => $student['std_name'],
        'std_email' => $student['std_email'],
        'std_password' => $student['std_password'],
        'std_stream' => $student['std_stream'],
        'courses' => $courses
    ]);
} else {
    echo json_encode(['error' => 'No student found with the provided ID']);
}

mysqli_free_result($result);
mysqli_close($con);
?>
