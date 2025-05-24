<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Support & Assistance - Academic Management</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome for Icons (optional) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Base Styles */
    body {
      font-family: Arial, sans-serif;
      background: #f8f9fa;
      margin: 0;
      padding: 0;
    }
    /* Card Container */
    .card-container {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 30px;
      margin: 30px auto;
      max-width: 900px;
    }
    /* Section Headings */
    .card-container h3 {
      font-size: 2.2rem;
      font-weight: bold;
      margin-bottom: 20px;
      text-align: center;
    }
    .card-container p {
      font-size: 1.5rem;
      margin-bottom: 30px;
      text-align: center;
    }
    /* Data Table Styling */
    .table-responsive {
      margin-top: 20px;
    }
    .table th,
    .table td {
      font-size: 1.5rem;
      vertical-align: middle;
    }
    /* Action Button Styling */
    .btn-action {
      font-size: 1.5rem;
      padding: 0.5rem 1rem;
      margin-right: 5px;
    }
    /* Support Form Styling */
    .support-form .form-control {
      font-size: 1.5rem;
      padding: 0.75rem 1rem;
      margin-bottom: 20px;
    }
    .support-form label {
      font-size: 1.5rem;
      font-weight: bold;
    }
    .support-form .btn-submit {
      font-size: 1.5rem;
      padding: 0.75rem 2rem;
    }
    /* Responsive Adjustments */
    @media (max-width: 576px) {
      .card-container {
        padding: 20px;
      }
      .card-container h3 {
        font-size: 1.8rem;
      }
      .card-container p {
        font-size: 1.4rem;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Section 1: Submitted Queries Status -->
  <div class="card-container">
    <h3>Submitted Queries Status</h3>
    <p>Track the status of your submitted queries and view details.</p>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="thead-light">
          <tr>
            <th>Query ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Date Submitted</th>
            <th>Last Updated</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#Q101</td>
            <td>Issue with Online Payment</td>
            <td><span class="badge badge-warning">Pending</span></td>
            <td>Mar 20, 2025</td>
            <td>Mar 21, 2025</td>
            <td>
              <button class="btn btn-primary btn-action">View</button>
            </td>
          </tr>
          <tr>
            <td>#Q102</td>
            <td>Feedback on New Exam Schedule</td>
            <td><span class="badge badge-success">Resolved</span></td>
            <td>Mar 18, 2025</td>
            <td>Mar 19, 2025</td>
            <td>
              <button class="btn btn-primary btn-action">View</button>
            </td>
          </tr>
          <tr>
            <td>#Q103</td>
            <td>Query about Fee Concession</td>
            <td><span class="badge badge-info">In Process</span></td>
            <td>Mar 22, 2025</td>
            <td>Mar 23, 2025</td>
            <td>
              <button class="btn btn-primary btn-action">View</button>
            </td>
          </tr>
          <tr>
            <td>#Q104</td>
            <td>Issue with Lecture Download</td>
            <td><span class="badge badge-danger">Rejected</span></td>
            <td>Mar 19, 2025</td>
            <td>Mar 20, 2025</td>
            <td>
              <button class="btn btn-primary btn-action">View</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Section 2: View Responses from Support Staff -->
  <div class="card-container">
    <h3>View Responses from Support Staff</h3>
    <p>Review the responses provided by our support team regarding your queries.</p>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="thead-light">
          <tr>
            <th>Query ID</th>
            <th>Response</th>
            <th>Date of Response</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#Q101</td>
            <td>Your query regarding online payment has been resolved. Please check your email for details.</td>
            <td>Mar 21, 2025</td>
            <td>
              <button class="btn btn-primary btn-action">View Details</button>
            </td>
          </tr>
          <tr>
            <td>#Q102</td>
            <td>Thank you for your feedback on the exam schedule. The changes have been noted.</td>
            <td>Mar 19, 2025</td>
            <td>
              <button class="btn btn-primary btn-action">View Details</button>
            </td>
          </tr>
          <tr>
            <td>#Q103</td>
            <td>We are processing your query about fee concession. Please wait for further updates.</td>
            <td>Mar 23, 2025</td>
            <td>
              <button class="btn btn-primary btn-action">View Details</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Section 3: Request Assistance for Academic-related Issues -->
  <div class="card-container">
    <h3>Request Assistance for Academic-related Issues</h3>
    <p>Please fill out the form below to request assistance from our academic support team.</p>
    <form class="support-form">
      <div class="form-group">
        <label for="requestName">Name</label>
        <input type="text" class="form-control" id="requestName" placeholder="Your Name" required>
      </div>
      <div class="form-group">
        <label for="requestEmail">Email</label>
        <input type="email" class="form-control" id="requestEmail" placeholder="Your Email" required>
      </div>
      <div class="form-group">
        <label for="requestSubject">Subject</label>
        <input type="text" class="form-control" id="requestSubject" placeholder="Subject" required>
      </div>
      <div class="form-group">
        <label for="requestMessage">Message</label>
        <textarea class="form-control" id="requestMessage" rows="5" placeholder="Describe your academic issue" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary btn-submit btn-block">Submit Request</button>
    </form>
  </div>
</div>

<!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
