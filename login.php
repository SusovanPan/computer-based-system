<?php
session_start();
if(isset($_SESSION['user_id']))
{
  if($_SESSION['role']=='Admin')
  {
    header("Location: http://localhost/cbt/admin/index.php");
  }
  else if($_SESSION['role']=='Acc')
  {
     header("Location: http://localhost/cbt/acc/index.php");
  }
  else if($_SESSION['role']=='Student')
  {
     header("Location: http://localhost/cbt/student/index.php");
  }
  else
  {
     header("Location: http://localhost/cbt/error.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CBT | Login Panel</title>

    <!-- Link your stylesheet -->
    <link rel="stylesheet" href="css/styles.css">

    <!-- Optional: Google Fonts or Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Data table -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- DataTables 2.3.0 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.min.js"></script>

    <!-- Buttons Extension for v2.3.0 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>

    <!-- Required for Excel & PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    

</head>

<body onload="updateDateTime()"> 
<div class="page-container">
    <!-- Site Header -->
    <div class="header">
        <div class="logo"><img src="img/logo.jpg" alt="Logo"></div>
        <div class="welcome">Welcome to ILEAD </br> Computer Based Testing System</div>
        <div class="date" id="datetime"></div>
    </div>
    <!-- Begin Content Area -->
    <div class="content-area">

      <!-- Main Content Area -->
      <div class="main-content">
        <!-- Main Content -->
        <main>
          <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
              <div class="col-md-5">
                <img src="img/cbt1.jpg" alt="Login Illustration" class="login-image"/>
              </div>
              <div class="col-md-5">
                <div class="login-box">
                  <h3 class="text-center text-primary mb-4">Login</h3>
                  <form id="loginForm" method="POST"> 
                    <label for="role" class="form-label">Login as:</label>
                    <select class="form-select role-select" id="role">
                      <option selected>Select Role</option>
                      <option value="Admin">Admin</option>
                      <option value="Acc">Coordinator</option>
                      <option value="Student">Student</option>
                    </select>
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" id="username" class="form-control" placeholder="Enter username" required />
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" class="form-control" placeholder="Enter password" required />
                    <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
                    <div class="text-center mt-2">
                      <!-- <a href="#" class="text-decoration-none">Forgot Password?</a> -->
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div> <!-- end content-area -->
    <!-- Site Footer -->
    <div class="footer">
        <div class="container text-center">
            <div class="row">
                <div class="col">&copy; Copyright 2025 ILEAD. All Rights Reserved. Developed By: CST Dept</div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="footer-links mt-2">
                        <a href="" data-bs-toggle="modal" data-bs-target="#aboutModal">About</a> |
                        <a href='https://ilead.net.in/contact-us/' target='_blank'>Contacts</a> |
                        <a href="https://www.facebook.com" target="_blank">Facebook</a> |
                        <a href="https://www.twitter.com" target="_blank">Twitter</a> |
                        <a href="https://www.linkedin.com" target="_blank">LinkedIn</a> |
                        <a href="https://www.instagram.com" target="_blank">Instagram</a>     
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end footer  -->

<!-- Modal For About Us -->
<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Optional: modal-lg -->
    <div class="modal-content">
      <div class="modal-body" id="viewabout">

          <div class="container py-5">
            <h2 class="text-center mb-5">Meet the development team</h2>

            <div class="row justify-content-center">
                <!-- First Row -->
                <div class="col-md-2 col-6 team-member">
                  <img src="/cbt/facultyPhoto/sc.jpg" alt="Lyn Bryan">
                  <h6>Dr. Soumen Chatterjee</h6>
                  <p class="text-muted">Adviser</p>
                </div>

                <div class="col-md-2 col-6 team-member">
                  <img src="/cbt/facultyPhoto/sh.webp" alt="Lauren Pybus">
                  <h6>Mr. Sirshendu Hore</h6>
                  <p class="text-muted">Overall design and Monitoring</p>
                </div>

                <div class="col-md-2 col-6 team-member">
                  <img src="/cbt/facultyPhoto/sp.jpg" alt="Darren Maher">
                  <h6>Ms. Sweta Prasad</h6>
                  <p class="text-muted">Front End design</p>
                </div>

                <div class="col-md-2 col-6 team-member">
                  <img src="/cbt/facultyPhoto/sm.webp" alt="Jieun Segal">
                  <h6>Mrs. Somasree Mal</h6>
                  <p class="text-muted">Front End design</p>
                </div>

                <div class="col-md-2 col-6 team-member">
                  <img src="/cbt/facultyPhoto/skp.jpg" alt="Raelene Thomas">
                  <h6>Mr. Susovan Kumar Pan</h6>
                  <p class="text-muted">Code behind the system</p>
                </div>

            </div>

            <div class="row justify-content-center mt-4">
              <!-- Second Row -->
              <div class="col-md-2 col-6 team-member">
                  <img src="/cbt/facultyPhoto/jm.PNG" alt="Mitchell Fawcett">
                  <h6>Mrs. Jaity Mitra</h6>
                  <p class="text-muted">Code behind the system</p>
              </div>

              <div class="col-md-2 col-6 team-member">
                <img src="/cbt/facultyPhoto/rb.jpg" alt="Ben Van Exan">
                <h6>Mrs. Riya Biswas</h6>
                <p class="text-muted">Database Design</p>
              </div>

              <div class="col-md-2 col-6 team-member">
                <img src="/cbt/facultyPhoto/kd.jpg" alt="John Blown">
                <h6>Mr. Koushik De</h6>
                <p class="text-muted">Database Design</p>
              </div>

              <div class="col-md-2 col-6 team-member">
                <img src="/cbt/facultyPhoto/sd.jpeg" alt="Chris Breikss">
                <h6>Mrs. Satabdi Dhar</h6>
                <p class="text-muted">Documentation & Operating manual</p>
              </div>

              <div class="col-md-2 col-6 team-member">
                <img src="/cbt/facultyPhoto/sb.webp" alt="Chris Breikss">
                <h6>Mr. Sumanta Bhattacharya</h6>
                <p class="text-muted">Documentation & Operating manual</p>
              </div>

            </div>

          </div>

      </div>
    </div>
  </div>
</div> <!-- End Modal Code -->


</div> <!-- end page-container -->
</body>
</html>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>