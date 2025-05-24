<?php 


include('../db_config.php');?>
<!-- Modified NavBar for Sabeel Academy School Management System -->
<div class="navbar navbar-expand-md header-menu-one bg-light">
    <!-- LOGO & TOGGLE BUTTON -->
    <div class="nav-bar-header-one">
        <div class="header-logo">
            <!-- Replace the logo file with your own -->
            <a href="index.html">
                <img src="img/sabeel-logo.png" alt="Sabeel Academy Logo">
            </a>
        </div>
        <div class="toggle-button sidebar-toggle">
            <button type="button" class="item-link">
                <span class="btn-icon-wrap">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
        </div>
    </div>
    
    <!-- MOBILE NAV TOGGLE BUTTONS -->
    <div class="d-md-none mobile-nav-bar">
        <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse"
            data-target="#mobile-navbar" aria-expanded="false">
            <i class="far fa-arrow-alt-circle-down"></i>
        </button>
        <button type="button" class="navbar-toggler sidebar-toggle-mobile">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    
    <!-- MAIN MENU -->
    <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
        <ul class="navbar-nav">
            <!-- SEARCH BAR -->
            <li class="navbar-item header-search-bar">
            </li>
        </ul>
        
        <ul class="navbar-nav">
            <!-- ADMIN DROPDOWN -->
            <li class="navbar-item dropdown header-admin">
                <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    <div class="admin-title">
                        <h5 class="item-title">Sabeel Admin</h5>
                        <span>Administrator</span>
                    </div>
                    <div class="admin-img">
                        <!-- Replace with your admin image -->
                        <img src="img/figure/admin.jpg" alt="Admin">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="item-header">
                        <h6 class="item-title">Sabeel Admin</h6>
                    </div>
                    <div class="item-content">
                        <ul class="settings-list">
                            <li><a href="staff-profile.php"><i class="flaticon-user"></i>My Profile</a></li>
                            <li><a href="#"><i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i>Messages</a></li>
                            <li><a href="#"><i class="flaticon-gear-loading"></i>Account Settings</a></li>
                            <li><a href="login.html"><i class="flaticon-turn-off"></i>Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </li>

            <!-- NOTIFICATION ICON -->
            <li class="navbar-item dropdown header-notifications">
                <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" 
                    aria-expanded="false">
                    <i class="fas fa-bell"></i> <!-- Notification Bell Icon -->
                    <?php
                    // Assuming session or logged-in user is available
                    $userId = $_SESSION['user_id']; // Get logged-in user's ID
                    // Fetch unread notifications count
                    $notificationCountQuery = "SELECT COUNT(*) AS unread_count FROM Notifications WHERE user_id = $userId AND status = 'unread'";
                    $notificationCountResult = $conn->query($notificationCountQuery);
                    $notificationCount = $notificationCountResult->fetch_assoc()['unread_count'];

                    // Display unread count if there are unread notifications
                    if ($notificationCount > 0) {
                        echo "<span class='badge badge-danger'>$notificationCount</span>";
                    }
                    ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <h6 class="dropdown-header">Notifications</h6>
                    <?php
                    // Fetch unread notifications
                    $notificationsQuery = "SELECT * FROM Notifications WHERE user_id = $userId AND status = 'unread' ORDER BY created_at DESC";
                    $notificationsResult = $conn->query($notificationsQuery);

                    if ($notificationsResult->num_rows > 0) {
                        while ($notification = $notificationsResult->fetch_assoc()) {
                            echo "<a class='dropdown-item' href='all-student.php' data-notification-id='" . $notification['notification_id'] . "'>" . $notification['message'] . "</a>";
                        }
                    } else {
                        echo "<a class='dropdown-item' href='#'>No new notifications</a>";
                    }
                    ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">See all notifications</a>
                </div>
            </li>

            <!-- LANGUAGE SELECTION -->
            <li class="navbar-item dropdown header-language">
                <a class="navbar-nav-link dropdown-toggle" href="#" role="button" 
                    data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-globe-americas"></i> EN
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">English</a>
                </div>
            </li>
        </ul>
    </div>
</div>
