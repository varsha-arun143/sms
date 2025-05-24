<?php
require_once 'includes/auth_check.php';
require_once 'includes/db.php';

// Get staff details
$staff_id = $_SESSION['user_id'];
$current_date = date('Y-m-d');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update regular availability
    if (isset($_POST['update_slots'])) {
        // Delete existing future slots for this user
        $db->prepare("DELETE FROM time_slots WHERE user_id = ? AND start_time > NOW()")
           ->execute([$staff_id]);
        
        // Insert new slots
        $stmt = $db->prepare("INSERT INTO time_slots (user_id, start_time, end_time, status) VALUES (?, ?, ?, 'available')");
        
        foreach ($_POST['slots'] as $slot) {
            list($date, $start, $end) = explode('|', $slot);
            $start_datetime = "$date $start";
            $end_datetime = "$date $end";
            $stmt->execute([$staff_id, $start_datetime, $end_datetime]);
        }
        
        $_SESSION['success'] = "Your availability has been updated successfully!";
        header("Location: set-availability.php");
        exit();
    }
}

// Get current slots (only future slots)
$slots = $db->prepare("SELECT * FROM time_slots 
                      WHERE user_id = ? 
                      AND start_time > NOW()
                      ORDER BY start_time");
$slots->execute([$staff_id]);
$current_slots = $slots->fetchAll(PDO::FETCH_ASSOC);

// Group slots by date for display
$grouped_slots = [];
foreach ($current_slots as $slot) {
    $date = date('Y-m-d', strtotime($slot['start_time']));
    $grouped_slots[$date][] = [
        'start' => date('H:i', strtotime($slot['start_time'])),
        'end' => date('H:i', strtotime($slot['end_time'])),
        'id' => $slot['id']
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Availability - QSMS</title>
    <?php include 'includes/header.php'; ?>
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets/css/timepicker.min.css">
    <style>
        .day-container { 
            margin-bottom: 30px; 
            border-bottom: 1px solid #eee; 
            padding-bottom: 20px; 
        }
        .slot-badge { 
            margin-right: 5px; 
            margin-bottom: 5px; 
            cursor: pointer;
        }
        .confirmation-window { 
            background-color: #f8f9fa; 
            padding: 15px; 
            border-radius: 5px; 
            margin-bottom: 20px;
        }
        #date-picker {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include 'includes/staff-navbar.php'; ?>
    
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Set Your Availability</h4>
                            <p>Minimum 5 slots per week required | Maximum 20 slots per day</p>
                        </div>
                        
                        <div class="card-body">
                            <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
                            <?php endif; ?>
                            
                            <!-- Confirmation Window Reminder -->
                            <div class="confirmation-window">
                                <h5><i class="fas fa-clock"></i> Confirmation Windows</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <strong>First Confirmation:</strong> 12:00 PM - 3:00 PM
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <strong>Second Confirmation:</strong> 2 hours before class
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Date Picker -->
                            <div class="form-group">
                                <label>Select Date</label>
                                <input type="text" id="date-picker" class="form-control datepicker" autocomplete="off">
                            </div>
                            
                            <!-- Slot Management Form -->
                            <form method="POST" id="availabilityForm">
                                <!-- Slot Picker -->
                                <div class="row slot-picker mb-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Start Time</label>
                                            <input type="text" class="form-control timepicker" id="slot-start" placeholder="HH:MM">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>End Time</label>
                                            <input type="text" class="form-control timepicker" id="slot-end" placeholder="HH:MM">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" id="add-slot-btn" class="btn btn-primary" style="margin-top: 30px;">
                                            Add Slot
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Current Slots Display -->
                                <h5>Your Scheduled Slots</h5>
                                <div id="slots-container">
                                    <?php foreach ($grouped_slots as $date => $slots): ?>
                                        <div class="day-container">
                                            <h6><?= date('l, F j', strtotime($date)) ?></h6>
                                            <div class="slots-group mb-3">
                                                <?php foreach ($slots as $slot): ?>
                                                    <span class="badge badge-primary slot-badge">
                                                        <?= $slot['start'] ?> - <?= $slot['end'] ?>
                                                        <input type="hidden" name="slots[]" value="<?= $date ?>|<?= $slot['start'] ?>|<?= $slot['end'] ?>">
                                                    </span>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                
                                <div class="form-group mt-4">
                                    <button type="submit" name="update_slots" class="btn btn-primary">Save Availability</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/timepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize date picker
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '0d',
                autoclose: true
            });
            
            // Initialize time picker
            $('.timepicker').timepicker({
                timeFormat: 'HH:mm',
                interval: 30,
                minTime: '06:00',
                maxTime: '23:30',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
            
            // Add slot button handler
            $('#add-slot-btn').click(function() {
                const date = $('#date-picker').val();
                const start = $('#slot-start').val();
                const end = $('#slot-end').val();
                
                if (!date) {
                    alert('Please select a date first');
                    return;
                }
                
                if (!start || !end) {
                    alert('Please select both start and end times');
                    return;
                }
                
                if (start >= end) {
                    alert('End time must be after start time');
                    return;
                }
                
                // Format date for display
                const displayDate = new Date(date).toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                
                // Check if we already have slots for this date
                let dayContainer = $(`.day-container h6:contains('${displayDate}')`).closest('.day-container');
                
                if (dayContainer.length === 0) {
                    // Create new day container
                    dayContainer = $(`
                        <div class="day-container">
                            <h6>${displayDate}</h6>
                            <div class="slots-group mb-3"></div>
                        </div>
                    `);
                    $('#slots-container').append(dayContainer);
                }
                
                // Add to the display
                const slotDisplay = $(`
                    <span class="badge badge-primary slot-badge">
                        ${start} - ${end}
                        <input type="hidden" name="slots[]" value="${date}|${start}|${end}">
                    </span>
                `);
                
                dayContainer.find('.slots-group').append(slotDisplay);
                
                // Clear inputs
                $('#slot-start').val('');
                $('#slot-end').val('');
            });
            
            // Remove slot when badge is clicked
            $(document).on('click', '.slot-badge', function() {
                if (confirm('Remove this time slot?')) {
                    $(this).remove();
                    
                    // Remove day container if no slots left
                    const dayContainer = $(this).closest('.day-container');
                    if (dayContainer.find('.slot-badge').length === 0) {
                        dayContainer.remove();
                    }
                }
            });
            
            // Validate minimum slots before submit
            $('#availabilityForm').submit(function(e) {
                const totalSlots = $('input[name="slots[]"]').length;
                
                if (totalSlots < 5) {
                    e.preventDefault();
                    alert('You must set at least 5 slots per week');
                }
                
                // Check for more than 20 slots on any single day
                let valid = true;
                $('.day-container').each(function() {
                    const slotsCount = $(this).find('.slot-badge').length;
                    if (slotsCount > 20) {
                        valid = false;
                        const date = $(this).find('h6').text();
                        alert(`You cannot have more than 20 slots on ${date}`);
                        return false; // break loop
                    }
                });
                
                if (!valid) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>