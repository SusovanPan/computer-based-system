<?php include 'common/header.php'; ?>
<?php include 'common/navbar.php'; ?>



<!-- Main Content Area -->
<div class="main-content">

    <div class="container form-section">
        <div class="card shadow mb-4">
            <div class="card shadow-sm border-success">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Exam Result</h4>
                </div>
                <div class="card-body">
                    <?php
                    $date=date('Y-m-d');
                    $studentId = $_SESSION['user_id'];
                    $insert="SELECT * FROM result where std_id='$studentId' AND date='$date'";
                    $result=mysqli_query($con,$insert);
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            ?>
                    <label><h5 style="color:green;">Your Exam Score is:  
                    <?php        
                        echo $row['score'];
                        }
                    } ?>
                    </h5>
                    </label>


                    <?php
                    $studentId=$_SESSION['user_id'];
                    $query="SELECT * FROM answer,question,section WHERE answer.q_id=question.q_id AND question.q_section=section.sec_id AND std_id='$studentId' AND date='$date'";
                    $result=mysqli_query($con,$query);
                    if(mysqli_num_rows($result)>0){
                        $i=0;
                        while($row=mysqli_fetch_assoc($result)){
                            $i=$i+1;
                    ?>
                    <div class="mb-3">
                        <label for="Questions" class="form-label">
                        <?php echo $i.") ".htmlspecialchars_decode($row['q_text']) . " "; ?>
                            <span style="font-size: 0.9em; color: #6c757d;">(Section: <?php echo htmlspecialchars_decode($row['sec_name']); ?>)</span>
                        </label><br>
                        <?php 
                        if($row['q_ans']==$row['q_answer'])
                        {
                        ?>
                        <span>Answer: </span><label for="answer" class="form-label" style="color:green;">
                            <?php echo htmlspecialchars_decode($row['q_answer']); ?>
                            </label>
                        <?php 
                        }else{ 
                        ?>
                        <span>Answer: </span><label for="answer" class="form-label" style="color:red;">
                            <?php echo htmlspecialchars_decode($row['q_answer']); ?>
                            </label>
                    <?php 
                    }
                    ?>
                    </div>
                    <?php 
                        }
                    }
                    ?>
                </div>
            </div>    
        </div>
    </div>

</div>
<?php include 'common/footer.php'; ?>