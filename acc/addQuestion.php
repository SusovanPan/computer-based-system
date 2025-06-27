<?php include 'common/header.php'; ?>
<?php include 'common/navbar.php'; ?>

<!-- Main Content Area -->
<div class="main-content">
<div class="container form-section">
  <div class="card shadow-sm border-success">
    <div class="card-header bg-primary text-white text-center">
      <h4 class="mb-0">Question Upload Form</h4>
    </div>
    <div class="card-body">
      <form id="addQuestionForm" method="POST">
        
        <div class="mb-3">
          <label for="section" class="form-label">Section</label>
          <select class="form-select" id="section" required>
            <option selected disabled value="">Select Section</option>
            <?php
              $query="SELECT * FROM section ORDER BY sec_id asc";
              $result=mysqli_query($con,$query) or die("Query Error");
              if(mysqli_num_rows($result)>0){
                while($rows=mysqli_fetch_assoc($result)){ ?>
                <option value="<?php echo $rows['sec_id']; ?>"><?php echo $rows['sec_name']; ?></option>
              <?php
                }
                  }?> 
          </select>
        </div>

        <div class="mb-3">
          <label for="stream" class="form-label">Course:</label>
          <select class="form-select" id="course" required>
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
          <label for="q_level" class="form-label">Question Level:</label>
          <select class="form-select" id="q_level" required>
            <option selected disabled value="">Select Level</option>
              <?php
              $query="SELECT * FROM q_level ORDER BY d_id asc";
              $result=mysqli_query($con,$query) or die("Query Error");
              if(mysqli_num_rows($result)>0){
                while($rows=mysqli_fetch_assoc($result)){ ?>
               <option value="<?php echo $rows['d_id']; ?>"><?php echo $rows['d_level']; ?></option>
              <?php
                }
                  }
              ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="q_blooms_level" class="form-label">Bloom's Level:</label>
          <select class="form-select" id="q_blooms_level" required>
            <option selected disabled value="">Select Level</option>
              <?php
              $query="SELECT * FROM blooms_level ORDER BY b_id asc";
              $result=mysqli_query($con,$query) or die("Query Error");
              if(mysqli_num_rows($result)>0){
                while($rows=mysqli_fetch_assoc($result)){ ?>
               <option value="<?php echo $rows['b_id']; ?>"><?php echo $rows['b_level']; ?></option>
              <?php
                }
                  }
              ?>
          </select>
        </div>


        <div class="mb-3">
          <label for="question" class="form-label">Enter the Question:</label>
          <input type="text" class="form-control" id="question" placeholder="Enter The Question." required />
        </div>

        <div class="mb-3">
          <label for="optionA" class="form-label">Option A:</label>
          <input type="text" class="form-control bg-light" id="optionA" placeholder="Enter Option A."required />
        </div>

        

        <div class="mb-3">
          <label for="optionB" class="form-label">Option B:</label>
          <input type="text" class="form-control" id="optionB" placeholder="Enter option B." required />
        </div>

        <div class="mb-3">
          <label for="optionC" class="form-label">Option C:</label>
          <input type="text" class="form-control bg-light" id="optionC" placeholder="Enter option C." required />
        </div>

        <div class="mb-3">
          <label for="optionD" class="form-label">Option D:</label>
          <input type="text" class="form-control bg-light" id="optionD" placeholder="Enter option D." required />
        </div>

        <div class="mb-3">
          <label for="answer" class="form-label">Answer :</label>
          <input type="text" class="form-control bg-light" id="answer" placeholder="Enter Answer" required />
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