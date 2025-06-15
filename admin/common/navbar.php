<!-- Sidebar Navigation -->
<div class="sidebar">
    <ul>
        <a href="index.php"><?php echo $_SESSION['user_name']; ?></a>
    </ul>
    
    <details open>
        <summary>Students</summary>
            <ul>
                <a href="addstudents.php" id="">Add Student</a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#studentModal">Upload Students</a>
                <a href="viewstudents.php" >View Student</a>
            </ul>
    </details>

    <details open>
        <summary>Co-Ordinator</summary>
        <ul>
            <a href="addacademic-coordinator.php" id="">Add Co-Ordinator</a>
            <a href="viewacademic-coordinator.php" id="">View Co-Ordinator</a>
        </ul>
    </details>

    <details open>
        <summary>Questions</summary>
        <ul>
            <a href="addquestions.php" id="">Add Question</a>
             <a href="#" data-bs-toggle="modal" data-bs-target="#questionModal">Upload Questions</a>
            <a href="viewquestions.php" id="">View Questions</a>
        </ul>
    </details>
        
    <details open>
        <summary>Result</summary>
        <ul>
            <a href="result.php" id="">Result</a>
            <!-- <a href="allresult.php" id="">All Result</a> -->
        </ul>
    </details>

    <form class="logoutform" id="logoutForm">
        <button type="submit" class="logout-btn" id="logoutBtn">Logout</button>
    </form>
</div>


