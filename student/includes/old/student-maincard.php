
<div class="row gutters-20">
    <!-- Today's Class -->
    <div class="col-12 col-xl-6 col-12-xxxl">
        <div class="card dashboard-card-one pd-b-10 d-flex flex-column">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Today's Class</h3>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"> 
                                <i class="fas fa-redo-alt text-orange-peel"></i>Refresh 
                            </a>
                        </div>
                    </div>
                </div>
    
                <!-- Today's Class Details Table -->
                <div class="table-responsive">
                    <?php
require '../db_config.php'; // DB connection

$stdID = $_SESSION['std_ID']; // Or from session if student is logged in
$today_date = date('Y-m-d');
?>

<!-- Today's Class Table -->
<h5>Today's Class</h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Class Start Time</th>
            <th>Meeting Link</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql_today = "SELECT class_start_time, meeting_link 
                      FROM ClassStartRecords 
                      WHERE student_id = ? AND DATE(meet_date) = ?";
        $stmt_today = $conn->prepare($sql_today);
        $stmt_today->bind_param("is", $stdID, $today_date);
        $stmt_today->execute();
        $stmt_today->bind_result($class_time, $meeting_link);

        $has_today = false;
        while ($stmt_today->fetch()) {
            $has_today = true;
            echo "<tr>";
            echo "<td>" . htmlspecialchars($class_time) . "</td>";
            echo "<td><a href='" . htmlspecialchars($meeting_link) . "' 
           class='meeting-link' 
           data-user-id='" . $std_id . "' 
          
           target='_blank'>Meeting link</a></td>";

            echo "</tr>";
        }

        if (!$has_today) {
            echo "<tr><td colspan='2'>No class scheduled for today.</td></tr>";
        }

        $stmt_today->close();
        ?>
    </tbody>
</table>


<!-- Past Classes Table -->
<h5>Past Class History</h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Date</th>
            <th>Class Start Time</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $sql_past = "SELECT meet_date, class_start_time, meeting_link 
                     FROM ClassStartRecords 
                     WHERE student_id = ? AND DATE(meet_date) < ?
                     ORDER BY meet_date DESC";
        $stmt_past = $conn->prepare($sql_past);
        $stmt_past->bind_param("is", $stdID, $today_date);
        $stmt_past->execute();
        $stmt_past->bind_result($past_date, $past_time, $past_link);

        $has_past = false;
        while ($stmt_past->fetch()) {
            $has_past = true;
            echo "<tr>";
            echo "<td>" . date('d-M-Y', strtotime($past_date)) . "</td>";
            echo "<td>" . htmlspecialchars($past_time) . "</td>";
           
            echo "</tr>";
        }

        if (!$has_past) {
            echo "<tr><td colspan='3'>No past classes found.</td></tr>";
        }

        $stmt_past->close();
        $conn->close();
        ?>
    </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
 


    <!-- Calendar -->
    <div class="col-12 col-xl-6 col-12-xxxl">
        <div class="card dashboard-card-four pd-b-20 d-flex flex-column">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Class Calendar</h3>
                    </div>
                </div>
                
                <!-- Calendar -->
                <div id="calendar"></div>
            </div>
        </div>
    </div>

    <!-- Notice Board Section -->
    <div class="col-12 col-xl-6 col-12-xxxl">
        <div class="card dashboard-card-six pd-b-20 d-flex flex-column">
            <div class="card-body">
                <div class="heading-layout1 mg-b-17">
                    <div class="item-title">
                        <h3>Notice Board</h3>
                    </div>
                </div>

                <!-- Notices -->
                <div class="notice-box-wrap">
                    <div class="notice-list">
                        <div class="post-date bg-skyblue">10 Mar, 2025</div>
                        <h6 class="notice-title"><a href="#">New CRM Lead: Maryam Begum</a></h6>
                        <div class="entry-meta">Admissions Dept / <span>10 min ago</span></div>
                    </div>

                    <div class="notice-list">
                        <div class="post-date bg-yellow">12 Mar, 2025</div>
                        <h6 class="notice-title"><a href="#">Next Urdu Batch Starts April 1</a></h6>
                        <div class="entry-meta">Academics / <span>1 hour ago</span></div>
                    </div>

                    <div class="notice-list">
                        <div class="post-date bg-pink">15 Mar, 2025</div>
                        <h6 class="notice-title"><a href="#">Fee Reminder: Due by March 25</a></h6>
                        <div class="entry-meta">Finance Dept / <span>2 hours ago</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Joining & Current Level Chart -->
    <div class="col-12 col-xl-6 col-12-xxxl">
        <div class="card dashboard-card-three pd-b-20 d-flex flex-column" style="height: 350px;">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Joining & Current Level</h3>
                    </div>
                </div>

                <!-- Bar Chart for Joining and Current Levels -->
                <div class="chart-wrap" style="height: 150px; overflow: hidden;">
                    <canvas id="levelChart" width="100%" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery, Bootstrap JS, and Chart.js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.js"></script>

<script>
  // Joining & Current Level Bar Chart
  var ctx = document.getElementById('levelChart').getContext('2d');
  var levelChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Joining Level', 'Current Level'],
      datasets: [{
        label: 'Level Progress',
        data: [120, 80],  // Sample data: 120 students in Joining Level, 80 students in Current Level
        backgroundColor: ['#4CAF50', '#FFEB3B'],
        borderColor: ['#388E3C', '#FBC02D'],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // FullCalendar for Class Calendar
  $(document).ready(function() {
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      events: [
        {
          title: 'Urdu Class - Batch 1',
          start: '2025-03-01T10:00:00',
          end: '2025-03-01T12:00:00',
          description: 'Urdu Nazra Class'
        },
        {
          title: 'Urdu Class - Batch 2',
          start: '2025-03-02T14:00:00',
          end: '2025-03-02T16:00:00',
          description: 'Urdu Tajweed Class'
        }
      ]
    });
  });
</script>
<script>
    $(document).ready(function() {
    // When a meeting link is clicked
    $('.meeting-link').on('click', function(e) {
        e.preventDefault();  // Prevent default link behavior

        var userId = $(this).data('user-id');  // Get user ID from data attribute
        var classId = $(this).data('class-id');  // Get class ID from data attribute

        // Make AJAX request to mark attendance as "Present"
        $.ajax({
            url: 'studentAttendance.php',  // PHP file that processes attendance
            type: 'POST',
            data: {
                user_id: userId
               
            },
            success: function(response) {
                alert(response);  // Show success or error message
            },
            error: function() {
                alert("Error marking attendance.");
            }
        });

        // Optionally, open the meeting link in a new tab
        window.open($(this).attr('href'), '_blank');
    });
});

</script>

<!-- FullCalendar CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.css">
