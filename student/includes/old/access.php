<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Study Material Library - Academic Management</title>
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
      margin-bottom: 100px;
    }
    /* Section Headings */
    .card-container h3 {
      font-size: 2.2rem;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .card-container p {
      font-size: 1.5rem;
      margin-bottom: 20px;
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
    .btn-download {
      font-size: 1.5rem;
      padding: 0.5rem 1.subrem;
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Study Material Library Section -->
  <div class="card-container">
    <h3>Study Material Library</h3>
    <p>Access previously uploaded study material. Browse through the list below and download the resources you need.</p>
    
    <!-- Responsive Data Table -->
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="thead-light">
          <tr>
            <th>Material Title</th>
            <th>Subject</th>
            <th>Date Uploaded</th>
            <th>Download</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Algebra Basics Notes</td>
            <td>Math</td>
            <td>Mar 10, 2025</td>
            <td>
              <a href="materials/algebra_basics.pdf" target="_blank" class="btn btn-primary btn-download">
                <i class="fas fa-download"></i> Download
              </a>
            </td>
          </tr>
          <tr>
            <td>Chemistry Experiment Guide</td>
            <td>Science</td>
            <td>Mar 12, 2025</td>
            <td>
              <a href="materials/chemistry_experiment.pdf" target="_blank" class="btn btn-primary btn-download">
                <i class="fas fa-download"></i> Download
              </a>
            </td>
          </tr>
          <tr>
            <td>Shakespeare Study Guide</td>
            <td>English</td>
            <td>Mar 15, 2025</td>
            <td>
              <a href="materials/shakespeare_guide.pdf" target="_blank" class="btn btn-primary btn-download">
                <i class="fas fa-download"></i> Download
              </a>
            </td>
          </tr>
          <tr>
            <td>World History Overview</td>
            <td>History</td>
            <td>Mar 18, 2025</td>
            <td>
              <a href="materials/world_history.pdf" target="_blank" class="btn btn-primary btn-download">
                <i class="fas fa-download"></i> Download
              </a>
            </td>
          </tr>
          <!-- Additional rows as needed -->
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
