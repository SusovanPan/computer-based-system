<!-- Modal For Questions Upload-->
<div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="bulkQuestionUploadForm" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Upload CSV for Bulk Questions</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="csvFile" class="form-label">Select CSV File</label>
              <input type="file" class="form-control" id="csvFile" name="csvFile" accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
            </div>
            <div class="form-text">
              <strong>Required Format:</strong>
                <div class="mt-2 p-2 bg-light border rounded small font-monospace">
                course_id | section_id | q_level | q_blooms_level |question | option1 | option2 | option3 | option4 | correct_answer
                </div>
                <div class="mt-2">
                  Download Sample Excel <a href="/cbt/assets/samples/sample_questions.xlsx" download class="link-primary">
                    Click Here.
                  </a>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- Modal For Student Upload-->
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="bulkStudentUploadForm" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Upload CSV for Bulk Students</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="csvFile" class="form-label">Select CSV File</label>
              <input type="file" class="form-control" id="csvFile" name="csvFile" accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
            </div>
            <div class="form-text">
              <strong>Required Format:</strong>
                <div class="mt-2 p-2 bg-light border rounded small font-monospace">
                course_no | registration_no | name | email | password
                </div>
                <div class="mt-2">
                  Download Sample Excel <a href="/cbt/assets/samples/sample_students.xlsx" download class="link-primary">
                    Click Here.
                  </a>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal For Display Student Details-->
<div class="modal fade" id="viewStudentModal" tabindex="-1" role="dialog" aria-labelledby="viewStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Optional: modal-lg -->
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
         <h5 class="modal-title">Student Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        <!-- <h5 class="modal-title" id="viewStudentModalLabel">Student Details</h5>
         <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>
      <div class="modal-body" id="viewStudentBody">
        <!-- Student info will be shown here -->
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal For Student -->
<div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="viewStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <form id="editStudentForm">
            <div class="modal-header bg-primary text-white">
              <h5 class="modal-title">Edit Student Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="viewStudentBody">     
              <input type="hidden" name="std_id" id="edit_std_id">
                <div class="mb-2">
                  <label for="edit_std_registration">Registration No:</label>
                  <input type="text" class="form-control" name="std_registration" id="edit_std_registration">
                </div>

                <div class="mb-2">
                  <label for="edit_std_name">Name:</label>
                  <input type="text" class="form-control" name="std_name" id="edit_std_name">
                </div>

                <div class="mb-2">
                  <label for="edit_std_email">Email:</label>
                  <input type="email" class="form-control" name="std_email" id="edit_std_email">
                </div>

                <div class="mb-2">
                  <label for="edit_std_password">Password:</label>
                  <input type="text" class="form-control" name="std_password" id="edit_std_password">
                </div>

                <div class="mb-2">
                  <label for="edit_std_stream">Stream:</label>
                  <select class="form-control" name="std_stream" id="edit_std_stream">
                    <!-- Options will be populated dynamically -->
                  </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
</div>


<!-- Edit Modal For Question-->
<div class="modal fade" id="editQuestionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="editQuestionForm" class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Edit Question</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="q_id" id="edit_q_id">

        <div class="mb-2">
          <label for="edit_q_course">Course:</label>
          <select class="form-control" name="q_course" id="edit_q_course">
            <!-- Options will be populated dynamically -->
          </select>
        </div>

        <div class="mb-2">
          <label for="edit_q_section">Section:</label>
          <select class="form-control" name="q_section" id="edit_q_section">
            <!-- Options will be populated dynamically -->
          </select>
        </div>

        <div class="mb-2">
          <label for="edit_q_level">Question level:</label>
          <select class="form-control" name="q_level" id="edit_q_level">
            <!-- Options will be populated dynamically -->
          </select>
        </div>

        <div class="mb-2">
          <label for="edit_q_blooms_level">Blooms Level:</label>
          <select class="form-control" name="q_blooms_level" id="edit_q_blooms_level">
            <!-- Options will be populated dynamically -->
          </select>
        </div>

        <div class="mb-2">
          <label for="edit_q_text">Question:</label>
          <input type="text" class="form-control" name="q_text" id="edit_q_text">
        </div>

        <div class="mb-2">
          <label for="edit_q_op1">Option 1:</label>
          <input type="text" class="form-control" name="q_op1" id="edit_q_op1">
        </div>

        <div class="mb-2">
          <label for="edit_q_op2">Option 2:</label>
          <input type="text" class="form-control" name="q_op2" id="edit_q_op2">
        </div>

        <div class="mb-2">
          <label for="edit_q_op3">Option 3:</label>
          <input type="text" class="form-control" name="q_op3" id="edit_q_op3">
        </div>

        <div class="mb-2">
          <label for="edit_q_op4">Option 4:</label>
          <input type="text" class="form-control" name="q_op4" id="edit_q_op4">
        </div>

        <div class="mb-2">
          <label for="edit_q_ans">Answer:</label>
          <input type="text" class="form-control" name="q_ans" id="edit_q_ans">
        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
</div>

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
