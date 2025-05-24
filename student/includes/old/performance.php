<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Performance Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Table and Chart Styling */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th, .table td {
            text-align: left;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table-bordered {
            border: 1px solid #ddd;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #ddd;
        }

        .card {
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .heading-layout1 {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .item-title {
            font-size: 20px;
            font-weight: bold;
        }

        .performance-summary {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
        }

        .performance-item {
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            color: #fff;
            width: 30%;
        }

        .pseudo-bg-blue { background-color: #2196F3; }
        .pseudo-bg-green { background-color: #4CAF50; }
        .pseudo-bg-orange { background-color: #FF9800; }
    </style>
</head>
<body>

<div class="row gutters-20">
    <!-- Academic Progress and Performance Report Section -->
    <div class="col-12 col-xl-8 col-6-xxxl">
        <div class="card dashboard-card-one pd-b-20">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Student Academic Progress & Performance</h3>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-times text-orange-red"></i>Close
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs text-dark-pastel-green"></i>Edit
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-redo-alt text-orange-peel"></i>Refresh
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Academic Progress (Round Chart for performance) -->
                <div class="progress-chart-wrap">
                    <canvas id="academic-progress-chart" width="300" height="300"></canvas>
                </div>
                <div class="performance-summary">
                    <div class="performance-item pseudo-bg-blue">
                        <h4>Overall Progress</h4>
                        <span>85%</span>
                    </div>
                    <div class="performance-item pseudo-bg-green">
                        <h4>Subject Mastery</h4>
                        <span>90%</span>
                    </div>
                    <div class="performance-item pseudo-bg-orange">
                        <h4>Assignments Completed</h4>
                        <span>80%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Attendance Summary Section -->
    <div class="col-12 col-xl-4 col-3-xxxl">
        <div class="card dashboard-card-two pd-b-20">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Attendance Summary</h3>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-times text-orange-red"></i>Close
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs text-dark-pastel-green"></i>Edit
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-redo-alt text-orange-peel"></i>Refresh
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Attendance Summary Table -->
                <div class="attendance-summary-table">
                    <table class="table text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Attendance</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>January</td>
                                <td>28/30</td>
                                <td>Good</td>
                            </tr>
                            <tr>
                                <td>February</td>
                                <td>26/28</td>
                                <td>Good</td>
                            </tr>
                            <tr>
                                <td>March</td>
                                <td>29/30</td>
                                <td>Excellent</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Class Schedule Section -->
 
</div>

<script>
    // Data for Academic Progress Chart (You can replace it with actual data)
    var ctx = document.getElementById('academic-progress-chart').getContext('2d');
    var progressChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Subject Mastery', 'Assignments Completed', 'Overall Progress'],
            datasets: [{
                data: [90, 80, 85],
                backgroundColor: ['#4caf50', '#ff9800', '#2196f3'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                        }
                    }
                }
            }
        }
    });
</script>

</body>
</html>
