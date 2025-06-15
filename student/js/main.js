document.getElementById("exam-alert").addEventListener('click', function (e) {
    e.preventDefault();
    Swal.fire({
      text: 'You want to take this exam now, your time will start automaticaly!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, start now!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
          type : "post",
          url : "code/selExamAttemptExe.php",
          dataType : "json",  
          cache : false,
          success : function(data){
            if(data.res == "taken")
            {
              Swal.fire(
                'Already Taken ',
                'You already take this exam.',
                'error'
              )
            }
            else if(data.res == "not_taken")
            {
              window.location.href="exam.php";
              return false;
            }
            else if(data.res == "no_exam")
            {
                Swal.fire(
                'Sorry!',
                'You dont have any exam today.',
                'error'
              )
            }
          },
          error : function(xhr, ErrorStatus, error){
            console.log(status.error);
          }

        });
        }
    });
});

// Timer Code
var examTimer;
var totalSeconds;

function startTimer(durationInMinutes) {
    totalSeconds = durationInMinutes * 60;

    examTimer = setInterval(function () {
        var minutes = Math.floor(totalSeconds / 60);
        var seconds = totalSeconds % 60;

        // Corrected line: Update #timerDisplay instead of #countdown
        var timerDisplay = document.getElementById('timerDisplay');
        if (timerDisplay) {
            timerDisplay.value = 
                (minutes < 10 ? '0' : '') + minutes + ":" +
                (seconds < 10 ? '0' : '') + seconds;
        }

        if (--totalSeconds < 0) {
            clearInterval(examTimer);
            $('#examAction').val("autoSubmit");
            $('#submitAnswerFrm').submit();
        }
    }, 1000);
}

document.addEventListener('DOMContentLoaded', function () {
    var timeLimitInput = document.getElementById('timeExamLimit');
    if (timeLimitInput) {
        var timeLimit = parseInt(timeLimitInput.value, 10);
        if (!isNaN(timeLimit)) {
            startTimer(timeLimit);
        }
    }
});


// Question Section Next and Prev code
document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.question-section');
    let current = 0;

    function showSection(index) {
        sections.forEach((sec, i) => {
            sec.style.display = i === index ? 'block' : 'none';
        });
    }
    document.querySelectorAll('.nextBtn').forEach((btn, i) => {
        btn.addEventListener('click', function() {
            if (current < sections.length - 1) {
                current++;
                showSection(current);
            }
        });
    });
    document.querySelectorAll('.prevBtn').forEach((btn, i) => {
        btn.addEventListener('click', function() {
            if (current > 0) {
                current--;
                showSection(current);
            }
        });
    });
    showSection(current);
});



function updateDateTime() {
    const now = new Date();
    const date = now.toLocaleDateString();
    const time = now.toLocaleTimeString();
    document.getElementById("datetime").innerHTML = date + " | " + time;
    }

setInterval(updateDateTime, 1000); // Update time every second
window.onload = updateDateTime; // Initialize on load