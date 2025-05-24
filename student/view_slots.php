<?php
require_once 'db_config.php';

// Check if student is logged in
if (!isset($_SESSION['user_id'])) {
    header('location: index.php');
}

if ($_SESSION['role'] !== 'student') {
    header('location: index.php');
}

$userId = $_SESSION['user_id'];
$filter = $_GET['filter'] ?? 'upcoming'; // upcoming, past, all

// Build query based on filter
$query = "SELECT * FROM time_slots WHERE user_id = ?";
$params = [$userId];
$types = "i";

switch ($filter) {
    case 'upcoming':
        $query .= " AND start_time >= NOW()";
        break;
    case 'past':
        $query .= " AND start_time < NOW()";
        break;
    // 'all' shows everything
}

$query .= " ORDER BY start_time " . ($filter === 'past' ? 'DESC' : 'ASC');

$stmt = $conn->prepare($query);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$slots = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Group slots by date
$groupedSlots = [];
foreach ($slots as $slot) {
    $date = date('Y-m-d', strtotime($slot['start_time']));
    if (!isset($groupedSlots[$date])) {
        $groupedSlots[$date] = [];
    }
    $groupedSlots[$date][] = $slot;
}
?>
<?php include 'includes/header.php'; ?>

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
                <?php include 'includes/breadcubs.php'; ?>
                <!-- Breadcubs Area End Here -->
                
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>My Time Slots</h3>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">Filter</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item <?= $filter === 'upcoming' ? 'active' : '' ?>" 
                                       href="view_slots.php?filter=upcoming">Upcoming</a>
                                    <a class="dropdown-item <?= $filter === 'past' ? 'active' : '' ?>" 
                                       href="view_slots.php?filter=past">Past</a>
                                    <a class="dropdown-item <?= $filter === 'all' ? 'active' : '' ?>" 
                                       href="view_slots.php?filter=all">All</a>
                                </div>
                            </div>
                        </div>
                        
                        <?php if (isset($_GET['message'])): ?>
                            <div class="alert alert-success"><?= htmlspecialchars($_GET['message']) ?></div>
                        <?php endif; ?>
                        
                        <?php if (empty($groupedSlots)): ?>
                            <div class="alert alert-info">No time slots found.</div>
                        <?php else: ?>
                            <div class="accordion" id="slotsAccordion">
                                <?php foreach ($groupedSlots as $date => $dateSlots): ?>
                                    <?php
                                    $formattedDate = date('l, F j, Y', strtotime($date));
                                    $dateId = str_replace('-', '', $date);
                                    ?>
                                    <div class="card">
                                        <div class="card-header" id="heading<?= $dateId ?>">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" 
                                                        data-target="#collapse<?= $dateId ?>" aria-expanded="true" 
                                                        aria-controls="collapse<?= $dateId ?>">
                                                    <?= $formattedDate ?>
                                                    <span class="badge badge-primary ml-2"><?= count($dateSlots) ?> slots</span>
                                                </button>
                                            </h2>
                                        </div>
                                        
                                        <div id="collapse<?= $dateId ?>" class="collapse show" 
                                             aria-labelledby="heading<?= $dateId ?>" data-parent="#slotsAccordion">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table display data-table text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Start Time</th>
                                                                <th>End Time</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($dateSlots as $slot): ?>
                                                                <tr>
                                                                    <td><?= date('g:i A', strtotime($slot['start_time'])) ?></td>
                                                                    <td><?= date('g:i A', strtotime($slot['end_time'])) ?></td>
                                                                    <td>
                                                                        <span class="badge <?= $slot['status'] === 'available' ? 'badge-success' : 'badge-warning' ?>">
                                                                            <?= ucfirst($slot['status']) ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <a href="edit_slot.php?id=<?= $slot['id'] ?>" 
                                                                               class="btn btn-primary btn-sm mr-1">
                                                                                <i class="fas fa-edit"></i> Edit
                                                                            </a>
                                                                            <a href="delete_slot.php?id=<?= $slot['id'] ?>" 
                                                                               class="btn btn-danger btn-sm" 
                                                                               onclick="return confirm('Are you sure you want to delete this slot?')">
                                                                                <i class="fas fa-trash"></i> Delete
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="mt-4">
                            <a href="add_slot.php" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add New Slot
                            </a>
                            <a href="index.php" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back to Dashboard
                            </a>
                        </div>
                    </div>
                </div>
                
                <?php include 'includes/footer.php'; ?>
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>

    <?php include 'includes/scripts.php'; ?>
    
    <script>
        // Initialize accordion to show first item by default
        $(document).ready(function() {
            $('#slotsAccordion .collapse').first().addClass('show');
        });
    </script>
</body>
</html>