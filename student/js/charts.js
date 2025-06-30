document.addEventListener('DOMContentLoaded', () => {
    fetch('code/get_student_scores.php')
        .then(response => response.json())
        .then(result => {
            if (result.error) {
                alert(result.error);
                return;
            }

            // Generate visually distinct HSL colors
            const generateColors = (count) => {
                const colors = [];
                const step = 360 / count;
                for (let i = 0; i < count; i++) {
                    const hue = i * step;
                    colors.push(`hsl(${hue}, 70%, 60%)`);
                }
                return colors;
            };

            const backgroundColors = generateColors(result.data.length);

            const ctx = document.getElementById('myScoreChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: result.labels,
                    datasets: [{
                        label: 'My Score',
                        data: result.data,
                        backgroundColor: backgroundColors,
                        borderColor: backgroundColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Exam Performance'
                        },
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: (ctx) => `Score: ${ctx.raw}`
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max:30,
                            title: {
                                display: true,
                                text: 'Score'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Exam Date'
                            }
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Chart error:', error));
});
