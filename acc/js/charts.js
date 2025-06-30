async function exportChartToPDF() {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF();

  const canvas = document.getElementById('performanceChart');
  const imgData = canvas.toDataURL('image/png', 1.0);

  const imgProps = doc.getImageProperties(imgData);
  const pdfWidth = doc.internal.pageSize.getWidth();
  const pdfHeight = (imgProps.height * (pdfWidth - 20)) / imgProps.width; // keep 10px margin on both sides

  // Add chart image
  doc.addImage(imgData, 'PNG', 10, 30, pdfWidth - 20, pdfHeight);

  // Add centered title
  const title = "Student Performance Chart";
  doc.setFontSize(18);
  const textWidth = doc.getTextWidth(title);
  const x = (pdfWidth - textWidth) / 2;
  doc.text(title, x, 20); // Y=20 (above the image)

  // Save PDF
  doc.save("student_performance_chart.pdf");
}





// Students Performance //
const performanceCtx = document.getElementById('performanceChart').getContext('2d');
let performanceChart;

function fetchStudentPerformance(date = '') {
  fetch( `code/get_student_performance.php?date=${date}`)
    .then(response => response.json())
    .then(data => {
      const labels = data.labels.map((name, i) => `${name} (${data.data[i]})`);
      const values = data.data;


      const backgroundColors = labels.map((_, i) =>
        `hsl(${(i * 60) % 360}, 70%, 70%)`
      );

      if (performanceChart) {
        performanceChart.destroy();
      }

      performanceChart = new Chart(performanceCtx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: 'Score',
            data: values,
            backgroundColor: backgroundColors,
            borderColor: backgroundColors.map(c => c.replace('70%', '50%')),
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            title: {
              display: true,
              text: 'Student Scores by Exam Date'
            },
            legend: { display: false }
          },
          scales: {
            y: {
              beginAtZero: true,
              max: 30, // <-- Set max value here
              title: { display: true, text: 'Marks' }
            },
            x: {
              title: { display: true, text: 'Students' }
            }
          }
        }
      });
    })
    .catch(err => console.error('Performance chart fetch failed:', err));
}

// Load on date change
document.getElementById('performanceDate').addEventListener('change', function () {
  fetchStudentPerformance(this.value);
});

// Initial load without date filter
fetchStudentPerformance();


// Blooms Level wise//
const bloomsCtx = document.getElementById('bloomsChart').getContext('2d');
  let bloomsChart;

  // Function to render Bloom's chart
 function fetchBloomsData(sectionId = '') {
  fetch('code/get_blooms_data.php?sec_id=' + sectionId)
    .then(response => response.json())
    .then(data => {
      const labels = data.labels;
      const values = data.data;

      // Generate different colors for each bar
      const backgroundColors = [
        'rgba(255, 99, 132, 0.7)',
        'rgba(54, 162, 235, 0.7)',
        'rgba(255, 206, 86, 0.7)',
        'rgba(75, 192, 192, 0.7)',
        'rgba(153, 102, 255, 0.7)',
        'rgba(255, 159, 64, 0.7)',
        'rgba(199, 199, 199, 0.7)' // Add more if needed
      ];

      const borderColors = backgroundColors.map(c => c.replace('0.7', '1'));

      // Destroy previous chart instance
      if (bloomsChart) {
        bloomsChart.destroy();
      }

      // Create new chart
      bloomsChart = new Chart(bloomsCtx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: 'Number of Questions',
            data: values,
            backgroundColor: backgroundColors.slice(0, labels.length),
            borderColor: borderColors.slice(0, labels.length),
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            title: {
              display: true,
              text: "Questions per Bloom's Level"
            },
            legend: { display: false }
          },
          scales: {
            y: {
              beginAtZero: true,
              title: { display: true, text: 'Number of Questions' }
            },
            x: {
              title: { display: true, text: "Bloom's Level" }
            }
          }
        }
      });
    })
    .catch(error => {
      console.error("Failed to fetch Bloom's level data:", error);
    });
}


  // Populate Bloom's Level Section Dropdown
  fetch('code/get_sections.php')
    .then(response => response.json())
    .then(sections => {
      const select = document.getElementById('bloomsSectionSelect');
      sections.forEach(sec => {
        const option = document.createElement('option');
        option.value = sec.sec_id;
        option.textContent = sec.sec_name;
        select.appendChild(option);
      });
    });

  // Handle section change for Bloom's chart
  document.getElementById('bloomsSectionSelect').addEventListener('change', function () {
    fetchBloomsData(this.value);
  });

  // Initial load with all sections
  fetchBloomsData();

  // Optional: Auto-refresh every 15 seconds
  // setInterval(() => {
  //   const currentSection = document.getElementById('bloomsSectionSelect').value;
  //   fetchBloomsData(currentSection);
  // }, 15000);


//Question Difficulty level wise//
const ctx = document.getElementById('difficultyChart').getContext('2d');
  let difficultyChart = null;

  function renderChart(labels, counts) {
    if (difficultyChart) {
      difficultyChart.destroy(); // Destroy previous chart
    }

    difficultyChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Number of Questions',
          data: counts,
          backgroundColor: [
            'rgba(54, 162, 235, 0.7)',
            'rgba(255, 206, 86, 0.7)',
            'rgba(255, 99, 132, 0.7)'
          ],
          borderColor: [
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(255, 99, 132, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Questions by Difficulty Level'
          },
          legend: { display: false }
        },
        scales: {
          y: {
            beginAtZero: true,
            title: { display: true, text: 'Number of Questions' }
          },
          x: {
            title: { display: true, text: 'Difficulty Level' }
          }
        }
      }
    });
  }

  function fetchChartData(sectionId = '') {
    fetch('code/get_chart_data.php?sec_id=' + sectionId)
      .then(response => response.json())
      .then(data => {
        const labels = data.labels;
        const counts = data.data;
        renderChart(labels, counts);
      })
      .catch(err => {
        console.error("Failed to fetch chart data:", err);
        renderChart([], []);
      });
  }

  // Populate dropdown
  fetch('code/get_sections.php')
    .then(response => response.json())
    .then(sections => {
      const select = document.getElementById('sectionSelect');
      sections.forEach(sec => {
        const opt = document.createElement('option');
        opt.value = sec.sec_id;
        opt.textContent = sec.sec_name;
        select.appendChild(opt);
      });
    });

  // Handle dropdown change
  document.getElementById('sectionSelect').addEventListener('change', function () {
    fetchChartData(this.value);
  });

  // Initial load
  fetchChartData();

  // Auto refresh
  setInterval(() => {
    const currentSection = document.getElementById('sectionSelect').value;
    fetchChartData(currentSection);
  }, 10000);

