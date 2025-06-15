<?php include 'common/header.php'; ?>
<?php include 'common/navbar.php'; ?>

<!-- Main Content Area -->
<div class="main-content">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Student List</h4>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="studentTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="table-primary">Registration No</th>
                            <th class="table-primary">Name</th>
                            <th class="table-primary">Stream</th>
                            <th class="table-primary">E-Mail</th>
                            <th class="table-primary">Password</th>
                            <th class="table-primary">Operation</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div> 
</div>
<?php include 'common/footer.php'; ?>
