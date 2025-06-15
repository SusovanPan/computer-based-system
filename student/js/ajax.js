// Feedback Form //
$(document).ready(function () {
  $('#addFeedbackform').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
      url: 'code/save_feedback.php',
      type: 'POST',
      data: $(this).serialize(),
      success: function (response) {
        Swal.fire({
          icon: 'success',
          title: 'Thank you!',
          text: response,
        });

        // Optionally reset the form
        $('#addFeedbackform')[0].reset();
      },
      error: function () {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong while submitting your feedback.',
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
                    showCancelButton: false,
                    allowOutsideClick: false,
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



// Submit Answer //
$(document).on('submit', '#submitAnswerFrm', function(){
  var examAction = $('#examAction').val();
  if(examAction == "autoSubmit")
  {
    Swal.fire({
    title: 'Time Out',
    text: "your time is over, please click ok",
    icon: 'warning',
    showCancelButton: false,
    allowOutsideClick: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'OK!'
}).then((result) => {
if (result.value) {
   $.post("code/submitAnswerExe.php", $(this).serialize(), function(data){
    if(data.res == "success")
    {
        Swal.fire({
            title: 'Success',
            text: "your answer successfully submitted!",
            icon: 'success',
            allowOutsideClick: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK!'
        }).then((result) => {
        if (result.value) {
          $('#submitAnswerFrm')[0].reset();
           // var exam_id = $('#exam_id').val();
           window.location.href='result.php';
        }
    });
    }
    else if(data.res == "failed")
    {
     Swal.fire(
         'Error',
         "Something;s went wrong",
         'error'
       ) 
    }
   },'json');
}
});
  }
  else
  {
    Swal.fire({
    title: 'Are you sure?',
    text: "you want to submit your answer now?",
    icon: 'warning',
    showCancelButton: true,
    allowOutsideClick: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, submit now!'
}).then((result) => {
if (result.value) {
   $.post("code/submitAnswerExe.php", $(this).serialize(), function(data){
    if(data.res == "success")
    {
        Swal.fire({
            title: 'Success',
            text: "your answer successfully submitted!",
            icon: 'success',
            allowOutsideClick: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK!'
        }).then((result) => {
        if (result.value) {
          $('#submitAnswerFrm')[0].reset();
          $('submitAnswerFrmBtn').attr("disabled", "disabled");
           //var exam_id = $('#exam_id').val();
           window.location.href='result.php';
        }
        });
    }
    else if(data.res == "failed")
    {
     Swal.fire(
         'Error',
         "Something;s went wrong",
         'error'
       ) 
    }

   },'json');
}
});
  }

return false;
});
