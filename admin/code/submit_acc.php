<?php
include '../../config/db.php';


// Allow only POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get and sanitize POST data
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $phoneno      = htmlspecialchars(trim($_POST['phoneno'] ?? ''));
    $email   = htmlspecialchars(trim($_POST['email'] ?? ''));
    $password     = htmlspecialchars(trim($_POST['password'] ?? ''));
    $school  = htmlspecialchars(trim($_POST['school'] ?? ''));


    // Basic validation
    if (empty($name) || empty($phoneno) || empty($email) || empty($password) || empty($school)) {
        http_response_code(400); // Bad Request
        echo "Please fill in all the fields.";
        exit;
    }

    // Insert into database
    $query = "INSERT INTO aca_coordinator (ac_name, ac_email, ac_password, ac_phoneno, ac_department, ac_createdby ) VALUES ('$name', '$email','$password', '$phoneno', '$school',1)";
    $insertResult = mysqli_query($con, $query);

    if (!$insertResult) {
        http_response_code(500);
        echo "Error inserting student: " . mysqli_error($con);
        exit;
    }

    echo "'$name' registered successfully!";
} else {
    http_response_code(405); // Method not allowed
    echo "Invalid request method.";
}

// Close the connection
mysqli_close($con);

?>
