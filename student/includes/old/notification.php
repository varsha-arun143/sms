<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Notifications - Academic Management</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Base styling */
    html, body {
      height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
    }
    .container {
      padding: 40px;
    }
    .card {
      margin-bottom: 40px;
    }
    /* Heading layout styling with increased font sizes */
    .heading-layout1 {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }
    .heading-layout1 .item-title h3 {
      margin: 0;
      font-size: 2rem; /* Increased font size */
      font-weight: 600;
    }
    .dropdown-toggle {
      font-size: 1.75rem; /* Increased font size */
    }
    /* Table styling with increased font sizes */
    .table th,
    .table td {
      vertical-align: middle;
      font-size: 1.50rem; /* Increased table text size */
    }
    /* Increase font size for badge text */
    .badge {
      font-size: 1.5rem;
    }
    /* Increase font size for buttons */
    .btn {
      font-size: 1.5rem;
      margin-top: 5px;
    }
    /* Responsive adjustments */
    @media (max-width: 767.98px) {
      .card .card-body {
        text-align: center;
      }
    }
  </style>
</head>
<body>

<div class="container my-4">
  <div class="row gutters-20">
    <!-- Notifications for Class Schedules, Fee Reminders, and Exams -->
    <div class="col-12 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="heading-layout1">
            <div class="item-title">
              <h3>General Notifications</h3>
            </div>
            <div class="dropdown">
              <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i> Close</a>
                <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i> Edit</a>
                <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i> Refresh</a>
              </div>
            </div>
          </div>
          <!-- Responsive table for general notifications -->
          <div class="table-responsive">
            <table class="table table-bordered text-nowrap">
              <thead>
                <tr>
                  <th>Type</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Class Schedule</td>
                  <td>Math class rescheduled to 10 AM</td>
                  <td>Mar 20, 2025</td>
                  <td><span class="badge badge-info">New</span></td>
                </tr>
                <tr>
                  <td>Fee Reminder</td>
                  <td>Fee payment due by March 25</td>
                  <td>Mar 18, 2025</td>
                  <td><span class="badge badge-warning">Pending</span></td>
                </tr>
                <tr>
                  <td>Exam Notification</td>
                  <td>Mid-term exam scheduled for April 5</td>
                  <td>Mar 15, 2025</td>
                  <td><span class="badge badge-success">Upcoming</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
    
    
    <!-- Leave Notifications & Staff Messages -->
    <div class="col-12 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="heading-layout1">
            <div class="item-title">
              <h3>Leave Notifications & Staff Messages</h3>
            </div>
            <div class="dropdown">
              <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i> Close</a>
                <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i> Edit</a>
                <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i> Refresh</a>
              </div>
            </div>
          </div>
          <!-- Responsive table for leave notifications and staff messages -->
          <div class="table-responsive">
            <table class="table table-bordered text-nowrap">
              <thead>
                <tr>
                  <th>Sender</th>
                  <th>Type</th>
                  <th>Message</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Principal</td>
                  <td>Leave Approval</td>
                  <td>Your leave request has been approved.</td>
                  <td>Mar 20, 2025</td>
                  <td><a href="#" class="btn btn-primary btn-sm">Reply</a></td>
                </tr>
                <tr>
                  <td>Staff</td>
                  <td>Message</td>
                  <td>Please attend the staff meeting at 2 PM.</td>
                  <td>Mar 19, 2025</td>
                  <td><a href="#" class="btn btn-primary btn-sm">Reply</a></td>
                </tr>
                <tr>
                  <td>HR Department</td>
                  <td>Leave Reminder</td>
                  <td>Your remaining leave balance is low.</td>
                  <td>Mar 18, 2025</td>
                  <td><a href="#" class="btn btn-primary btn-sm">Reply</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
  </div><!-- End row -->
</div><!-- End container -->

<!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
