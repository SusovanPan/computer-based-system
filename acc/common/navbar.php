<!-- Sidebar Navigation -->
<div class="sidebar">
    <ul>
        <a href="index.php"><?php echo $_SESSION['user_name']; ?></a>
    </ul>
    
    <details open>
        <summary>Students</summary>
        <ul>
            <a href="addStudents.php">Add Students</a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#studentModal">Upload Students</a>
            <a href="viewStudents.php">View Students</a>
        </ul>
    </details>
    <details open>
        <summary>Questions</summary>
        <ul>
            <a href="addQuestion.php">Add Questions</a>
            <a href="#" data-bs-toggle="modal" data-bs-target="#questionModal">Upload Questions</a>
            <a href="viewQuestions.php">View Questions</a>        
        </ul>
    </details>
    <details open>
        <summary>Result</summary>
        <ul>
            <a href="result.php">View Result</a>
            <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Upload Questions</a>-->
        </ul>
    </details>

    <details open>
        <summary>Analysis</summary>
        <ul>
            <a href="analysis.php">Analysis</a>
            <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Upload Questions</a>-->
        </ul>
    </details>
    <form class="logoutform" id="logoutForm">
        <button type="submit" class="logout-btn" id="logoutBtn">Logout</button>
    </form>
</div>
