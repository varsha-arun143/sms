<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exam Notifications - Academic Management</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Base styling */
    html, body {
      height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
    }
    .container {
      padding: 20px;
    }
    .card {
      margin-bottom: 20px;
      border: 1px solid #ddd;
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
    /* Increase overall text size for paragraphs */
    p {
      font-size: 1.50rem;
    }
    /* Table styling with increased font sizes */
    .table th,
    .table td {
      vertical-align: middle;
      font-size: 1.50rem; /* Increased table text size */
      padding: 0.75rem;
    }
    /* Increase font size for badges */
    .badge {
      font-size: 1,25rem;
      padding: 0.5rem 0.75rem;
    }
    /* Increase font size for buttons */
    .btn {
      font-size: 1.225rem;
      padding: 0.5rem 1rem;
    }
    /* Section heading for additional content */
    .section-heading {
      font-size: 1.75rem;
      font-weight: 600;
      margin-top: 30px;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

<div class="container my-4">
  <div class="row">
    <!-- Exam Notifications Section -->
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- Header for Exam Notifications -->
          <div class="heading-layout1 mb-3">
            <div class="item-title">
              <h3>Exam Notifications</h3>
            </div>
            <div class="dropdown">
              <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                ...
              </a>
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
          
          <p class="mb-3">Receive updates on upcoming assignments, quizzes, and tests.</p>
          
          <!-- Responsive Notifications Table for Exams -->
          <div class="table-responsive">
            <table class="table table-bordered text-nowrap">
              <thead>
                <tr>
                  <th>Notification Type</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Assignment</td>
                  <td>New assignment on Algebra available.</td>
                  <td>Mar 22, 2025</td>
                  <td><span class="badge badge-info">New</span></td>
                  <td><a href="#" class="btn btn-primary btn-sm">View Details</a></td>
                </tr>
                <tr>
                  <td>Quiz</td>
                  <td>Quiz on English grammar scheduled.</td>
                  <td>Mar 25, 2025</td>
                  <td><span class="badge badge-warning">Pending</span></td>
                  <td><a href="#" class="btn btn-primary btn-sm">View Details</a></td>
                </tr>
                <tr>
                  <td>Test</td>
                  <td>Science test on Environmental Science coming soon.</td>
                  <td>Mar 28, 2025</td>
                  <td><span class="badge badge-success">Upcoming</span></td>
                  <td><a href="#" class="btn btn-primary btn-sm">View Details</a></td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <!-- Additional section for Staff Notifications -->
          <div class="mt-4">
            <div class="section-heading">Staff Notifications</div>
            <p>Respond to leave notifications or messages from staff.</p>
            <!-- Responsive table for Staff Notifications -->
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
                    <td><a href="#" class="btn btn-secondary btn-sm">Reply</a></td>
                  </tr>
                  <tr>
                    <td>HR Department</td>
                    <td>Leave Reminder</td>
                    <td>Your remaining leave balance is low.</td>
                    <td>Mar 18, 2025</td>
                    <td><a href="#" class="btn btn-secondary btn-sm">Reply</a></td>
                  </tr>
                  <tr>
                    <td>Staff</td>
                    <td>Message</td>
                    <td>Please attend the meeting at 2 PM.</td>
                    <td>Mar 19, 2025</td>
                    <td><a href="#" class="btn btn-secondary btn-sm">Reply</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          
        </div><!-- End Card Body -->
      </div><!-- End Card -->
    </div><!-- End Col-12 -->
  </div><!-- End Row -->
</div><!-- End Container -->

<!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
