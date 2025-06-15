// Result Details //
$(document).ready(function () {
    const table = $('#resultTable').DataTable({
        ajax: 'code/fetch_result.php',
        columns: [
            { title: "StudentName" },
            { title: "Result" },
            { title: "Date" },
        ],
        layout: {
            topStart: [
              'pageLength',  // ✅ Shows "Show X entries" dropdown at top-left
              {

                buttons: 
                [
                  {
                          extend: 'csv',
                          text: '<i class="fas fa-file-csv"></i> CSV',
                          titleAttr: 'Export to CSV',
                          className: 'btn btn-secondary'
                      },
                      {
                          extend: 'excel',
                          text: '<i class="fas fa-file-excel"></i> Excel',
                          titleAttr: 'Export to Excel',
                          className: 'btn btn-success'
                      },
                      {
                          extend: 'pdf',
                          text: '<i class="fas fa-file-pdf"></i> PDF',
                          titleAttr: 'Export to PDF',
                          className: 'btn btn-danger'
                      },
                      {
                          extend: 'print',
                          text: '<i class="fas fa-print"></i> Print',
                          titleAttr: 'Print Table',
                          className: 'btn btn-primary'
                      } 
                ]
              }
            ],
          topEnd: ['search'] // ✅ This adds the "entries per page" dropdown
        }
    });
});


// Students Details //
$(document).ready(function () {
    const table = $('#studentTable').DataTable({
        ajax: 'code/fetch_student.php',
        columns: [
            { title: "Registration No" },
            { title: "Name" },
            { title: "Stream" },
            { title: "E-Mail" },
            { title: "Password" },
            { title: "Operation", orderable: false }
        ],
        layout: {
            topStart: [
              'pageLength',  // ✅ Shows "Show X entries" dropdown at top-left
              {

                buttons: 
                [
                  {
                          extend: 'csv',
                          text: '<i class="fas fa-file-csv"></i> CSV',
                          titleAttr: 'Export to CSV',
                          className: 'btn btn-secondary'
                      },
                      {
                          extend: 'excel',
                          text: '<i class="fas fa-file-excel"></i> Excel',
                          titleAttr: 'Export to Excel',
                          className: 'btn btn-success'
                      },
                      {
                          extend: 'pdf',
                          text: '<i class="fas fa-file-pdf"></i> PDF',
                          titleAttr: 'Export to PDF',
                          className: 'btn btn-danger'
                      },
                      {
                          extend: 'print',
                          text: '<i class="fas fa-print"></i> Print',
                          titleAttr: 'Print Table',
                          className: 'btn btn-primary'
                      } 
                ]
              }
            ],
          topEnd: ['search'] // ✅ This adds the "entries per page" dropdown
        }
    });

    // View Modal For Students // 
    $(document).on('click', '.view-btn', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'code/view_students.php',
            method: 'POST',
            data: { id: id },
            success: function (response) {
                $('#viewStudentBody').html(response);
                new bootstrap.Modal(document.getElementById('viewStudentModal')).show();
            }
        });
    });

    // Edit Modal For Students //
    $(document).on('click', '.edit-Btn', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'code/get_student.php',
            method: 'POST',
            dataType: 'json',
            data: { id: id },
            success: function (data) {
                $('#edit_std_id').val(data.std_id);
                $('#edit_std_registration').val(data.std_registration);
                $('#edit_std_name').val(data.std_name);
                $('#edit_std_email').val(data.std_email);
                $('#edit_std_password').val(data.std_password);

                const streamSelect = $('#edit_std_stream');
                streamSelect.empty();

                data.courses.forEach(course => {
                    const isSelected = course.c_id == data.std_stream ? 'selected' : '';
                    streamSelect.append(`<option value="${course.c_id}" ${isSelected}>${course.c_name}</option>`);
                });

                new bootstrap.Modal(document.getElementById('editStudentModal')).show();
            }
        });
    });

    // Handle Edit Submit with SweetAlert For Students //
    $('#editStudentForm').submit(function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you want to update this student\'s details?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'code/update_student.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        // Close the modal
                        bootstrap.Modal.getInstance(document.getElementById('editStudentModal')).hide();

                        // Reload the table (e.g., DataTables)
                        if (typeof table !== 'undefined') {
                            table.ajax.reload();
                        }

                        // Show success message
                        Swal.fire({
                            title: 'Updated!',
                            text: 'Student information has been updated.',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: true
                        });
                    },
                    error: function () {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong while updating.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });


    // Delete Student Data //
    $(document).on('click', '.delete-student', function () {
    const studentId = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this student record!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'code/delete_student.php',
                method: 'POST',
                data: { std_id: studentId },
                dataType: 'json',
                success: function (res) {
                    if (res.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: res.message,
                            timer: 2000,
                            showConfirmButton: true
                        }).then(() => {
                            location.reload(); // or use a function to refresh table
                        });
                    } else {
                        Swal.fire('Error!', res.error, 'error');
                    }
                },
                error: function () {
                    Swal.fire('Error!', 'Something went wrong while deleting.', 'error');
                }
            });
        }
    });
});

});


// Coordinator Details //
$(document).ready(function () {
    const table = $('#coordinatorTable').DataTable({
        ajax: 'code/fetch_coordinator.php',
        columns: [
            { title: "Name" },
            { title: "Phone No" },
            { title: "E-Mail" },
            { title: "Password" },
            { title: "School" },
            { title: "Operation", orderable: false }
        ],
        layout: {
            topStart: [
              'pageLength',  // ✅ Shows "Show X entries" dropdown at top-left
              {

                buttons: 
                [
                  {
                          extend: 'csv',
                          text: '<i class="fas fa-file-csv"></i> CSV',
                          titleAttr: 'Export to CSV',
                          className: 'btn btn-secondary'
                      },
                      {
                          extend: 'excel',
                          text: '<i class="fas fa-file-excel"></i> Excel',
                          titleAttr: 'Export to Excel',
                          className: 'btn btn-success'
                      },
                      {
                          extend: 'pdf',
                          text: '<i class="fas fa-file-pdf"></i> PDF',
                          titleAttr: 'Export to PDF',
                          className: 'btn btn-danger'
                      },
                      {
                          extend: 'print',
                          text: '<i class="fas fa-print"></i> Print',
                          titleAttr: 'Print Table',
                          className: 'btn btn-primary'
                      } 
                ]
              }
            ],
          topEnd: ['search'] // ✅ This adds the "entries per page" dropdown
        }
    });

    // View Modal For Coordinator //
    $(document).on('click', '.view-btn-acc', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'code/view_coordinator.php',
            method: 'POST',
            data: { id: id },
            success: function (response) {
                $('#viewAccBody').html(response);
                new bootstrap.Modal(document.getElementById('viewAccModal')).show();
            }
        });
    });

    // Edit Modal For Coordinator //
    $(document).on('click', '.edit-btn-acc', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'code/get_coordinator.php',
            method: 'POST',
            dataType: 'json',
            data: { id: id },
            success: function (data) {
                $('#edit_acc_id').val(data.ac_id);
                $('#edit_acc_name').val(data.ac_name);
                $('#edit_acc_email').val(data.ac_email);
                $('#edit_acc_phoneno').val(data.ac_phoneno);
                $('#edit_acc_password').val(data.ac_password);

                const schoolSelect = $('#edit_acc_department');
                schoolSelect.empty();

                data.schools.forEach(school => {
                    const isSelected = school.sch_id == data.ac_department ? 'selected' : '';
                    schoolSelect.append(`<option value="${school.sch_id}" ${isSelected}>${school.sch_name}</option>`);
                });

                new bootstrap.Modal(document.getElementById('editAccModal')).show();
            }
        });
    });

    // Handle Edit Submit with SweetAlert For Coordinator //
    $('#editAccForm').submit(function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you want to update this student\'s details?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'code/update_coordinator.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        // Close the modal
                        bootstrap.Modal.getInstance(document.getElementById('editAccModal')).hide();

                        // Reload the table (e.g., DataTables)
                        if (typeof table !== 'undefined') {
                            table.ajax.reload();
                        }

                        // Show success message
                        Swal.fire({
                            title: 'Updated!',
                            text: 'Coordinator information has been updated.',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: true
                        });
                    },
                    error: function () {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong while updating.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });


    // Delete Coordinator Data //
    $(document).on('click', '.delete-acc', function () {
    const coordinatorId = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this Coordinator record!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'code/delete_coordinator.php',
                method: 'POST',
                data: { ac_id: coordinatorId },
                dataType: 'json',
                success: function (res) {
                    if (res.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: res.message,
                            timer: 2000,
                            showConfirmButton: true
                        }).then(() => {
                            location.reload(); // or use a function to refresh table
                        });
                    } else {
                        Swal.fire('Error!', res.error, 'error');
                    }
                },
                error: function () {
                    Swal.fire('Error!', 'Something went wrong while deleting.', 'error');
                }
            });
        }
    });
});
});


// Question Details //
$(document).ready(function () {
    const table = $('#questionTable').DataTable({
        ajax: 'code/fetch_question.php',
        columns: [
            { title: "Q. Id" },
            { title: "Course" },
            { title: "Section" },
            { title: "Question" },
            { title: "Option1" },
            { title: "Option2" },
            { title: "Option3" },
            { title: "Option4" },
            { title: "Answer" },
            { title: "Operation", orderable: false }
        ],
        layout: {
            topStart: [
              'pageLength',  // ✅ Shows "Show X entries" dropdown at top-left
              {

                buttons: 
                [
                  {
                          extend: 'csv',
                          text: '<i class="fas fa-file-csv"></i> CSV',
                          titleAttr: 'Export to CSV',
                          className: 'btn btn-secondary'
                      },
                      {
                          extend: 'excel',
                          text: '<i class="fas fa-file-excel"></i> Excel',
                          titleAttr: 'Export to Excel',
                          className: 'btn btn-success'
                      },
                      {
                          extend: 'pdf',
                          text: '<i class="fas fa-file-pdf"></i> PDF',
                          titleAttr: 'Export to PDF',
                          className: 'btn btn-danger'
                      },
                      {
                          extend: 'print',
                          text: '<i class="fas fa-print"></i> Print',
                          titleAttr: 'Print Table',
                          className: 'btn btn-primary'
                      } 
                ]
              }
            ],
          topEnd: ['search'] // ✅ This adds the "entries per page" dropdown
        }
    });

    // Edit Modal For Question //
    $(document).on('click', '.edit-Btn-question', function () {
        const id = $(this).data('id');
        $.ajax({
            url: 'code/get_question.php',
            method: 'POST',
            dataType: 'json',
            data: { id: id },
            success: function (data) {
                $('#edit_q_id').val(data.q_id);
                //$('#edit_q_course').val(data.q_course);
                //$('#edit_q_section').val(data.q_section);
                $('#edit_q_text').val(data.q_text);
                $('#edit_q_op1').val(data.q_op1);
                $('#edit_q_op2').val(data.q_op2);
                $('#edit_q_op3').val(data.q_op3);
                $('#edit_q_op4').val(data.q_op4);
                $('#edit_q_ans').val(data.q_ans);

                const courseSelect = $('#edit_q_course');
                courseSelect.empty();

                data.courses.forEach(course => {
                    const isSelected = course.c_id == data.q_course ? 'selected' : '';
                    courseSelect.append(`<option value="${course.c_id}" ${isSelected}>${course.c_name}</option>`);
                });

                const sectionSelect = $('#edit_q_section');
                sectionSelect.empty();

                data.sections.forEach(section => {
                    const isSelected = section.sec_id == data.q_section ? 'selected' : '';
                    sectionSelect.append(`<option value="${section.sec_id}" ${isSelected}>${section.sec_name}</option>`);
                });

                new bootstrap.Modal(document.getElementById('editQuestionModal')).show();
            }
        });
    });

    // Handle Edit Submit with SweetAlert For Question //
    $('#editQuestionForm').submit(function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you want to update this student\'s details?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'code/update_question.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        // Close the modal
                        bootstrap.Modal.getInstance(document.getElementById('editQuestionModal')).hide();

                        // Reload the table (e.g., DataTables)
                        if (typeof table !== 'undefined') {
                            table.ajax.reload();
                        }

                        // Show success message
                        Swal.fire({
                            title: 'Updated!',
                            text: 'Question information has been updated.',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: true
                        });
                    },
                    error: function () {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong while updating.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });


    // Delete Question Data //
    $(document).on('click', '.delete-question', function () {
    const questionId = $(this).data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this student record!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'code/delete_question.php',
                method: 'POST',
                data: { q_id: questionId },
                dataType: 'json',
                success: function (res) {
                    if (res.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: res.message,
                            timer: 2000,
                            showConfirmButton: true
                        }).then(() => {
                            location.reload(); // or use a function to refresh table
                        });
                    } else {
                        Swal.fire('Error!', res.error, 'error');
                    }
                },
                error: function () {
                    Swal.fire('Error!', 'Something went wrong while deleting.', 'error');
                }
            });
        }
    });
});

});


// Edit Question Details //
// $(document).ready(function() {
//   $('.editBtn-question').on('click', function(e) {
//     e.preventDefault();
//     var id = $(this).data('id');
//     $.ajax({
//       url: 'code/edit_question.php',
//       type: 'POST',
//       data: {id: id},
//       success: function(response) {
//         $('#editQuestionForm').html(response);
//         $('#editQuestionModal').modal('show');
//       }
//     });
//   });
// });


// // Update Question Details //
// $(document).ready(function() {
//   // AJAX Form Submission
//   $(document).on('submit', '#updateQuestionForm', function(e) {
//     e.preventDefault(); // Prevent default form submission

//     Swal.fire({
//       title: 'Are you sure?',
//       text: "Do you want to save changes?",
//       icon: 'question',
//       showCancelButton: true,
//       confirmButtonText: 'Yes, update it!'
//       }).then((result) => {
//         if (result.isConfirmed) {
//         // Place AJAX code here
//         $.ajax({
//               url: 'code/update_question.php',
//               type: 'POST',
//               data: $(this).serialize(),
//               success: function(response) {
//                 if (response.trim() === "success") {
//                   Swal.fire({
//                     icon: 'success',
//                     title: 'Success',
//                     text: 'Student record updated successfully!',
//                     showConfirmButton: true,
//                     // timer: 1500
//                   });
//                   //$('#editStudentModal').modal('show');

//                   // Close modal and refresh table
//                   setTimeout(function() {
//                     $('#editQuestionModal').modal('show');
//                     location.reload();
//                   }, 1600);
                  
//                 } else {
//                   Swal.fire({
//                     icon: 'error',
//                     title: 'Failed',
//                     text: 'Unable to update student data.'
//                   });
//                 }
//               },
//               error: function() {
//                 Swal.fire({
//                   icon: 'error',
//                   title: 'Error',
//                   text: 'An AJAX error occurred. Please try again.'
//                 });
//               }
//             });
//       }
//     });

//   });
// });


// // Delete Question //
// $(document).ready(function () {
//     $('.delete-question').click(function (e) {
//         e.preventDefault();
//         var studentId = $(this).data('id');

//         Swal.fire({
//             title: 'Are you sure?',
//             text: 'This action cannot be undone!',
//             icon: 'warning',
//             showCancelButton: true,
//             confirmButtonText: 'Yes, delete it!',
//             cancelButtonText: 'Cancel',
//         }).then((result) => {
//             if (result.isConfirmed) {
//                 $.ajax({
//                     url: 'code/delete_question.php',
//                     type: 'POST',
//                     data: { q_id: studentId },
//                     success: function (response) {
//                         if (response.trim() == 'success') {
//                             Swal.fire(
//                               'Deleted!', 
//                               'Question deleted successfully.', 
//                               'success'
//                               ).then(() =>{
//                                 location.reload();
//                               });
//                         } else {
//                             Swal.fire('Error!', 'Could not delete student.', 'error');
//                         }
//                     },
//                     error: function () {
//                         Swal.fire('Error!', 'AJAX request failed.', 'error');
//                     }
//                 });
//             }
//         });
//     });
// });



// Log out //
document.addEventListener('DOMContentLoaded', function () {
    const logoutForm = document.getElementById('logoutForm');

    if (logoutForm) {
        logoutForm.addEventListener('submit', function (e) {
            e.preventDefault();

            fetch('/cbt/logout.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            })
            .then(response => response.text())
            .then(data => {
                Swal.fire({
                    icon: 'success',
                    title: 'Logged out',
                    text: 'You have been successfully logged out.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Redirect based on folder (admin/ACC/student)
                        window.location.href = '/cbt/login.php';
                  
                });
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Logout Failed',
                    text: 'Something went wrong. Please try again.'
                });
                console.error('Logout error:', error);
            });
        });
    }
});





// Add Student //
$(document).ready(function () {
  $('#addStudentForm').on('submit', function (e) {
    e.preventDefault(); // Stop default submission

    const form = $(this);

    const formData = {
      regNumber: $('#regNumber').val(),
      name: $('#studentName').val(),
      stream: $('#stream').val(),
      email: $('#email').val(),
      password: $('#password').val()
    };

    $.ajax({
      url: 'code/submit_form.php', // Your backend endpoint
      type: 'POST',
      data: formData,
      success: function (response) {
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: response,
          confirmButtonColor: '#198754'
        }).then(() => {
          form[0].reset(); // ✅ Reset the form after success
        });
      },
      error: function (xhr, status, error) {
        Swal.fire({
          icon: 'error',
          title: 'Submission Failed',
          text: xhr.responseText || 'An unexpected error occurred!',
          confirmButtonColor: '#dc3545'
        });
      }
    });
  });
});

// Add Academic Coordinator //
$(document).ready(function () {
  $('#addAccordinatorForm').on('submit', function (e) {
    e.preventDefault(); // Stop default submission

    const form = $(this);

    const formData = {
      name: $('#name').val(),
      phoneno: $('#phoneno').val(),
      email: $('#email').val(),
      password: $('#password').val(),
      school: $('#school').val()
    };

    $.ajax({
      url: 'code/submit_acc.php', // Your backend endpoint
      type: 'POST',
      data: formData,
      success: function (response) {
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: response,
          confirmButtonColor: '#198754'
        }).then(() => {
          form[0].reset(); // ✅ Reset the form after success
        });
      },
      error: function (xhr, status, error) {
        Swal.fire({
          icon: 'error',
          title: 'Submission Failed',
          text: xhr.responseText || 'An unexpected error occurred!',
          confirmButtonColor: '#dc3545'
        });
      }
    });
  });
});



// Add Question //
$(document).ready(function () {
  $('#addQuestionForm').on('submit', function (e) {
    e.preventDefault(); // Stop default submission

    const form = $(this);

    const formData = {
      section: $('#section').val(),
      course: $('#course').val(),
      question: $('#question').val(),
      optionA: $('#optionA').val(),
      optionB: $('#optionB').val(),
      optionC: $('#optionC').val(),
      optionD: $('#optionD').val(),
      answer: $('#answer').val()
    };

    $.ajax({
      url: 'code/submit_question.php', // Your backend endpoint
      type: 'POST',
      data: formData,
      success: function (response) {
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: response,
          confirmButtonColor: '#198754'
        }).then(() => {
          form[0].reset(); // ✅ Reset the form after success
        });
      },
      error: function (xhr, status, error) {
        Swal.fire({
          icon: 'error',
          title: 'Submission Failed',
          text: xhr.responseText || 'An unexpected error occurred!',
          confirmButtonColor: '#dc3545'
        });
      }
    });
  });
});



// Upload Questions Excel or CSV //
$(document).ready(function () {
  $('#bulkQuestionUploadForm').on('submit', function (e) {
  e.preventDefault();

  const fileInput = $('#csvFile')[0];
  const file = fileInput.files[0];
  const allowedTypes = [
    'text/csv',
    'application/vnd.ms-excel',
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
  ];

  if (!file || !allowedTypes.includes(file.type)) {
    Swal.fire({
      icon: 'error',
      title: 'Invalid File',
      text: 'Only CSV or Excel (.xls, .xlsx) files are allowed.'
    });
    return;
  }

  const formData = new FormData(this);

  $.ajax({
    url: 'code/submit_bulk_questions.php',
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      Swal.fire({
        icon: 'success',
        title: 'Uploaded!',
        text: response
      }).then(() => {
        $('#bulkQuestionUploadForm')[0].reset();
        $('#questionModal').modal('hide');
      });
    },
    error: function (xhr) {
      Swal.fire({
        icon: 'error',
        title: 'Upload Failed',
        text: xhr.responseText || 'An unexpected error occurred.'
      });
    }
  });
});
});


// Upload Students Excel or CSV //
$(document).ready(function () {
  $('#bulkStudentUploadForm').on('submit', function (e) {
  e.preventDefault();

  const fileInput = $('#csvFile')[0];
  const file = fileInput.files[0];
  const allowedTypes = [
    'text/csv',
    'application/vnd.ms-excel',
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
  ];

  // if (!file || !allowedTypes.includes(file.type)) {
  //   Swal.fire({
  //     icon: 'error',
  //     title: 'Invalid File.',
  //     text: 'Only CSV or Excel (.xls, .xlsx) files are allowed.'
  //   });
  //   return;
  // }

  const formData = new FormData(this);

  $.ajax({
    url: 'code/submit_bulk_students.php',
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      Swal.fire({
        icon: 'success',
        title: 'Uploaded!',
        text: response
      }).then(() => {
        $('#bulkStudentUploadForm')[0].reset();
        $('#studentModal').modal('hide');
      });
    },
    error: function (xhr) {
      Swal.fire({
        icon: 'error',
        title: 'Upload Failed',
        text: xhr.responseText || 'An unexpected error occurred.'
      });
    }
  });
});
});
