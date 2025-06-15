<!-- Sidebar Navigation -->
<div class="sidebar">
    <ul>
        <a href="index.php"><span style="font-size: 20px; letter-spacing: 2px;"><b><?php echo $_SESSION['user_name']; ?></b></span></a>
        <!-- Exams Alert -->
        
        <a href="#" id="exam-alert">Exams</a>
        <a href="result.php">Results</a>
        <a href="feedback.php">Feedback</a>
    </ul>
    <form class="logoutform" id="logoutForm">
        <button type="submit" class="logout-btn" id="logoutBtn">Logout</button>
    </form>
</div>
