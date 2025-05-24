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
      padding: 20px;
    }
    /* Search Section Styling */
    .search-section {
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }
    .search-section h3 {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .search-section p {
      font-size: 1.5rem;
      margin-bottom: 30px;
    }
    .form-control {
      font-size: 1.25rem;
      padding: 0.75rem 1rem;
    }
    .btn-search {
      font-size: 1.25rem;
      padding: 0.75rem 1.5rem;
    }
    /* Filter Options Styling */
    .filter-options {
      margin-top: 30px;
    }
    .filter-options label {
      font-size: 1.25rem;
      margin-right: 15px;
    }
    .filter-options select {
      font-size: 1.25rem;
      padding: 0.5rem;
      margin-right: 20px;
    }
    /* Data Table Section Styling */
    .data-table-section h3 {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .table th, .table td {
      font-size: 1.25rem;
      vertical-align: middle;
    }
    /* Bookmarks & Playlists Section Styling */
    .playlist-section {
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      margin-top: 40px;
    }
    .playlist-section h3 {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .playlist-section p {
      font-size: 1.5rem;
      margin-bottom: 30px;
    }
    /* Table for Bookmarks/Playlists */
    .playlist-table th, .playlist-table td {
      font-size: 1.25rem;
      vertical-align: middle;
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Search and Filter Videos Section -->
  <div class="search-section">
    <h3>Search and Filter Videos</h3>
    <p>Find videos by subject, topic, or class.</p>
    <div class="row">
      <div class="col-md-8">
        <input type="text" class="form-control" placeholder="Search videos...">
      </div>
      <div class="col-md-4">
        <button class="btn btn-primary btn-search btn-block">Search</button>
      </div>
    </div>
    <!-- Filter Options -->
    <div class="filter-options">
      <div class="form-row align-items-center">
        <div class="col-auto">
          <label for="subjectFilter">Subject:</label>
          <select id="subjectFilter" class="form-control">
            <option value="">All Subjects</option>
            <option value="math">Math</option>
            <option value="science">Science</option>
            <option value="english">English</option>
            <option value="history">History</option>
          </select>
        </div>
        <div class="col-auto">
          <label for="topicFilter">Topic:</label>
          <select id="topicFilter" class="form-control">
            <option value="">All Topics</option>
            <option value="algebra">Algebra</option>
            <option value="geometry">Geometry</option>
            <option value="chemistry">Chemistry</option>
            <option value="literature">Literature</option>
          </select>
        </div>
        <div class="col-auto">
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
  </div>
  
  <!-- Data Table Section for Video Results -->
  <div class="data-table-section">
    <h3>Video Results</h3>
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="thead-light">
          <tr>
            <th>#</th>
            <th>Video Title</th>
            <th>Subject</th>
            <th>Topic</th>
            <th>Class</th>
            <th>Duration</th>
            <th>Upload Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Introduction to Algebra</td>
            <td>Math</td>
            <td>Algebra</td>
            <td>Class 3</td>
            <td>15:30</td>
            <td>Mar 10, 2025</td>
            <td><a href="#" class="btn btn-sm btn-primary">Watch</a></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Chemistry Basics</td>
            <td>Science</td>
            <td>Chemistry</td>
            <td>Class 4</td>
            <td>20:00</td>
            <td>Mar 11, 2025</td>
            <td><a href="#" class="btn btn-sm btn-primary">Watch</a></td>
          </tr>
          <tr>
            <td>3</td>
            <td>English Grammar Essentials</td>
            <td>English</td>
            <td>Grammar</td>
            <td>Class 2</td>
            <td>18:45</td>
            <td>Mar 12, 2025</td>
            <td><a href="#" class="btn btn-sm btn-primary">Watch</a></td>
          </tr>
          <!-- Add additional rows as needed -->
        </tbody>
      </table>
    </div>
  </div>
  
  <!-- New Section: Bookmarks & Playlists -->
  <div class="playlist-section">
    <h3>Bookmarks &amp; Playlists</h3>
    <p>Manage your bookmarked video lectures and custom playlists for quick access in the future.</p>
    <div class="table-responsive">
      <table class="table table-bordered table-striped playlist-table">
        <thead class="thead-light">
          <tr>
            <th>#</th>
            <th>Playlist/Bookmark Name</th>
            <th>Number of Videos</th>
            <th>Last Updated</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Algebra Fundamentals</td>
            <td>8</td>
            <td>Mar 09, 2025</td>
            <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Chemistry Experiments</td>
            <td>5</td>
            <td>Mar 08, 2025</td>
            <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
          </tr>
          <tr>
            <td>3</td>
            <td>English Literature Picks</td>
            <td>10</td>
            <td>Mar 07, 2025</td>
            <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
          </tr>
          <!-- Add additional rows as needed -->
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
