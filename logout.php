<?php
session_start();
session_unset();
session_destroy();
echo 'success'; // AJAX will receive this
//header("Location: login.php"); // Redirect to login page
?>