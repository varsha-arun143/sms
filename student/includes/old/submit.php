<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Support Form - Academic Management</title>
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
      max-width: 700px;
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
    /* Form Element Styling */
    .form-control {
      font-size: 1.5rem;
      padding: 0.75rem 1rem;
      margin-bottom: 20px;  
    }
    .form-group {
      font-size: 1.5rem;
      padding: 0.75rem 2rem;
    }
    .btn-submit {
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
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Support Form Card -->
  <div class="card-container">
    <h3>Submit Your Inquiry or Feedback</h3>
    <p>Please fill out the form below and we will get back to you shortly.</p>
    <form>
      <div class="form-group">
        <label for="name" class="font-weight-bold">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Your Name" required>
      </div>
      <div class="form-group">
        <label for="email" class="font-weight-bold">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Your Email" required>
      </div>
      <div class="form-group">
        <label for="subject" class="font-weight-bold">Subject</label>
        <input type="text" class="form-control" id="subject" placeholder="Subject" required>
      </div>
      <div class="form-group">
        <label for="message" class="font-weight-bold">Message</label>
        <textarea class="form-control" id="message" rows="5" placeholder="Your Message" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary btn-submit btn-block">Submit</button>
    </form>
  </div>
</div>

<!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
