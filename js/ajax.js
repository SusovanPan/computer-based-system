$(document).ready(function () {
  $('#loginForm').on('submit', function(e) {
    e.preventDefault();

    const role = $('#role').val();
    const username = $('#username').val();
    const password = $('#password').val();

    $.ajax({
      url: 'login_code.php',
      type: 'POST',
      dataType: 'json',
      data: {
        role: role,
        username: username,
        password: password
      },
      success: function(response) {
        if (response.status === 'success') {
          Swal.fire({
            icon: 'success',
            title: 'Login Successful',
            text: 'Redirecting...',
            showCancelButton: false,
            allowOutsideClick: false,
          }).then(() => {

            if (role === 'Admin') {
              window.location.href = 'admin/index.php';
            } else if (role === 'Acc') {
              window.location.href = 'acc/index.php';
            } else if (role === 'Student') {
              window.location.href = 'student/index.php';
            }
            
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Login Failed',
            text: response.message
          });
        }
      },
      error: function(xhr, status, error) {
        Swal.fire({
          icon: 'error',
          title: 'Server Error',
          text: 'Could not connect to server. Check console.'
        });
        console.error("AJAX error:", status, error);
        console.log(xhr.responseText);
      },
    });
  });
});