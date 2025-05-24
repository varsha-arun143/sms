<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Access Section</title>
    <style>
        /* Custom Styling */
        .heading-layout1 {
            margin-bottom: 40px;  /* Reduced for more space */
        }
        .item-title h3 {
            font-size: 24px;
            font-weight: bold;
        }
        .dropdown-menu-right .dropdown-item {
            font-size: 16px;
        }
        .table th {
            font-size: 18px;
            text-align: center;
        }
        .table td {
            font-size: 16px;
            text-align: center;
        }
        .btn {
            font-size: 14px;
        }
        .dropdown.mt-3 {
            margin-top: 20px;
            margin-bottom: 50px;  /* Increased margin-bottom for spacing */
        }
    </style>
</head>
<body>

<div class="row gutters-20">
    <!-- Quick Access Section -->
    <div class="col-12 col-xl-12 col-lg-12 col-md-12 mb-4">
        <div class="card dashboard-card-one pd-b-20">
            <div class="card-body">
                <div class="heading-layout1 mb-4">
                    <div class="item-title">
                        <h3>Quick Access to Class Schedules, Notifications, and Events</h3>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-times text-orange-red"></i> Close
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs text-dark-pastel-green"></i> Edit
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-redo-alt text-orange-peel"></i> Refresh
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Table for Quick Access -->
                <table class="table table-bordered table-striped" style="width: 100%; table-layout: fixed;">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Class Schedule Row -->
                        <tr>
                            <td><strong>Class Schedule</strong></td>
                            <td>Math - 10:00 AM | Science - 12:00 PM</td>
                            <td class="text-center"><a href="#" class="btn btn-info">View Schedule</a></td>
                        </tr>
                        <!-- Notifications Row -->
                        <tr>
                            <td><strong>Notifications</strong></td>
                            <td>Class Suspension on March 25th | New Exam Schedule Released</td>
                            <td class="text-center"><a href="#" class="btn btn-warning">View Notifications</a></td>
                        </tr>
                        <!-- Events Row -->
                        <tr>
                            <td><strong>Upcoming Events</strong></td>
                            <td>Sports Day - March 30th | Annual Day - April 5th</td>
                            <td class="text-center"><a href="#" class="btn btn-success">View Events</a></td>
                        </tr>
                    </tbody>
                </table>
                
                <!-- Edit and Refresh -->
                <div class="dropdown mt-3">
                    <a class="date-dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Edit or Refresh Data</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Edit Class Schedule</a>
                        <a class="dropdown-item" href="#">Update Notifications</a>
                        <a class="dropdown-item" href="#">Add Event</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
