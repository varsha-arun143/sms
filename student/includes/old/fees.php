<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fee Management - Academic Management</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <style>
    /* Base Styles */
    html, body {
      height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
    }
    /* Flex container aligned at the top with some padding */
    .full-height {
      min-height: 100vh;
      display: flex;
      align-items: flex-start; /* Changed from center to flex-start */
      justify-content: center;
      padding-top: 20px; /* Adjust this value as needed */
    }
    /* Custom card style: full width on small devices, with a max-width on larger screens */
    .custom-card {
      width: 100%;
      max-width: 350px;
      margin: 10px auto;
    }
    /* Card Heading Layout */
    .heading-layout1 {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .item-title h3 {
      margin: 0;
      font-size: 2rem;
      font-weight: bold;
    }
    /* Operation content styling */
    .operation h4 {
      font-size: 1.75rem;
      margin-bottom: 10px;
    }
    .operation p {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }
    /* Button styling */
    .btn {
      font-size: 1.25rem;
      padding: 0.75rem 1.5rem;
    }
    /* Remove horizontal rule spacing */
    hr {
      border-top: 0px solid #ddd;
    }
  </style>
</head>
<body>

<div class="container-fluid full-height">
  <div class="row w-100 justify-content-center">
    <!-- Card 1: Pay Fees Securely via Razorpay -->
    <div class="col-12 col-md-4 d-flex align-items-stretch">
      <div class="card custom-card shadow">
        <div class="card-body">
          <div class="heading-layout1 mb-3">
            <div class="item-title">
              <h3>Pay Fees</h3>
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
          <div class="operation text-center">
            <h4>Pay Fees Securely</h4>
            <p>Use our secure Razorpay integration to pay your fees with ease and confidence.</p>
            <a href="https://razorpay.com" target="_blank" class="btn btn-primary">Pay Now</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Card 2: Download Fee Payment Receipts -->
    <div class="col-12 col-md-4 d-flex align-items-stretch">
      <div class="card custom-card shadow">
        <div class="card-body">
          <div class="heading-layout1 mb-3">
            <div class="item-title">
              <h3>Download Receipt</h3>
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
          <div class="operation text-center">
            <h4>Download Receipts</h4>
            <p>Access and download your fee payment receipts for future reference.</p>
            <a href="path/to/fee_receipt.pdf" target="_blank" class="btn btn-success">Download</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Card 3: View Fee Concessions & Outstanding Balances -->
    <div class="col-12 col-md-4 d-flex align-items-stretch">
      <div class="card custom-card shadow">
        <div class="card-body">
          <div class="heading-layout1 mb-3">
            <div class="item-title">
              <h3>View Details</h3>
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
          <div class="operation text-center">
            <h4>Fee Details</h4>
            <p>Review details regarding fee concessions, discounts, or pending amounts.</p>
            <a href="path/to/fee_details.html" target="_blank" class="btn btn-info">View Details</a>
          </div>
        </div>
      </div>
    </div>
    
  </div><!-- End Row -->
</div><!-- End Container-fluid -->

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
