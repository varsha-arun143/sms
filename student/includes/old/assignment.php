<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments and Study Materials</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
            margin-bottom: 20px; /* Add margin bottom for spacing */
        }

        .col-12 {
            flex: 1 1 100%;
            padding: 10px;
        }

        .col-xl-12 {
            flex: 0 0 100%;
        }

        .col-xl-8 {
            flex: 0 0 66.66%;
        }

        .col-xl-6 {
            flex: 0 0 50%;
        }

        .col-3-xxxl {
            flex: 0 0 25%;
        }

        /* Card Styling */
        .card {
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background: #fff;
            width: 100%;
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        /* Table Styling */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th, .table td {
            text-align: left;
            padding: 12px;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #ddd;
        }

        /* Heading Styling */
        .heading-layout1 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .item-title {
            font-size: 24px;
            font-weight: bold;
        }

        /* Responsive Layout */
        @media (max-width: 768px) {
            .col-xl-12,
            .col-xl-8,
            .col-xl-6 {
                flex: 0 0 100%;
            }

            .heading-layout1 {
                flex-direction: column;
            }

            .heading-layout1 .item-title {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>

<div class="row gutters-20">
    <!-- Download Assignments Section -->
    <div class="col-12 col-xl-12 col-6-xxxl">
        <div class="card dashboard-card-one pd-b-20">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Assignments and Study Materials</h3>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-expanded="false">...</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-times text-orange-red"></i>Close
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs text-dark-pastel-green"></i>Edit
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-redo-alt text-orange-peel"></i>Refresh
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Assignments and Materials List -->
                <div class="materials-list">
                    <table class="table text-nowrap table-bordered">
                        <thead>
                            <tr>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Material Type</th>
                                <th>Upload Date</th>
                                <th>Download Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Class 5A</td>
                                <td>Math</td>
                                <td>Assignment</td>
                                <td>Mar 5, 2025</td>
                                <td><a href="path/to/assignment1.pdf" target="_blank" class="btn btn-success">Download</a></td>
                            </tr>
                            <tr>
                                <td>Class 5A</td>
                                <td>English</td>
                                <td>Notes</td>
                                <td>Mar 6, 2025</td>
                                <td><a href="path/to/notes1.pdf" target="_blank" class="btn btn-primary">Download</a></td>
                            </tr>
                            <tr>
                                <td>Class 5A</td>
                                <td>Science</td>
                                <td>Study Material</td>
                                <td>Mar 7, 2025</td>
                                <td><a href="path/to/study_material1.pdf" target="_blank" class="btn btn-info">Download</a></td>
                            </tr>
                            <tr>
                                <td>Class 5A</td>
                                <td>History</td>
                                <td>Assignment</td>
                                <td>Mar 10, 2025</td>
                                <td><a href="path/to/assignment2.pdf" target="_blank" class="btn btn-warning">Download</a></td>
                            </tr>
                            <tr>
                                <td>Class 5A</td>
                                <td>Geography</td>
                                <td>Study Material</td>
                                <td>Mar 12, 2025</td>
                                <td><a href="path/to/study_material2.pdf" target="_blank" class="btn btn-danger">Download</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
