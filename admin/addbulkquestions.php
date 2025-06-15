<?php include 'common/header.php' ?>


<div class="content">
    <?php include 'common/navbar.php' ?>
    <div class="main-content">
    <!-- Main content area -->
        
        <div class="container mt-3">
        <h2 class="text-center fw-bold">Upload Bulk Questions</h2>
        <!--<form class="was-validated" action="studentFile_upload.php" method="post" enctype="multipart/form-data">-->
        <form class="needs-validation" action="code/add_questions.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="formFileMultiple" class="form-label">Select Excel File (.xlsx)</label>
              <input class="form-control" type="file" name="excel_file" id="formFileMultiple csvFile" accept=".csv,.xls,.xlsx" required>
             <div class="invalid-feedback">Please upload .csv/.xls/.xlsx file</div>
            </div>
            <input type="submit" class="btn btn-primary btn-lg" value="Upload" name="import">
        </form>
        </div>

    </div>
</div>

<?php include 'common/footer.php' ?>
