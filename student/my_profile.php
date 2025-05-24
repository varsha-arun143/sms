<?php
require 'db_config.php'; // Your DB connection file

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$userId = $_SESSION['user_id'];

// Fetch student data
$stmt = $conn->prepare("
    SELECT s.*, u.email 
    FROM students s 
    JOIN users u ON s.user_id = u.user_id 
    WHERE s.user_id = ?
");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

if (!$student) {
    echo "Student profile not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];
    $freeTime = $_POST['free_time'];

    $stmt = $conn->prepare("UPDATE students SET free_time = ? WHERE std_id = ?");
    $stmt->bind_param("si", $freeTime, $userId);

    if ($stmt->execute()) {
        header("Location: my_profile.php?message=Free+Time+updated+successfully");
        exit();
    } else {
        echo "Error updating free time.";
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php include('includes/header.php');?>
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
        .performance-meter {
            height: 8px;
            background-color: #e9ecef;
            border-radius: 4px;
            overflow: hidden;
        }
        .performance-level {
            height: 100%;
            background: linear-gradient(90deg, #4cc9f0, #4895ef);
            border-radius: 4px;
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
                    <h3>Student Profile</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>My Profile</li>
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
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="profile-header text-center">
                                <img src="../<?= !empty($student['profile_image']) ? htmlspecialchars($student['profile_image']) : 'img/figure/user2.png' ?>" 
                                     class="profile-pic" 
                                     alt="Profile Picture">
                                <h2 class="profile-name"><?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']) ?></h2>
                                <p class="profile-email"><?= htmlspecialchars($student['email']) ?></p>
                            </div>
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="info-card">
                                            <div class="card-body">
                                                <h4 class="info-title"><i class="fas fa-user-circle mr-2"></i>Personal Information</h4>
                                                
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <p class="info-label">Phone</p>
                                                        <p class="info-value">
                                                            <i class="fas fa-phone mr-2"></i><?= htmlspecialchars($student['phone']) ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="info-label">WhatsApp</p>
                                                        <p class="info-value">
                                                            <i class="fab fa-whatsapp mr-2"></i><?= htmlspecialchars($student['whatsapp_number']) ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <p class="info-label">Gender</p>
                                                        <p class="info-value">
                                                            <?php 
                                                                $genderIcon = ($student['gender'] == 'male') ? 'mars' : 
                                                                              (($student['gender'] == 'female') ? 'venus' : 'genderless');
                                                                echo "<i class='fas fa-$genderIcon mr-2'></i>" . 
                                                                     htmlspecialchars(ucfirst($student['gender']));
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="info-label">Date of Birth</p>
                                                        <p class="info-value">
                                                            <i class="fas fa-birthday-cake mr-2"></i><?= htmlspecialchars($student['date_of_birth']) ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <p class="info-label">Address</p>
                                                    <p class="info-value">
                                                        <i class="fas fa-map-marker-alt mr-2"></i><?= nl2br(htmlspecialchars($student['address'])) ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="info-card">
                                            <div class="card-body">
                                                <h4 class="info-title"><i class="fas fa-info-circle mr-2"></i>Additional Information</h4>
                                                
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <p class="info-label">Category</p>
                                                        <p class="info-value"><?= htmlspecialchars($student['category']) ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="info-label">Current Level</p>
                                                        <p class="info-value"><?= htmlspecialchars($student['current_level']) ?></p>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <p class="info-label">Free Time</p>
                                                            <p class="info-value mb-0">
                                                                <i class="far fa-clock mr-2"></i>
                                                                <?= !empty($student['free_time']) ? htmlspecialchars($student['free_time']) : 'Not specified' ?>
                                                            </p>
                                                        </div>
                                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#freeTimeModal">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <p class="info-label">Join Date</p>
                                                    <p class="info-value">
                                                        <i class="far fa-calendar-alt mr-2"></i><?= htmlspecialchars($student['join_date']) ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-center mt-4">
                                    <a href="edit_profile.php?id=<?= $student['std_id'] ?>" class="btn btn-edit btn-lg">
                                        <i class="fas fa-edit mr-2"></i> Edit Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Free Time Modal -->
                <div class="modal fade" id="freeTimeModal" tabindex="-1" role="dialog" aria-labelledby="freeTimeModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="" method="POST">
                            <input type="hidden" name="user_id" value="<?= $student['std_id'] ?>">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="freeTimeModalLabel">Edit Free Time</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="free_time">Available Free Time</label>
                                        <input type="text" class="form-control" name="free_time" id="free_time" 
                                               value="<?= htmlspecialchars($student['free_time']) ?>" 
                                               placeholder="e.g., 3 PM - 5 PM">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Footer Area Start Here -->
                <?php include 'includes/footer.php'; ?>
                <!-- Footer Area End Here -->
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    
   <?php include 'includes/scripts.php'; ?>
    <script>
        $(document).ready(function() {
            // Animation for performance meter
            $('.performance-level').each(function() {
                var width = $(this).attr('data-percent');
                $(this).css('width', '0').animate({
                    width: width + '%'
                }, 1500);
            });
        });
    </script>
</body>
</html>