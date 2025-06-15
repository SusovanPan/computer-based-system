<?php include 'common/header.php'; ?>
<?php include 'common/navbar.php'; ?>

<!-- Main Content Area -->
<div class="main-content">
<div class="container form-section">
  <div class="card shadow-sm border-success">
    <div class="card-header bg-primary text-white text-center">
      <h4 class="mb-0">Student Enrollment Form</h4>
    </div>
    <div class="card-body">
      <form id="addStudentForm" method="POST">
        <div class="mb-3">
          <label for="regNumber" class="form-label">Registration Number</label>
          <input type="text" class="form-control" id="regNumber" placeholder="Enter Registration No." required />
        </div>

        <div class="mb-3">
          <label for="studentName" class="form-label">Name</label>
          <input type="text" class="form-control bg-light" id="studentName" placeholder="Enter Full Name."required />
        </div>

        <div class="mb-3">
          <label for="stream" class="form-label">Stream</label>
          <select class="form-select" id="stream" required>
            <option selected disabled value="">Select Course</option>
            <?php
                $query="SELECT * FROM course ORDER BY c_id asc";
                $result=mysqli_query($con,$query) or die("Query Error");
                if(mysqli_num_rows($result)>0){
                  while($rows=mysqli_fetch_assoc($result)){ ?>
                    <option value="<?php echo $rows['c_id']; ?>"><?php echo $rows['c_name']; ?></option>
              <?php
                }
              } 
              ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" placeholder="Enter Email address." required />
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Student Password</label>
          <input type="password" class="form-control bg-light" id="password" placeholder="Enter Password." required />
        </div>

        <div class="d-grid gap-2 d-sm-flex justify-content-sm-start">
          <button type="submit" class="btn btn-primary">Save</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<?php include 'common/footer.php'; ?>