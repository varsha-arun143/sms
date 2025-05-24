<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <!-- Metadata, CSS, and general head content -->
    <?php include 'includes/header.php'; ?>
</head>
<body>
    <!-- Preloader Start -->

    <!-- Preloader End -->

    <!-- Wrapper Start -->
    <div id="wrapper" class="wrapper bg-ash">
        
        <!-- Header / Topbar Start -->
        <?php include 'includes/topbar.php'; ?>
        <!-- Header / Topbar End -->
        
        <!-- Page Content Start -->
        <div class="dashboard-page-one">
            
            <!-- Sidebar Start -->
            <?php include 'includes/sidebar.php'; ?>
            <!-- Sidebar End -->
            
            <!-- Main Content Area Start -->
            <div class="dashboard-content-one">
                
                <!-- Breadcrumbs / Page Title Start -->
                <?php include 'includes/breadcubs.php'; ?>
                <!-- Breadcrumbs / Page Title End -->
                
                <!-- Dashboard Top Cards Start -->
                <?php include 'dashboard-topcard.php'; ?>
                <!-- Dashboard Top Cards End -->
                
                <!-- Dashboard Main Content Start -->
                <?php include 'dashboard-maincard.php'; ?>
                <!-- Dashboard Main Content End -->
            
                <!-- Footer Start -->
                <?php include 'includes/footer.php'; ?>
                <!-- Footer End -->
            </div>
            <!-- Main Content Area End -->
        </div>
        <!-- Page Content End -->
    </div>
    <!-- Wrapper End -->

    <!-- Scripts (JS files) -->
    <?php include 'includes/scripts.php'; ?>
</body>
</html>
