<?php
include('../db_config.php');

// Sanitize input
$user_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch user
$sql = "SELECT * FROM Students WHERE std_id = $user_id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "<div class='alert alert-danger'>User not found.</div>";
    exit;
}
?>

<!doctype html>
<html class="no-js" lang="">


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/all-teacher.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jan 2025 18:38:55 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AKKHOR | All Teachers</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>
</head>

<body>
    <!-- Styles -->
<style>
    .info-item {
        padding: 0.5rem 0;
        border-bottom: 1px solid #f0f0f0;
    }
    .info-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
    .font-weight-medium {
        font-weight: 500;
    }
    .modal-content {
        border-radius: 0.5rem;
    }
    .card-header {
        border-radius: 0.5rem 0.5rem 0 0 !important;
        padding: 0.75rem 1rem;
    }
    .badge-success {
        background-color: #28a745;
    }
    .badge-secondary {
        background-color: #6c757d;
    }
    .modal-header .close {
        padding: 1rem;
        margin: -1rem -1rem -1rem auto;
    }
</style>

    <!-- Preloader Start Here -->

    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
        <!-- Header Menu Area Start Here -->
        <?php include 'includes/topbar.php'; ?>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            <?php include 'includes/sidebar.php'; ?>
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <?php include 'includes/breadcubs.php'; ?>
                <!-- Breadcubs Area End Here -->
                <!-- Teacher Table Area Start Here -->
                <div class="container bg-white p-5">
                <h4 class="mb-4">Edit Profile</h4>
                <form class="new-added-form" method="POST" action="edit_profile_backend.php?id=<?= $user_id ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 form-group">
                            <label>Full Name *</label>
                            <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" class="form-control" required>
                        </div>
                        <div class="col-xl-4 col-lg-6 form-group">
    <label>Father's Name *</label>
    <input type="text" name="father_name" value="<?= htmlspecialchars($user['father_name']) ?>" class="form-control" required>
</div>

<div class="col-xl-4 col-lg-6 form-group">
    <label>Date of Birth *</label>
    <input type="date" name="dob" value="<?= htmlspecialchars($user['dob']) ?>" class="form-control" required>
</div>

<div class="col-xl-4 col-lg-6 form-group">
    <label>Gender *</label>
    <select name="gender" class="form-control" required>
        <option value="">Select</option>
        <option value="Male" <?= $user['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
        <option value="Female" <?= $user['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
        <option value="Other" <?= $user['gender'] === 'Other' ? 'selected' : '' ?>>Other</option>
    </select>
</div>

                        <div class="col-xl-4 col-lg-6 form-group">
                            <label>Email *</label>
                            <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" class="form-control" required>
                        </div>
                        <div class="col-xl-4 col-lg-6 form-group">
                            <label>Contact Number *</label>
                            <input type="text" name="contact" value="<?= htmlspecialchars($user['contact']) ?>" class="form-control" required>
                        </div>
                        <div class="col-xl-4 col-lg-6 form-group">
                            <label>Whatsapp Number *</label>
                            <input type="text" name="whatsapp" value="<?= htmlspecialchars($user['whatsapp']) ?>" class="form-control" required>
                        </div>
                        <div class="col-xl-4 col-lg-6 form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" placeholder="(leave empty to keep current password)">
</div>

                        <div class="col-xl-4 col-lg-6 form-group">
                            <label>Location</label>
                            <input type="text" name="location" value="<?= htmlspecialchars($user['address']) ?>" class="form-control">
                        </div>
                       
                       
                        <div class="col-12 form-group">
                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button>
                            <a href="my_profile.php" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
                

                


<!-- JavaScript -->


                <!-- Teacher Table Area End Here -->
                <?php include 'includes/footer.php'; ?>
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>


    

</script>
   <!-- jQuery -->
<script src="js/jquery-3.3.1.min.js"></script>

<!-- DataTables -->
<script src="js/jquery.dataTables.min.js"></script>

<!-- Bootstrap and plugins -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>

<!-- DataTables Init -->

</script>

<!-- Main JS -->
<script src="js/main.js"></script>


</body>


<!-- Mirrored from www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/all-teacher.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jan 2025 18:38:55 GMT -->
</html>
