<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Management Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between; /* Ensures proper spacing between cards */
        }

        .col-12 {
            flex: 1 1 100%;
            padding: 10px;
        }

        .col-xl-8 {
            flex: 0 0 66.66%;
        }

        .col-xl-6 {
            flex: 0 0 50%;
        }

        .col-xl-4 {
            flex: 0 0 33.33%;
        }

        .col-3-xxxl {
            flex: 0 0 25%;
        }

        .col-lg-12,
        .col-md-12 {
            flex: 0 0 100%;
        }

        /* Card Styling */
        .card {
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background: #fff;
            width: 100%;
            margin-bottom: 20px;
        }

        .card-body {
            padding: 0;
        }

        /* Table Styling */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th, .table td {
            text-align: left;
            padding: 12px;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #ddd;
        }

        /* Heading Styling */
        .heading-layout1 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .item-title {
            font-size: 24px;
            font-weight: bold;
        }

        /* Performance Summary */
        .operation-summary {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .operation-item {
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            color: #fff;
            flex: 1;
            margin-right: 10px;
        }

        .pseudo-bg-blue { background-color: #2196F3; }
        .pseudo-bg-green { background-color: #4CAF50; }
        .pseudo-bg-orange { background-color: #FF9800; }

        /* Responsive Layout */
        @media (max-width: 768px) {
            .operation-summary {
                flex-direction: column;
            }

            .operation-item {
                margin-right: 0;
                margin-bottom: 20px;
            }

            .col-xl-4,
            .col-xl-6,
            .col-12 {
                flex: 0 0 100%;
            }
        }
    </style>
</head>
<body>

<div class="row gutters-20">
    <!-- Class Timetable Section -->
    <div class="col-12 col-xl-8 col-6-xxxl">
        <div class="card dashboard-card-one pd-b-20">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Class Timetable</h3>
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

                <!-- Class Routine -->
                <div class="routine-wrap">
                    <table class="table text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Monday</td>
                                <td>Class 5A</td>
                                <td>Math</td>
                                <td>9:00 AM - 10:00 AM</td>
                            </tr>
                            <tr>
                                <td>Tuesday</td>
                                <td>Class 5A</td>
                                <td>English</td>
                                <td>10:00 AM - 11:00 AM</td>
                            </tr>
                            <tr>
                                <td>Wednesday</td>
                                <td>Class 5A</td>
                                <td>Science</td>
                                <td>11:00 AM - 12:00 PM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Class Details Section -->
   <div class="col-12 col-xl-8 col-6-xxxl">
        <div class="card dashboard-card-two pd-b-20">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Class Details</h3>
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

                <!-- Class Overview Content -->
                <div class="item-content">
                    <div class="single-item pseudo-bg-blue">
                        <h4>Class</h4>
                        <span>Class 5A</span>
                    </div>
                    <div class="single-item pseudo-bg-green">
                        <h4>Subject</h4>
                        <span>Math, English, Science</span>
                    </div>
                    <div class="single-item pseudo-bg-orange">
                        <h4>Teacher</h4>
                        <span>Mr. John</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Attendance Summary Section -->
    <div class="col-12 col-xl-6 col-4-xxxl">
        <div class="card dashboard-card-three pd-b-20">
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

</div>

</body>
</html>
