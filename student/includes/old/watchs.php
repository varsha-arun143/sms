<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search, Filter & Bookmarks - Academic Management</title>
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
      margin-bottom: 30px;
    }
    /* Section Headings */
    .card-container h3 {
      font-size: 2.2rem;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .card-container p {
      font-size: 1.6rem;
      margin-bottom: 20px;
    }
    .table-responsive  {
      font-size: 1.5rem;
      margin-bottom: 20px;

      
    }
    /* Form Elements */
    .form-control {
      font-size: 1.5rem;
      padding: 0.8rem 1rem;
    }
    .btn-search {
      font-size: 1.5rem;
      padding: 0.8rem 1.6rem;
    }
    /* Filter Options Styling */
    .filter-options label {
      font-size: 1.5rem;
      margin-right: 10px;
    }
    .filter-options select {
      font-size: 1.5rem;
      padding: 0.6rem;
      margin-right: 20px;
    }
    /* Data Table Styling */
    .data-table-section h4 {
      font-size: 1.9rem;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .data-table-section .table th,
    .data-table-section .table td {
      font-size: 1.5rem;
      vertical-align: middle;
    }
    /* Action Buttons in Bookmarks Table */
    .btn-action {
      font-size: 1.5rem;
      padding: 0.5rem 1rem;
      margin-right: 5px;
    }
    /* Responsive Adjustments */
    @media (max-width: 767.98px) {
      .filter-options .form-row > div {
        margin-bottom: 15px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Section 1: Search & Filter Videos with Data Table -->
  <div class="card-container">
    <h3>Search and Filter Videos</h3>
    <p>Find videos by subject, topic, or class.</p>
    <div class="row">
      <div class="col-md-8 mb-3 mb-md-0">
        <input type="text" class="form-control" placeholder="Search videos...">
      </div>
      <div class="col-md-4">
        <button class="btn btn-primary btn-search btn-block">Search</button>
      </div>
    </div>
    <!-- Filter Options -->
    <div class="filter-options mt-4">
      <div class="form-row align-items-center">
        <div class="col-sm-auto mb-2">
          <label for="subjectFilter">Subject:</label>
          <select id="subjectFilter" class="form-control">
            <option value="">All Subjects</option>
            <option value="math">Math</option>
            <option value="science">Science</option>
            <option value="english">English</option>
            <option value="history">History</option>
          </select>
        </div>
        <div class="col-sm-auto mb-2">
          <label for="topicFilter">Topic:</label>
          <select id="topicFilter" class="form-control">
            <option value="">All Topics</option>
            <option value="algebra">Algebra</option>
            <option value="geometry">Geometry</option>
            <option value="chemistry">Chemistry</option>
            <option value="literature">Literature</option>
          </select>
        </div>
        <div class="col-sm-auto mb-2">
          <label for="classFilter">Class:</label>
          <select id="classFilter" class="form-control">
            <option value="">All Classes</option>
            <option value="class1">Class 1</option>
            <option value="class2">Class 2</option>
            <option value="class3">Class 3</option>
            <option value="class4">Class 4</option>
            <option value="class5">Class 5</option>
          </select>
        </div>
      </div>
    </div>
    <!-- Data Table Section -->
    <div class="data-table-section mt-5">
      <h4>Video Results</h4>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-light">
            <tr>
              <th>Video Title</th>
              <th>Subject</th>
              <th>Topic</th>
              <th>Class</th>
              <th>Date Uploaded</th>
              <th>Duration</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Introduction to Algebra</td>
              <td>Math</td>
              <td>Algebra</td>
              <td>Class 3</td>
              <td>Mar 10, 2025</td>
              <td>45 min</td>
            </tr>
            <tr>
              <td>Chemistry Basics</td>
              <td>Science</td>
              <td>Chemistry</td>
              <td>Class 4</td>
              <td>Mar 12, 2025</td>
              <td>50 min</td>
            </tr>
            <tr>
              <td>Shakespearean Literature</td>
              <td>English</td>
              <td>Literature</td>
              <td>Class 5</td>
              <td>Mar 15, 2025</td>
              <td>40 min</td>
            </tr>
            <tr>
              <td>World History Overview</td>
              <td>History</td>
              <td>History</td>
              <td>Class 3</td>
              <td>Mar 18, 2025</td>
              <td>55 min</td>
            </tr>
            <!-- Additional rows as needed -->
          </tbody>
        </table>
      </div>
    </div>
  </div> <!-- End of Search & Filter Section -->

  <!-- Section 2: Bookmarks & Playlists Data Table -->
  <div class="card-container">
    <h3>Bookmarks & Playlists</h3>
    <p>Manage your bookmarked videos and custom playlists.</p>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="thead-light">
          <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Date Added</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Sample Row 1: Bookmark -->
          <tr>
            <td>Introduction to Algebra</td>
            <td>Bookmark</td>
            <td>Mar 10, 2025</td>
            <td>
              <button class="btn btn-primary btn-action">View</button>
              <button class="btn btn-danger btn-action">Remove</button>
            </td>
          </tr>
          <!-- Sample Row 2: Playlist -->
          <tr>
            <td>Science Experiment Playlist</td>
            <td>Playlist</td>
            <td>Mar 12, 2025</td>
            <td>
              <button class="btn btn-primary btn-action">View</button>
              <button class="btn btn-warning btn-action">Edit</button>
              <button class="btn btn-danger btn-action">Delete</button>
            </td>
          </tr>
          <!-- Sample Row 3: Bookmark -->
          <tr>
            <td>Shakespearean Literature Overview</td>
            <td>Bookmark</td>
            <td>Mar 15, 2025</td>
            <td>
              <button class="btn btn-primary btn-action">View</button>
              <button class="btn btn-danger btn-action">Remove</button>
            </td>
          </tr>
          <!-- Sample Row 4: Playlist -->
          <tr>
            <td>History Documentary Playlist</td>
            <td>Playlist</td>
            <td>Mar 18, 2025</td>
            <td>
              <button class="btn btn-primary btn-action">View</button>
              <button class="btn btn-warning btn-action">Edit</button>
              <button class="btn btn-danger btn-action">Delete</button>
            </td>
          </tr>
          <!-- Additional rows as needed -->
        </tbody>
      </table>
    </div>
  </div> <!-- End of Bookmarks & Playlists Section -->
</div> <!-- End Container -->

<!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
