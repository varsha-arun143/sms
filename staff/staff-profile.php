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
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$staff = $result->fetch_assoc();

if (!$staff) {
    echo "Staff profile not found.";
    exit();
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('includes/header.php'); ?>
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4bb543;
            --warning-color: #ffcc00;
            --danger-color: #f44336;
        }
        
        .profile-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            padding: 40px 0;
            color: white;
            border-radius: 10px 10px 0 0;
            position: relative;
            overflow: hidden;
        }
        
        .profile-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('../img/pattern.png') repeat;
            opacity: 0.05;
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            position: relative;
            transition: all 0.3s ease;
        }
        
        .profile-pic:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .profile-name {
            font-weight: 700;
            margin-top: 20px;
            font-size: 28px;
            color: white;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .profile-email {
            opacity: 0.9;
            font-size: 16px;
            color: white;
            margin-bottom: 10px;
        }

        .profile-status {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            margin-top: 5px;
        }
        
        .status-active {
            background-color: rgba(75, 181, 67, 0.2);
            color: var(--success-color);
        }
        
        .status-inactive {
            background-color: rgba(244, 67, 54, 0.2);
            color: var(--danger-color);
        }

        .info-card {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
            border: none;
            transition: all 0.3s ease;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .info-title {
            font-weight: 700;
            color: var(--primary-color);
            border-bottom: 2px solid rgba(67, 97, 238, 0.1);
            padding-bottom: 15px;
            margin-bottom: 20px;
            font-size: 20px;
            display: flex;
            align-items: center;
        }
        
        .info-title i {
            margin-right: 10px;
            font-size: 24px;
        }

        .info-label {
            font-weight: 600;
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .info-value {
            font-weight: 500;
            color: var(--dark-color);
            font-size: 16px;
            margin-bottom: 15px;
            padding-left: 10px;
            border-left: 3px solid var(--primary-color);
        }
        
        .info-value i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
            color: var(--primary-color);
        }

        .badge-custom {
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: 600;
            font-size: 12px;
        }
        
        .badge-primary {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
        }
        
        .badge-success {
            background-color: rgba(75, 181, 67, 0.1);
            color: var(--success-color);
        }
        
        .badge-warning {
            background-color: rgba(255, 204, 0, 0.1);
            color: var(--warning-color);
        }
        
        .badge-danger {
            background-color: rgba(244, 67, 54, 0.1);
            color: var(--danger-color);
        }

        .btn-edit {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            color: white;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
            transition: all 0.3s ease;
        }
        
        .btn-edit:hover {
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(67, 97, 238, 0.4);
        }
        
        .btn-edit i {
            margin-right: 8px;
        }
        
        .verification-badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            margin-right: 5px;
            margin-bottom: 5px;
        }
        
        .verification-badge i {
            margin-right: 5px;
        }
        
        .verified {
            background-color: rgba(75, 181, 67, 0.1);
            color: var(--success-color);
        }
        
        .not-verified {
            background-color: rgba(108, 117, 125, 0.1);
            color: #6c757d;
        }
        
        .profile-section {
            margin-bottom: 30px;
        }
        
        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .skill-item {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary-color);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }
        
        /* Toggle switch styles */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }
        
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }
        
        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .slider {
            background-color: #4CAF50;
        }
        
        input:checked + .slider:before {
            transform: translateX(26px);
        }
        
        .toggle-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .toggle-text {
            font-size: 14px;
            color: #555;
        }
        
        input:checked + .slider + .toggle-text {
            color: #4CAF50;
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
                    <h3>My Profile</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Profile Overview</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->

                <?php if (isset($_GET['message'])): ?>
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <i class="fas fa-check-circle mr-2"></i>
                        <?= htmlspecialchars(urldecode($_GET['message'])) ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- Profile Header -->
                            <div class="profile-header text-center">
                                <img src="../<?= !empty($staff['profile_image']) ? htmlspecialchars($staff['profile_image']) : 'img/figure/user2.png' ?>"
                                    class="profile-pic"
                                    alt="Profile Picture">
                                <h2 class="profile-name"><?= htmlspecialchars($staff['first_name'] . ' ' . $staff['last_name']) ?></h2>
                                <p class="profile-email"><?= htmlspecialchars($staff['email']) ?></p>
                                <span class="profile-status <?= $staff['status'] == 'active' ? 'status-active' : 'status-inactive' ?>">
                                    <?= ucfirst($staff['status']) ?>
                                </span>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <!-- Personal Information Column -->
                                    <div class="col-lg-6">
                                        <div class="profile-section">
                                            <div class="info-card">
                                                <div class="card-body">
                                                    <h4 class="info-title"><i class="fas fa-user-circle"></i> Personal Information</h4>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="info-label">Phone Number</p>
                                                            <p class="info-value">
                                                                <i class="fas fa-phone"></i><?= htmlspecialchars($staff['phone']) ?>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="info-label">WhatsApp</p>
                                                            <p class="info-value">
                                                                <i class="fab fa-whatsapp"></i><?= htmlspecialchars($staff['whatsapp_number']) ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="info-label">Gender</p>
                                                            <p class="info-value">
                                                                <?php
                                                                $genderIcon = ($staff['gender'] == 'male') ? 'mars' : (($staff['gender'] == 'female') ? 'venus' : 'genderless');
                                                                echo "<i class='fas fa-$genderIcon'></i>" . ucfirst(htmlspecialchars($staff['gender']));
                                                                ?>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="info-label">Date of Birth</p>
                                                            <p class="info-value">
                                                                <i class="fas fa-birthday-cake"></i><?= htmlspecialchars($staff['date_of_birth']) ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <p class="info-label">Address</p>
                                                    <p class="info-value">
                                                        <i class="fas fa-map-marker-alt"></i><?= nl2br(htmlspecialchars($staff['address'])) ?>
                                                    </p>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="info-label">Community</p>
                                                            <p class="info-value"><?= htmlspecialchars($staff['community']) ?></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="info-label">Mother Tongue</p>
                                                            <p class="info-value"><?= htmlspecialchars($staff['mother_tongue']) ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="profile-section">
                                            <div class="info-card">
                                                <div class="card-body">
                                                    <h4 class="info-title"><i class="fas fa-bell"></i> Emergency Information</h4>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="info-label">Emergency Staff</p>
                                                            <div class="toggle-container">
                                                                <label class="switch">
                                                                    <input type="checkbox" id="emergencyStaffToggle" <?= $staff['is_emergency_staff'] == 1 ? 'checked' : '' ?>>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                                <span class="toggle-text" id="emergencyStaffText">
                                                                    <?= $staff['is_emergency_staff'] == 1 ? 'Yes' : 'No' ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="info-label">Emergency Availability</p>
                                                            <div class="toggle-container">
                                                                <label class="switch">
                                                                    <input type="checkbox" id="emergencyAvailabilityToggle" <?= $staff['emergency_availability'] == 1 ? 'checked' : '' ?>>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                                <span class="toggle-text" id="emergencyAvailabilityText">
                                                                    <?= $staff['emergency_availability'] == 1 ? 'Yes' : 'No' ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Professional Information Column -->
                                    <div class="col-lg-6">
                                        <div class="profile-section">
                                            <div class="info-card">
                                                <div class="card-body">
                                                    <h4 class="info-title"><i class="fas fa-briefcase"></i> Professional Information</h4>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="info-label">Join Date</p>
                                                            <p class="info-value">
                                                                <i class="far fa-calendar-alt"></i><?= htmlspecialchars($staff['join_date']) ?>
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="info-label">Status</p>
                                                            <p class="info-value">
                                                                <span class="badge-custom <?= $staff['status'] == 'active' ? 'badge-success' : ($staff['status'] == 'on_leave' ? 'badge-warning' : 'badge-danger') ?>">
                                                                    <?= ucfirst(htmlspecialchars($staff['status'])) ?>
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <p class="info-label">Teaching Capabilities</p>
                                                    <div class="skills-list">
                                                        <?php if ($staff['can_teach_without_tajweed'] == 1): ?>
                                                            <span class="skill-item">Without Tajweed</span>
                                                        <?php endif; ?>
                                                        <?php if ($staff['can_teach_with_tajweed'] == 1): ?>
                                                            <span class="skill-item">With Tajweed</span>
                                                        <?php endif; ?>
                                                    </div>

                                                    <p class="info-label">Other Subjects</p>
                                                    <p class="info-value"><?= htmlspecialchars($staff['other_subjects']) ?></p>

                                                    <p class="info-label">Languages Known</p>
                                                    <p class="info-value"><?= htmlspecialchars($staff['languages_known']) ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="profile-section">
                                            <div class="info-card">
                                                <div class="card-body">
                                                    <h4 class="info-title"><i class="fas fa-shield-alt"></i> Verification Status</h4>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="info-label">Photo Verification</p>
                                                            <span class="verification-badge <?= ($staff['photo_verified'] == 1) ? 'verified' : 'not-verified' ?>">
                                                                <i class="fas <?= ($staff['photo_verified'] == 1) ? 'fa-check-circle' : 'fa-times-circle' ?>"></i>
                                                                <?= ($staff['photo_verified'] == 1) ? 'Verified' : 'Not Verified' ?>
                                                            </span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="info-label">Voice Verification</p>
                                                            <span class="verification-badge <?= ($staff['voice_verified'] == 1) ? 'verified' : 'not-verified' ?>">
                                                                <i class="fas <?= ($staff['voice_verified'] == 1) ? 'fa-check-circle' : 'fa-times-circle' ?>"></i>
                                                                <?= ($staff['voice_verified'] == 1) ? 'Verified' : 'Not Verified' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <p class="info-label">Overall Verification</p>
                                                    <span class="verification-badge <?= ($staff['verification_status'] == 'approved') ? 'verified' : ($staff['verification_status'] == 'pending' ? 'not-verified' : 'badge-danger') ?>">
                                                        <i class="fas <?= ($staff['verification_status'] == 'approved') ? 'fa-check-circle' : ($staff['verification_status'] == 'pending' ? 'fa-clock' : 'fa-times-circle') ?>"></i>
                                                        <?= ucfirst(htmlspecialchars($staff['verification_status'])) ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-footer text-center bg-transparent">
                                <a href="edit_profile.php?id=<?= $staff['staff_id'] ?>" class="btn btn-edit">
                                    <i class="fas fa-edit"></i> Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Area Start Here -->
        <?php include 'includes/footer.php'; ?>
        <!-- Footer Area End Here -->
    </div>

    <?php include 'includes/scripts.php'; ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Emergency Staff Toggle
        const emergencyStaffToggle = document.getElementById('emergencyStaffToggle');
        const emergencyStaffText = document.getElementById('emergencyStaffText');
        
        emergencyStaffToggle.addEventListener('change', function() {
            const isEmergencyStaff = this.checked ? 1 : 0;
            emergencyStaffText.textContent = this.checked ? 'Yes' : 'No';
            updateProfileField('is_emergency_staff', isEmergencyStaff);
        });

        // Emergency Availability Toggle
        const emergencyAvailabilityToggle = document.getElementById('emergencyAvailabilityToggle');
        const emergencyAvailabilityText = document.getElementById('emergencyAvailabilityText');
        
        emergencyAvailabilityToggle.addEventListener('change', function() {
            const isAvailable = this.checked ? 1 : 0;
            emergencyAvailabilityText.textContent = this.checked ? 'Yes' : 'No';
            updateProfileField('emergency_availability', isAvailable);
        });

        function updateProfileField(field, value) {
            const formData = new FormData();
            formData.append('field', field);
            formData.append('value', value);

            fetch('update_staff_status.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                // Show success message if needed
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });
    </script>
</body>
</html>
