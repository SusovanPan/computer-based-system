<?php include 'common/header.php'; ?>
<?php include 'common/navbar.php'; ?>



<!-- Main Content Area -->
<div class="main-content py-4">
    <div class="container form-section">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0"><i class="fas fa-poll"></i> Exam Result</h4>
            </div>

            <div class="card-body">
                <?php
                $date = date('Y-m-d');
                $studentId = $_SESSION['user_id'];
                $totalQuestions = 30;

                // Fetch Score
                $scoreQuery = "SELECT * FROM result WHERE std_id='$studentId' AND date='$date'";
                $scoreResult = mysqli_query($con, $scoreQuery);
                $score = 0;

                if (mysqli_num_rows($scoreResult) > 0) {
                    $row = mysqli_fetch_assoc($scoreResult);
                    $score = $row['score'];
                ?>
                    <!-- 1. SCORE DISPLAY -->
                    <div class="text-center my-4">
                        <h2 class="fw-bold text-success" style="font-size: 2.5rem; text-shadow: 1px 1px 3px #ccc;">
                            🎯 Your Exam Score:
                            <span class="badge bg-success text-white py-2 px-4 fs-4">
                                <?php echo $score . " / $totalQuestions"; ?>
                            </span>
                        </h2>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-warning text-center">No result found for today.</div>
                <?php } ?>

                <?php
                // Fetch answer with difficulty label
                $query = "SELECT answer.q_answer, question.q_ans, question.q_text, section.sec_name, q_level.d_level
                          FROM answer
                          INNER JOIN question ON answer.q_id = question.q_id
                          INNER JOIN section ON question.q_section = section.sec_id
                          INNER JOIN q_level ON question.q_level = q_level.d_id
                          WHERE std_id='$studentId' AND date='$date'";
                $result = mysqli_query($con, $query);

                // Initialize Counters
                $correct = $wrong = $unattempted = 0;
                $difficulty_stats = []; // e.g., ['Easy' => ['correct'=>0, 'wrong'=>0, 'unattempted'=>0]]
                $questionDetails = [];

                $i = 0;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $i++;
                        $q_text = htmlspecialchars_decode($row['q_text']);
                        $section = htmlspecialchars_decode($row['sec_name']);
                        $userAnswer = $row['q_answer'];
                        $correctAnswer = $row['q_ans'];
                        $difficulty = $row['d_level'];

                        // Initialize difficulty stats if not set
                        if (!isset($difficulty_stats[$difficulty])) {
                            $difficulty_stats[$difficulty] = ['correct' => 0, 'wrong' => 0, 'unattempted' => 0];
                        }

                        if ($userAnswer == '') {
                            $unattempted++;
                            $difficulty_stats[$difficulty]['unattempted']++;
                        } elseif ($userAnswer == $correctAnswer) {
                            $correct++;
                            $difficulty_stats[$difficulty]['correct']++;
                        } else {
                            $wrong++;
                            $difficulty_stats[$difficulty]['wrong']++;
                        }

                        $isCorrect = ($userAnswer != '' && $userAnswer == $correctAnswer);

                        $questionDetails[] = [
                            'num' => $i,
                            'q_text' => $q_text,
                            'section' => $section,
                            'difficulty' => $difficulty,
                            'userAnswer' => $userAnswer,
                            'correctAnswer' => $correctAnswer,
                            'isCorrect' => $isCorrect
                        ];
                    }
                } else {
                    echo '<div class="alert alert-info text-center">No answers found.</div>';
                }
                ?>

                <!-- 2. ANSWER SUMMARY -->
                <div class="card mt-4 border-info">
                    <div class="card-body text-center">
                        <h5 class="card-title">📊 Answer Summary</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="badge bg-success fs-5">✔️ Correct: <?php echo $correct; ?></span>
                            </div>
                            <div class="col-md-4">
                                <span class="badge bg-danger fs-5">❌ Wrong: <?php echo $wrong; ?></span>
                            </div>
                            <div class="col-md-4">
                                <?php
                                $unattempted=30-($correct+$wrong);
                                ?>
                                <span class="badge bg-secondary fs-5">❓ Unattempted: <?php echo $unattempted; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. PERFORMANCE BY DIFFICULTY LEVEL -->
                <div class="card mt-4 border-dark">
                    <div class="card-body text-center">
                        <h5 class="card-title">🎯 Performance by Difficulty Level</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Difficulty</th>
                                        <th>Correct</th>
                                        <th>Wrong</th>
                                        <!-- <th>Unattempted</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($difficulty_stats as $level => $data): ?>
                                        <tr>
                                            <td><strong><?php echo $level; ?></strong></td>
                                            <td><span class="text-success fw-bold"><?php echo $data['correct']; ?></span></td>
                                            <td><span class="text-danger fw-bold"><?php echo $data['wrong']; ?></span></td>
                                            <!-- <td><span class="text-secondary fw-bold"><?php echo $data['unattempted']; ?></span></td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- 4. DETAILED QUESTION-WISE REVIEW -->
                <div class="card mt-4 border-secondary">
                    <div class="card-body">
                        <h5 class="card-title text-center">📝 Detailed Answer Review</h5>
                        <?php foreach ($questionDetails as $q): ?>
                            <div class="card mb-3 border-<?php echo $q['isCorrect'] ? 'success' : ($q['userAnswer'] == '' ? 'secondary' : 'danger'); ?>">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <?php echo $q['num'] . ") " . $q['q_text']; ?>
                                        <span class="badge bg-secondary ms-2">Section: <?php echo $q['section']; ?></span>
                                        <span class="badge bg-dark ms-2"><?php echo $q['difficulty']; ?></span>
                                    </h6>
                                    <p class="card-text mb-1">
                                        <?php if ($q['userAnswer'] == ''): ?>
                                            ❓ <strong>Unattempted</strong>
                                        <?php elseif ($q['isCorrect']): ?>
                                            ✅ <strong>Your Answer:</strong> 
                                            <span class="text-success"><?php echo htmlspecialchars_decode($q['userAnswer']); ?></span>
                                        <?php else: ?>
                                            ❌ <strong>Your Answer:</strong> 
                                            <span class="text-danger"><?php echo htmlspecialchars_decode($q['userAnswer']); ?></span><br>
                                            ✅ <strong>Correct Answer:</strong> 
                                            <span class="text-success"><?php echo htmlspecialchars_decode($q['correctAnswer']); ?></span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div> <!-- End card-body -->
        </div> <!-- End card -->
    </div> <!-- End container -->
</div>

<?php include 'common/footer.php'; ?>
