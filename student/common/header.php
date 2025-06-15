<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    header("Location: http://localhost/cbt/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBT | Student</title>

    <!-- Link your stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Optional: Google Fonts or Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

</head>
<body onload="updateDateTime()">
    <?php include '../config/db.php'; ?> 
<div class="page-container">

    <!-- Site Header -->
    <div class="header">
        <div class="logo">
            <img src="img/logo.jpg" alt="Logo">
        </div>
        <div class="welcome">Welcome to ILEAD </br> Computer Based Testing System</div>
        <div class="date" id="datetime"></div>
    </div>

    <!-- Begin Content Area -->
    <div class="content-area">
