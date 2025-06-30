
// Result Details //
$(document).ready(function () {
    const table = $('#resultTable').DataTable({
        ajax: 'code/fetch_result.php',
        columns: [
            { title: "Student Name" },
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
                          text: '<i class="fas fa-file-csv"></i>',
                          titleAttr: 'Export to CSV',
                          className: 'btn btn-secondary'
                      },
                      {
                          extend: 'excel',
                          text: '<i class="fas fa-file-excel"></i>',
                          titleAttr: 'Export to Excel',
                          className: 'btn btn-success'
                      },
                      {
                          extend: 'pdf',
                          text: '<i class="fas fa-file-pdf"></i>',
                          titleAttr: 'Export to PDF',
                          className: 'btn btn-danger'
                      },
                      {
                          extend: 'print',
                          text: '<i class="fas fa-print"></i>',
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


// Question Details //
$(document).ready(function () {
    const table = $('#questionTable').DataTable({
        ajax: 'code/fetch_question.php',
        columns: [
            { title: "Q.Id" },
            { title: "Course" },
            { title: "Section" },
            { title: "Level" },
            { title: "Blooms's Level" },
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
                          text: '<img src="https://cdn-icons-png.flaticon.com/512/9496/9496460.png" style="height:26px; object-fit:content; vertical-align:middle;" alt="CSV">',
                          titleAttr: 'Export to CSV',
                          className: 'btn btn-secondary btn-sm border-0 p-1'
                      },
                      {
                          extend: 'excel',
                          text: '<img src="https://cdn-icons-png.flaticon.com/512/4726/4726040.png" style="height:26px; object-fit:content; vertical-align:middle;" alt="Excel">',
                          titleAttr: 'Export to Excel',
                          className: 'btn btn-success btn-sm border-0 p-1'
                      },

                      {
                        extend: 'pdfHtml5',
                        text: '<img src="https://cdn-icons-png.flaticon.com/512/4726/4726010.png" style="height:26px; object-fit:content; vertical-align:middle;" alt="PDF">',
                        className: 'btn btn-danger btn-sm border-0 p-1',
                        title: 'All Questions',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        exportOptions: {
                            modifier: { page: 'all' }
                        },
                        customize: function (doc) {
                            doc.defaultStyle.fontSize = 7;
                            doc.styles.tableHeader.fontSize = 9;
                            doc.pageMargins = [10, 10, 10, 10];
                            doc.defaultStyle.lineHeight = 1.1;

                            var colCount = doc.content[1].table.body[0].length;
                            doc.content[1].table.widths = Array(colCount).fill('*');
                        }
                    },

                    {
                        extend: 'print',
                        text: '<img src="https://cdn-icons-png.flaticon.com/512/4725/4725570.png" style="height:26px; object-fit:content; vertical-align:middle;" alt="Print">',
                        className: 'btn btn-primary btn-sm border-0 p-1',
                        title: 'All Questions',
                        exportOptions: {
                            modifier: {
                                page: 'all'  // ✅ Print all rows
                            }
                        },
                        customize: function (win) {
                            // Inject custom styles into print window
                            $(win.document.body).css({
                                'font-size': '7pt',
                                'margin': '0',
                                'padding': '10px'
                            });

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css({
                                    'font-size': 'inherit',
                                    'width': '100%',
                                    'table-layout': 'auto',
                                    'border-collapse': 'collapse',
                                    'word-wrap': 'break-word'
                                });

                            // Style all table cells
                            $(win.document.body).find('table th, table td').css({
                                'padding': '3px',
                                'border': '1px solid #ccc',
                                'vertical-align': 'top',
                                'word-break': 'break-word'
                            });

                            // Force landscape (optional)
                            const landscapeStyle = '@page { size: landscape; }';
                            const head = win.document.head || win.document.getElementsByTagName('head')[0];
                            const style = win.document.createElement('style');
                            style.type = 'text/css';
                            style.media = 'print';
                            style.appendChild(win.document.createTextNode(landscapeStyle));
                            head.appendChild(style);
                        }
                      },
                      {
                         extend: 'colvis',
                         text: '<img src="https://cdn-icons-png.flaticon.com/512/15658/15658610.png" style="height:26px; object-fit:content; vertical-align:middle;" alt="Filter">',
                         titleAttr: 'Toggle column visibility',
                         className: 'btn btn-info border-0 p-1 '
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


                const levelSelect = $('#edit_q_level');
                levelSelect.empty();

                data.levels.forEach(level => {
                    const isSelected = level.question_level_id == data.q_level ? 'selected' : '';
                    levelSelect.append(`<option value="${level.question_level_id}" ${isSelected}>${level.question_level_name}</option>`);
                });

                
                const bloomslevelSelect = $('#edit_q_blooms_level');
                bloomslevelSelect.empty();

                data.bloomslevels.forEach(bloomslevel => {
                    const isSelected = bloomslevel.question_bloomslevel_id == data.q_blooms_level ? 'selected' : '';
                    bloomslevelSelect.append(`<option value="${bloomslevel.question_bloomslevel_id}" ${isSelected}>${bloomslevel.question_bloomslevel_name}</option>`);
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


// logout code //
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



// Add Students
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



// Add Questions
$(document).ready(function () {
  $('#addQuestionForm').on('submit', function (e) {
    e.preventDefault(); // Stop default submission

    const form = $(this);

    const formData = {
      section: $('#section').val(),
      course: $('#course').val(),
      q_level: $('#q_level').val(),
      q_blooms_level: $('#q_blooms_level').val(),
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
  //     title: 'Invalid File',
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
