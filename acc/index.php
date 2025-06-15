<?php include 'common/header.php'; ?>
<?php include 'common/navbar.php'; ?>

<!-- Main Content Area -->
<div class="main-content">
    <h1>Dashboard</h1>
    <!-- <p>Welcome to your exam management dashboard.</p> -->

    <div class="dashboard-cards">
        <div class="card">
        <?php
            $course_query="SELECT * FROM course";
            $course_result=mysqli_query($con,$course_query) or die("Query Error");
            if(mysqli_num_rows($course_result)>0){
        ?>   
            <h2>List of Course</h2>
            <table class="table table-hover">
                </tr>
                    <td><b>Course name</b></td>
                    <td><b>id</b></td>
                </tr>
            <?php 
                while($row=mysqli_fetch_assoc($course_result)){
            ?>
            <tr>
                <td><?php echo $row['c_name']?></td>
                <td><?php echo $row['c_id']?></td>
            </tr>
            <?php
        } ?>
    </table>
    <?php
}
    ?>
        </div>
       <!--  <div class="card">
            <h2>Results</h2>
            <p>View your latest results</p>
        </div> -->
        <div class="card">
            <?php
            $section_query="SELECT * FROM section";
            $section_result=mysqli_query($con,$section_query) or die("Query Error");
            if(mysqli_num_rows($section_result)>0){
            ?>  
            <h2>List of Section</h2>
            <table class="table table-hover">
                </tr>
                    <td><b>Section name</b></td>
                    <td><b>id</b></td>
                </tr>
            <?php
                while($row=mysqli_fetch_assoc($section_result)){
                    ?>
                <tr>
                    <td><?php echo $row['sec_name'] ?></td>
                    <td><?php echo $row['sec_id'] ?></td>
                </tr>
            <?php
        } ?>
    </table>
    <?php
}
?>
        </div>
    </div>
</div>

<?php include 'common/footer.php'; ?>
