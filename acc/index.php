<?php include 'common/header.php'; ?>
<?php include 'common/navbar.php'; ?>

<div class="main-content container my-0">
    <h2 class="text-center">📊 Dashboard</h2>

    <div class="row g-4">

        <!-- Course Card -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-primary text-white py-2">
                    <h6 class="mb-0">📘 List of Courses</h6>
                </div>
                <div class="card-body p-2">
                    <?php
                    $course_query = "SELECT * FROM course";
                    $course_result = mysqli_query($con, $course_query) or die("Query Error");
                    if (mysqli_num_rows($course_result) > 0) {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-sm table-hover mb-2">
                                <thead class="table-light">
                                    <tr>
                                        <th>Course Name</th>
                                        <th>ID</th>
                                    </tr>
                                </thead>
                                <tbody id="courseTable">
                                    <?php
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($course_result)) {
                                        $i++;
                                        $extraClass = $i > 5 ? 'd-none extra-course' : '';
                                    ?>
                                        <tr class="<?php echo $extraClass; ?>">
                                            <td><?php echo $row['c_name']; ?></td>
                                            <td><?php echo $row['c_id']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php if ($i > 5) { ?>
                                <div class="text-center">
                                    <button class="btn btn-sm btn-outline-primary" onclick="loadMore('course')">Load More</button>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else { echo "<p class='text-muted'>No courses found.</p>"; } ?>
                </div>
            </div>
        </div>

        <!-- Section Card -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-success text-white py-2">
                    <h6 class="mb-0">📂 List of Sections</h6>
                </div>
                <div class="card-body p-2">
                    <?php
                    $section_query = "SELECT * FROM section";
                    $section_result = mysqli_query($con, $section_query) or die("Query Error");
                    if (mysqli_num_rows($section_result) > 0) {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-sm table-hover mb-2">
                                <thead class="table-light">
                                    <tr>
                                        <th>Section Name</th>
                                        <th>ID</th>
                                    </tr>
                                </thead>
                                <tbody id="sectionTable">
                                    <?php
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($section_result)) {
                                        $i++;
                                        $extraClass = $i > 5 ? 'd-none extra-section' : '';
                                    ?>
                                        <tr class="<?php echo $extraClass; ?>">
                                            <td><?php echo $row['sec_name']; ?></td>
                                            <td><?php echo $row['sec_id']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php if ($i > 5) { ?>
                                <div class="text-center">
                                    <button class="btn btn-sm btn-outline-success" onclick="loadMore('section')">Load More</button>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else { echo "<p class='text-muted'>No sections found.</p>"; } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS Script for Load More -->
<script>
    function loadMore(type) {
        const rows = document.querySelectorAll(`.extra-${type}`);
        rows.forEach(row => row.classList.remove('d-none'));
        event.target.style.display = 'none';
    }
</script>

<?php include 'common/footer.php'; ?>
