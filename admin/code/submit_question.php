<?php

include '../../config/db.php';


// Allow only POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get and sanitize POST data
    $section = htmlspecialchars(trim($_POST['section'] ?? ''));
    $course      = htmlspecialchars(trim($_POST['course'] ?? ''));
    $question    = htmlspecialchars(trim($_POST['question'] ?? ''));
    $optionA     = htmlspecialchars(trim($_POST['optionA'] ?? ''));
    $optionB  = htmlspecialchars(trim($_POST['optionB'] ?? ''));
    $optionC    = htmlspecialchars(trim($_POST['optionC'] ?? ''));
    $optionD     = htmlspecialchars(trim($_POST['optionD'] ?? ''));
    $answer  = htmlspecialchars(trim($_POST['answer'] ?? ''));

    // Basic validation
    if (empty($section) || empty($course) || empty($question) || empty($optionA) || empty($optionB) || empty($optionC) || empty($optionD) || empty($answer)  )  {
        http_response_code(400); // Bad Request
        echo "Please fill in all the fields.";
        exit;
    }

    // Insert into database
    $query = "INSERT INTO question (q_course, q_section, q_text, q_op1, q_op2, q_op3, q_op4, q_ans) VALUES ('$course', '$section', '$question', '$optionA', '$optionB', '$optionC', '$optionD', '$answer')";
    $insertResult = mysqli_query($con, $query);

    if (!$insertResult) {
        http_response_code(500);
        echo "Error inserting student: " . mysqli_error($mysqli);
        exit;
    }

    echo "Question uploaded successfully!";
} else {
    http_response_code(405); // Method not allowed
    echo "Invalid request method.";
}

// Close the connection
mysqli_close($con);

?>
