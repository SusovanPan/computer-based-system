<?php include 'common/header.php'; ?>
<?php include 'common/navbar.php'; ?>

<!-- Main Content Area -->
<div class="main-content">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Question List</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">  
                <table class="table table-bordered" id="questionTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="table-primary">Q. ID</th>
                            <th class="table-primary">Course</th>
                            <th class="table-primary">Section</th>
                            <th class="table-primary">Level</th>
                            <th class="table-primary">Bloom's Level</th>
                            <th class="table-primary">Question</th>
                            <th class="table-primary">Option 1</th>
                            <th class="table-primary">Option 2</th>
                            <th class="table-primary">Option 3</th>
                            <th class="table-primary">Option 4</th>
                            <th class="table-primary">Answer</th>
                            <th class="table-primary">Operation</th>
                        </tr>
                    </thead>
                    </table>
            </div>
        </div>
    </div> 
</div>
<?php include 'common/footer.php'; ?>
