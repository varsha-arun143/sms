<?php

require '../db_config.php';

// Ensure user is logged in
if (!isset($_SESSION['std_ID'])) {
    echo "<div class='alert alert-danger'>You must be logged in to view leave history.</div>";
    exit;
}

$user_id = $_SESSION['std_ID'];
$role = $_SESSION['role'];

$query = "SELECT start_date, end_date, total_days, reason, status, reject_reason
          FROM ApplyLeave 
          WHERE user_id = ? and role = ?
          ORDER BY leave_request_id DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("is", $user_id, $role);
$stmt->execute();
$result = $stmt->get_result();
?>

<!-- Card Layout -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>Student Leave History</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>
                <div class="dropdown-menu dropdown-menu-right">
                    
                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive mt-4">
            <table class="table table-striped table-bordered text-center">
                <thead class="">
                    <tr>
                        <th>S.NO</th>
                        <th>Leave Start Date</th>
                        <th>End Date</th>
                        <th>Total Days</th>
                        <th>Reason</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($result->num_rows > 0): ?>
                <?php $count = 1?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo date("M j, Y", strtotime($row['start_date'])); ?></td>
                            <td><?php echo date("M j, Y", strtotime($row['end_date'])); ?></td>
                            <td><?php echo $row['total_days']; ?></td>
                            <td><?php echo htmlspecialchars($row['reason']); ?></td>
                           <td>
    <?php if ($row['status'] === 'approved'): ?>
        <span class="badge badge-success"><?php echo $row['status']; ?></span>
    <?php elseif ($row['status'] === 'rejected'): ?>
        <span class="badge badge-danger"><?php echo $row['status']; ?></span>
        <?php if (!empty($row['reject_reason'])): ?>
            <div class="mt-1">
                <span class="badge badge-light text-danger border border-danger px-2 py-1">
                    <?php echo htmlspecialchars($row['reject_reason']); ?>
                </span>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <span class="badge badge-warning text-dark"><?php echo $row['status']; ?></span>
    <?php endif; ?>
</td>


                        </tr>
                        
                    <?php 
                    $count+=$count;
                    endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">No leave history found.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
