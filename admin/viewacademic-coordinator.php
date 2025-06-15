<?php include 'common/header.php'; ?>
<?php include 'common/navbar.php'; ?>

<!-- Main Content Area -->
<div class="main-content">

    <!-- <h1>View Students</h1> -->
        
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Co-Ordinator List</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">  
                <table class="table table-bordered" id="coordinatorTable" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="table-primary">Name</th>
                            <th class="table-primary">Phone</th>
                            <th class="table-primary">Email</th>
                            <th class="table-primary">Password</th>
                            <th class="table-primary">School</th>
                            <th class="table-primary">Operation</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div> 
</div>
<?php include 'common/footer.php'; ?>