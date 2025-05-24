<?php
include('../db_config.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$userId = $_SESSION['user_id']; // Get the user_id from the session

// Fetch staff data based on the logged-in user's user_id
$stmt = $conn->prepare("
    SELECT s.*, u.email 
    FROM staff s
    JOIN users u ON s.user_id = u.user_id 
    WHERE s.user_id = ?
");

if (!$stmt) {
    die("Error preparing the SQL statement: " . $conn->error);
}

$stmt->bind_param("i", $userId); // Bind user_id to the prepared statement
$stmt->execute();
$result = $stmt->get_result();
$staff = $result->fetch_assoc();

if (!$staff) {
    echo "Staff profile not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from form submission
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $whatsapp_number = $_POST['whatsapp_number'];
    $address = $_POST['address'];
    $community = $_POST['community'];
    $mother_tongue = $_POST['mother_tongue'];
    $languages_known = $_POST['languages_known'];
    $can_teach_without_tajweed = isset($_POST['can_teach_without_tajweed']) ? 1 : 0;
    $can_teach_with_tajweed = isset($_POST['can_teach_with_tajweed']) ? 1 : 0;

    // Prepare SQL for updating profile
    $stmt = $conn->prepare("UPDATE staff SET 
        first_name = ?, last_name = ?, date_of_birth = ?, gender = ?, phone = ?, 
        whatsapp_number = ?, address = ?, community = ?, mother_tongue = ?,
        languages_known = ?, can_teach_without_tajweed = ?, can_teach_with_tajweed = ?
        WHERE user_id = ?");

    if (!$stmt) {
        die("Error preparing the update SQL statement: " . $conn->error);
    }

    $stmt->bind_param("ssssssssssiii", 
        $first_name, $last_name, $dob, $gender, $phone, 
        $whatsapp_number, $address, $community, $mother_tongue,
        $languages_known, $can_teach_without_tajweed, $can_teach_with_tajweed, $userId);

    if ($stmt->execute()) {
        header("Location: staff-profile.php?id=$userId&message=Profile updated successfully");
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('includes/header.php'); ?>
    <style>
        .profile-header {
            background: linear-gradient(135deg, #042954 0%, #3f37c9 100%);
            padding: 30px 0;
            color: white;
            position: relative;
            border-radius: 8px 8px 0 0;
        }

        .profile-pic {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .profile-name {
            font-weight: 600;
            margin-top: 15px;
            font-size: 24px;
            color: white;
        }

        .profile-email {
            opacity: 0.9;
            font-size: 16px;
            color: white;
        }

        .info-card {
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .info-title {
            font-weight: 600;
            color: #042954;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .info-label {
            font-weight: 500;
            color: #6c757d;
        }

        .info-value {
            font-weight: 500;
            color: #343a40;
        }

        .btn-edit {
            background: linear-gradient(135deg, #4895ef 0%, #3f37c9 100%);
            border: none;
            color: white;
        }

        .btn-edit:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }
    </style>
</head>

<body>
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
                <div class="breadcrumbs-area">
                    <h3>Staff Profile</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Edit Profile</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->

                <?php if (isset($_GET['message'])): ?>
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <?= htmlspecialchars(urldecode($_GET['message'])) ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="container bg-white p-5">
                    <h4 class="mb-4">Edit Profile</h4>
                    <form class="new-added-form" method="POST" action="edit_profile.php?id=<?= $staff['staff_id'] ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 form-group">
                                <label>First Name *</label>
                                <input type="text" name="first_name" value="<?= htmlspecialchars($staff['first_name']) ?>" class="form-control" required>
                            </div>
                            <div class="col-xl-4 col-lg-6 form-group">
                                <label>Last Name *</label>
                                <input type="text" name="last_name" value="<?= htmlspecialchars($staff['last_name']) ?>" class="form-control" required>
                            </div>
                            <div class="col-xl-4 col-lg-6 form-group">
                                <label>Date of Birth</label>
                                <input type="date" name="date_of_birth" value="<?= htmlspecialchars($staff['date_of_birth']) ?>" class="form-control">
                            </div>
                            <div class="col-xl-4 col-lg-6 form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="male" <?= $staff['gender'] === 'male' ? 'selected' : '' ?>>Male</option>
                                    <option value="female" <?= $staff['gender'] === 'female' ? 'selected' : '' ?>>Female</option>
                                    <option value="other" <?= $staff['gender'] === 'other' ? 'selected' : '' ?>>Other</option>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-6 form-group">
                                <label>Phone *</label>
                                <input type="text" name="phone" value="<?= htmlspecialchars($staff['phone']) ?>" class="form-control" required>
                            </div>
                            <div class="col-xl-4 col-lg-6 form-group">
                                <label>Whatsapp Number</label>
                                <input type="text" name="whatsapp_number" value="<?= htmlspecialchars($staff['whatsapp_number']) ?>" class="form-control">
                            </div>
                            <div class="col-xl-4 col-lg-6 form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="<?= htmlspecialchars($staff['address']) ?>" class="form-control">
                            </div>
                            <div class="col-xl-4 col-lg-6 form-group">
                                <label>Community</label>
                                <input type="text" name="community" value="<?= htmlspecialchars($staff['community']) ?>" class="form-control">
                            </div>
                            <div class="col-xl-4 col-lg-6 form-group">
                                <label>Mother Tongue</label>
                                <input type="text" name="mother_tongue" value="<?= htmlspecialchars($staff['mother_tongue']) ?>" class="form-control">
                            </div>
                            <div class="col-xl-4 col-lg-6 form-group">
                                <label>Languages Known</label>
                                <input type="text" name="languages_known" value="<?= htmlspecialchars($staff['languages_known']) ?>" class="form-control">
                            </div>
                            <div class="col-xl-4 col-lg-6 form-group">
                                <label>Can Teach Without Tajweed</label>
                                <select name="can_teach_without_tajweed" class="form-control">
                                    <option value="1" <?= $staff['can_teach_without_tajweed'] == 1 ? 'selected' : '' ?>>Yes</option>
                                    <option value="0" <?= $staff['can_teach_without_tajweed'] == 0 ? 'selected' : '' ?>>No</option>
                                </select>
                            </div>
                            <div class="col-xl-4 col-lg-6 form-group">
                                <label>Can Teach With Tajweed</label>
                                <select name="can_teach_with_tajweed" class="form-control">
                                    <option value="1" <?= $staff['can_teach_with_tajweed'] == 1 ? 'selected' : '' ?>>Yes</option>
                                    <option value="0" <?= $staff['can_teach_with_tajweed'] == 0 ? 'selected' : '' ?>>No</option>
                                </select>
                            </div>

                            <div class="col-12 form-group">
                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button>
                                <a href="staff_profile.php?id=<?= $staff['staff_id'] ?>" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
                <?php include 'includes/footer.php'; ?>
            </div>
        </div>
    </div>

    <?php include 'includes/scripts.php'; ?>
</body>

</html>