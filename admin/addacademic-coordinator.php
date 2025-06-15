<?php include 'common/header.php'; ?>
<?php include 'common/navbar.php'; ?>

<!-- Main Content Area -->
<div class="main-content">
<div class="container form-section">
  <div class="card shadow-sm border-success">
    <div class="card-header bg-primary text-white text-center">
      <h4 class="mb-0">Academic Co-ordinator Enrollment Form</h4>
    </div>
    <div class="card-body">
      <form id="addAccordinatorForm" method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Full Name: </label>
          <input type="text" class="form-control bg-light" id="name" placeholder="Enter Full Name." name="name" required />
        </div>
        <div class="mb-3">
          <label for="phoneno" class="form-label">Phone No: </label>
          <input type="number" class="form-control" id="phoneno" name="phoneno" placeholder="Enter Phone No." required />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email : </label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email address." required />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control bg-light" id="password" name="password" placeholder="Enter Password." required />
        </div>
        <div class="mb-3">
          <label for="school" class="form-label">School :</label>
          <select class="form-select" id="school" name="school" required>
            <option selected disabled value="">Select School</option>
            <?php
                $query="SELECT * FROM school ORDER BY sch_id asc";
                $result=mysqli_query($con,$query) or die("Query Error");
                if(mysqli_num_rows($result)>0){
                  while($rows=mysqli_fetch_assoc($result)){ ?>
                    <option value="<?php echo $rows['sch_id']; ?>"><?php echo $rows['sch_name']; ?></option>
              <?php
                }
              } 
              ?>
          </select>
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