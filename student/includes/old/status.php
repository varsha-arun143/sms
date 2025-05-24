<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Fee Management - Academic Management</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <style>
    /* Ensure the container fills the viewport height */
    html, body {
      height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
    }
    .container-fluid {
      min-height: 100vh;
    }
    /* Card styling */
    .card {
      margin-bottom: 20px;
      border: 1px solid #ddd;
    }
    .card .card-body {
      display: flex;
      flex-direction: column;
      padding: 20px;
    }
    /* Heading layout styling */
    .heading-layout1 {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .item-title h3 {
      margin: 0;
      font-size: 2rem; /* Increased font size */
      font-weight: 600;
    }
    /* Dropdown icon styling */
    .dropdown-toggle {
      font-size: 1.5rem;
      cursor: pointer;
    }
    /* Table styling */
    .table th, .table td {
      font-size: 1.5rem; /* Increased table text size */
      vertical-align: middle;
    }
    /* Optional: Increase spacing in table header */
    .thead-light th {
      padding: 0.75rem;
    }
    /* Remove extra bottom space below table */
    .table-responsive {
      margin-bottom: 0;
      padding-bottom: 0;
    }
    /* Align text in card body to center on small screens */
    @media (max-width: 767.98px) {
      .card .card-body {
        text-align: center;
      }
    }
  </style>
</head>
<body>
  <div class="container-fluid my-4">
    <div class="row align-items-stretch">
      <!-- Fee Structure Section (Left Column) -->
      <div class="col-12 col-xl-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="heading-layout1">
              <div class="item-title">
                <h3>Fee Structure</h3>
              </div>
              <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#"><i class="fas fa-times text-danger"></i> Close</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-cogs text-success"></i> Edit</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-warning"></i> Refresh</a>
                </div>
              </div>
            </div>
            <!-- Responsive Table for Fee Structure -->
            <div class="table-responsive">
              <table class="table table-bordered text-nowrap">
                <thead class="thead-light">
                  <tr>
                    <th>Grade</th>
                    <th>Fee Amount</th>
                    <th>Due Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Class 1</td>
                    <td>₹5,000</td>
                    <td>15th of each month</td>
                  </tr>
                  <tr>
                    <td>Class 2</td>
                    <td>₹6,000</td>
                    <td>15th of each month</td>
                  </tr>
                  <tr>
                    <td>Class 3</td>
                    <td>₹7,000</td>
                    <td>15th of each month</td>
                  </tr>
                  <tr>
                    <td>Class 4</td>
                    <td>₹8,000</td>
                    <td>15th of each month</td>
                  </tr>
                  <tr>
                    <td>Class 5</td>
                    <td>₹9,000</td>
                    <td>15th of each month</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Payment Status Section (Right Column) -->
      <div class="col-12 col-xl-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="heading-layout1">
              <div class="item-title">
                <h3>Payment Status</h3>
              </div>
              <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#"><i class="fas fa-times text-danger"></i> Close</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-cogs text-success"></i> Edit</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-warning"></i> Refresh</a>
                </div>
              </div>
            </div>
            <!-- Responsive Table for Payment Status -->
            <div class="table-responsive">
              <table class="table table-bordered text-nowrap">
                <thead class="thead-light">
                  <tr>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Paid Amount</th>
                    <th>Pending Amount</th>
                    <th>Payment Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>John Doe</td>
                    <td>Class 1</td>
                    <td>₹5,000</td>
                    <td>₹0</td>
                    <td>Jan 15, 2025</td>
                  </tr>
                  <tr>
                    <td>Mary Jane</td>
                    <td>Class 2</td>
                    <td>₹4,000</td>
                    <td>₹2,000</td>
                    <td>Jan 15, 2025</td>
                  </tr>
                  <tr>
                    <td>Mark Smith</td>
                    <td>Class 3</td>
                    <td>₹7,000</td>
                    <td>₹0</td>
                    <td>Jan 15, 2025</td>
                  </tr>
                  <tr>
                    <td>Alice Williams</td>
                    <td>Class 4</td>
                    <td>₹8,000</td>
                    <td>₹0</td>
                    <td>Jan 15, 2025</td>
                  </tr>
                  <tr>
                    <td>James Brown</td>
                    <td>Class 5</td>
                    <td>₹6,000</td>
                    <td>₹3,000</td>
                    <td>Jan 15, 2025</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End row -->
  </div><!-- End container-fluid -->

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
