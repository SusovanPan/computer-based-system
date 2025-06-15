<?php

include '../../config/db.php';


// Allow only POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get and sanitize POST data
    $regNumber = htmlspecialchars(trim($_POST['regNumber'] ?? ''));
    $name      = htmlspecialchars(trim($_POST['name'] ?? ''));
    $stream    = htmlspecialchars(trim($_POST['stream'] ?? ''));
    $email     = htmlspecialchars(trim($_POST['email'] ?? ''));
    $password  = htmlspecialchars(trim($_POST['password'] ?? ''));

    // Basic validation
    if (empty($regNumber) || empty($name) || empty($stream) || empty($email) || empty($password)) {
        http_response_code(400); // Bad Request
        echo "Please fill in all the fields.";
        exit;
    }
    
    // Check if the registration number already exists
    $query = "SELECT COUNT(*) FROM students WHERE std_registration = '$regNumber'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        http_response_code(500);
        echo "Error checking registration number: " . mysqli_error($con);
        exit;
    }

    $exists = mysqli_fetch_row($result)[0];

    if ($exists) {
        http_response_code(409); // Conflict
        echo "Registration number '$regNumber' already exists.";
        exit;
    }

    // Insert into database
    $query = "INSERT INTO students (std_registration, std_name, std_stream, std_email, std_password) VALUES ('$regNumber', '$name', '$stream', '$email', '$password')";
    $insertResult = mysqli_query($con, $query);

    if (!$insertResult) {
        http_response_code(500);
        echo "Error inserting student: " . mysqli_error($con);
        exit;
    }

    echo "Student '$name' registered successfully!";
} else {
    http_response_code(405); // Method not allowed
    echo "Invalid request method.";
}

// Close the connection
mysqli_close($con);

?>
