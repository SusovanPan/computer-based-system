<?php include 'common/header.php'; ?>
<?php include 'common/navbar.php'; ?>

<!-- Main Content Area -->
<div class="main-content">
    <!-- <h1>Dashboard</h1>
    <p>Welcome to your exam management dashboard.</p>
 -->
    <div class="page-title-actions mr-5" style="font-size: 20px;">
        <h2>Exam Panel</h2>
        <form name="cd" id="cdForm">
            <input type="hidden" name="" id="timeExamLimit" value="1:00">
            <label>Remaining Time : </label>
            <input style="border:none;background-color: transparent;color:blue;font-size: 25px;" name="disp" id="timerDisplay" type="text" class="clock" size="5" readonly="true" />
        </form>
    </div>

    <div class="col-md-12 p-0 mb-4">
        <form method="post" id="submitAnswerFrm">
            <input type="hidden" name="examAction" id="examAction">

            <div id="questionSections">

                <?php 
                    $stream= $_SESSION['user_stream'];
                    $selQuest = "SELECT * FROM question WHERE q_course='$stream' ORDER BY rand() ";
                    $result=mysqli_query($con, $selQuest) or die("Query Error");
                    if(mysqli_num_rows($result)>0){
                        $i=1;
                        $rowCount = mysqli_num_rows($result);
                        while($row=mysqli_fetch_assoc($result)){
                            $questId=$row['q_id'];
                ?>
                
                <!--question-section-->
                <div class="question-section" id="question-<?php echo $i; ?>" style="display: <?php echo $i === 1 ? 'block' : 'none'; ?>;">
                
                    <p><b><?php echo $i; ?>.) <?php echo htmlspecialchars_decode($row['q_text']); ?></b></p>

                    <?php
                        $choices = ['q_op1', 'q_op2', 'q_op3', 'q_op4'];
                        foreach ($choices as $choice) {
                    ?>
                    <div class="form-group pl-4">
                        <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo htmlspecialchars_decode($row[$choice]); ?>" class="form-check-input" type="radio">
                        <label class="form-check-label"><?php echo htmlspecialchars_decode($row[$choice]); ?></label>
                    </div>
                    <?php } ?>

                    <div class="mt-3">
                        <?php if ($i > 1): ?>
                            <button type="button" class="btn btn-secondary prevBtn">Previous</button>
                        <?php endif; ?>
                        <?php if ($i < $rowCount): ?>
                            <button type="button" class="btn btn-info nextBtn float-right">Next</button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary float-right" id="submitAnswerFrmBtn">Submit</button>
                        <?php endif; ?>
                    </div>

                </div>
                <?php 
                            $i++;
                        }
                    } else {
                        echo "<b>No question at this moment</b>";
                    }
                ?>
            </div>
        </form>
    </div>
</div>
<script>
let tabSwitchCount = 0;
const allowedTabSwitches = 3;

document.addEventListener("visibilitychange", function () {
    if (document.hidden) {
        tabSwitchCount++;

        if (tabSwitchCount < allowedTabSwitches) {
            Swal.fire({
                icon: 'warning',
                title: 'Tab Switch Detected',
                text: `⚠️ You switched tabs ${tabSwitchCount} time(s). Maximum allowed: ${allowedTabSwitches}`,
                confirmButtonText: 'OK'
            });
        }

        if (tabSwitchCount === allowedTabSwitches) {
            Swal.fire({
                icon: 'error',
                title: 'Too Many Tab Switches',
                text: '🚫 You have switched tabs 3 times. Your exam will now be submitted automatically.',
                confirmButtonText: 'Submit Now'
            }).then(() => {
                // Set value to trigger autoSubmit behavior
                const examAction = document.getElementById("examAction");
                if (examAction) {
                    examAction.value = "autoSubmit";
                }

                // Trigger form submission which is handled by your jQuery code
                const form = document.getElementById("submitAnswerFrm");
                if (form) {
                    form.dispatchEvent(new Event("submit", { bubbles: true, cancelable: true }));
                }
            });
        }
    }
});

document.addEventListener("DOMContentLoaded", function () {
    // Disable all <a> links inside sidebar
    const sidebarLinks = document.querySelectorAll('.sidebar a');
    sidebarLinks.forEach(link => {
        link.classList.add('disabled-link');
        link.addEventListener('click', function (e) {
            e.preventDefault();
        });
    });

    // Disable logout button as well
    const logoutBtn = document.getElementById("logoutBtn");
    if (logoutBtn) {
        logoutBtn.disabled = true;
        logoutBtn.classList.add("disabled-btn");
    }
});

</script>
<?php include 'common/footer.php'; ?>