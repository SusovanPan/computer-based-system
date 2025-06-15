<?php
session_start();
header('Content-Type: application/json');
include 'config/db.php'; // your database connection

if (!isset($_POST['role'], $_POST['username'], $_POST['password'])) {
    echo json_encode(['status' => 'error', 'message' => 'Incomplete request.']);
    exit;
}

$role = $_POST['role'];
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);



switch ($role) {
    case 'Admin':
        $query = "SELECT * FROM admin WHERE a_name='$username' AND a_password='$password'";
        break;
    case 'Acc':
        $query = "SELECT * FROM aca_coordinator WHERE ac_email='$username' AND ac_password='$password'";
        break;
    case 'Student':
        $query = "SELECT * FROM students WHERE std_registration='$username' AND std_password='$password'";
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid role.']);
        exit;
}

$result = mysqli_query($con, $query);

if (!$result) {
    echo json_encode(['status' => 'error', 'message' => 'Server error: ' . mysqli_error($con)]);
    exit;
}

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;

    // Store appropriate ID based on role
    switch ($role) {
        case 'Admin':
            $_SESSION['user_id'] = $row['a_id'];
            $_SESSION['user_name'] = $row['a_name'];
            break;
        case 'Acc':
            $_SESSION['user_id'] = $row['ac_id'];
            $_SESSION['user_name'] = $row['ac_name'];
            break;
        case 'Student':
            $_SESSION['user_id'] = $row['std_id'];
            $_SESSION['user_name'] = $row['std_name'];
            $_SESSION['user_stream'] = $row['std_stream']; 
            break;
    }
    
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid username or password.']);
}
?>
