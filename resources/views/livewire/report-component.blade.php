<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
<div class="flex justify-center items-center w-full h-80">


<!--Number of Appointment Chart-->
<div wire:ignore class="flex justify-center items-center">
        <canvas id="monthlyAppointmentsChart" style="width: 100%; height: 20rem;"></canvas> <!-- Unique ID for the first chart -->
        </div>

        @assets
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @endassets

        @script
        <script>
            const ctx1 = document.getElementById('monthlyAppointmentsChart'); // Reference the first chart

            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 
                    'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Number of Appointments',
                        data: @json(array_values($appointmentsData)),
                        borderWidth: 1,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', 
                        borderColor: 'rgba(75, 192, 192, 1)',
                    }]
                },
                options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: 'white' // Set y-axis font color to white
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)' // Optional: set grid color for better visibility
                    }
                },
                x: {
                    ticks: {
                        color: 'white' // Set x-axis font color to white
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)' // Optional: set grid color for better visibility
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'white' // Set legend font color to white
                    }
                },
                tooltip: {
                    titleColor: 'white', // Set tooltip title color to white
                    bodyColor: 'white', // Set tooltip body color to white
                }
            }
        }
            });
        </script>
        @endscript
    </div>

<!--Daily Appointments-->

    <div class="flex justify-center items-center w-full h-80">
        <div wire:ignore class="flex justify-center items-center">
            <canvas id="dailyAppointmentsChart"style="width: 100%; height: 20rem;" ></canvas> <!-- Unique ID for the second chart -->
        </div>

        @assets
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @endassets

        @script
        <script>
            const ctx2 = document.getElementById('dailyAppointmentsChart'); // Reference the second chart

            new Chart(ctx2, {
                type: 'line',
                data: {
                    labels:@json(array_column($dailyAppointmentsData, 'date')), // Extract formatted dates with days of the week
                    datasets: [{
                        label: 'Daily Appointments',
                        borderColor: 'rgba(153, 102, 255, 1)', 
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',                       
                        data: @json(array_column($dailyAppointmentsData, 'count')), // Extract counts
                        borderWidth: 1,
                        fill: true // Set to true if you want the area under the line to be filled
                    }]
                },
                options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        //title: {
                 //   display: true,
                 //   text: 'Number of Appointments', // Y-axis title
                 //   color: 'white' // Title color
              //  },
                        ticks: {
                            color: 'white' // Set y-axis font color to white
                        }
                    },
                    x: {
                    //    title: {
                    //display: true,
                 //   text: 'Date', // X-axis title
                 //   color: 'white' // Title color

              //  },
                        ticks: {
                            color: 'white' // Set x-axis font color to white
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'white' // Set legend font color to white
                        }
                    },
                    tooltip: {
                        titleColor: 'white', // Set tooltip title color to white
                        bodyColor: 'white', // Set tooltip body color to white
                    }
                }
            }
            });
        </script>
        @endscript
    </div>

        <!--Appointment by Lecturer-->
    <div class="flex justify-center items-center w-full h-80">
        <div wire:ignore class="flex justify-center items-center">
            <canvas id="appointmentsByLecturerChart"style="width: 100%; height: 20rem;" ></canvas> <!-- Unique ID for the second chart -->
        </div>

        @assets
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @endassets

        @script
        <script>
            const ctxLecturer = document.getElementById('appointmentsByLecturerChart'); // Reference the second chart

            new Chart(ctxLecturer, {
                type: 'bar',
                data: {
                    labels:@json(array_keys($appointmentsByLecturerData)), // Lecturer IDs or names as labels
                    datasets: [{
                        label: 'Number of Appointments by Lecturer',
                        borderColor: 'rgba(255, 255, 0, 1)', 
                        backgroundColor: 'rgba(255, 255, 0, 0.2)',
                        data: @json(array_values($appointmentsByLecturerData)),
                        borderWidth: 1
                    }]
                },
                options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Appointments',
                        color: 'grey'
                    },
                    ticks: {
                        color: 'white'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Lecturer Name',
                        color: 'grey'
                    },
                    ticks: {
                        color: 'white'
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: 'white'
                    }
                },
                tooltip: {
                    titleColor: 'white',
                    bodyColor: 'white',
                }
            }
        }
            });
        </script>
        @endscript
    </div>
</div>
