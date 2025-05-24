<div class="row gutters-20">
    <!-- Fee Collection Section (Earnings) -->
    <div class="col-12 col-xl-8 col-6-xxxl">
        <div class="card dashboard-card-one pd-b-20 d-flex flex-column">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Fee Collections</h3>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"> <i class="fas fa-times text-orange-red"></i>Close </a>
                            <a class="dropdown-item" href="#"> <i class="fas fa-cogs text-dark-pastel-green"></i>Edit </a>
                            <a class="dropdown-item" href="#"> <i class="fas fa-redo-alt text-orange-peel"></i>Refresh </a>
                        </div>
                    </div>
                </div>
                
                <!-- Fee Collection Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Collection Type</th>
                                <th>Amount (₹)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total Fees Collected</td>
                                <td>₹35,000</td>
                            </tr>
                            <tr>
                                <td>Pending Fees</td>
                                <td>₹5,000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Date Selector -->
                <div class="dropdown">
                    <a class="date-dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Jan 20, 2025</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Jan 20, 2025</a>
                        <a class="dropdown-item" href="#">Feb 20, 2025</a>
                        <a class="dropdown-item" href="#">Mar 20, 2025</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Student Performance Section (Urdu Levels) -->
    <div class="col-12 col-xl-4 col-6-xxxl">
        <div class="card dashboard-card-three pd-b-20 d-flex flex-column" style="height: 350px;">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Student Performance (Urdu)</h3>
                    </div>
                </div>

                <!-- Bar Chart for Performance -->
                <div class="chart-wrap" style="height: 150px; overflow: hidden;">
                    <canvas id="studentPerformanceChart" width="100%" height="100"></canvas>
                </div>

                <!-- Student Performance Details -->
                <div class="student-report mt-3">
                    <div class="student-count pseudo-bg-blue">
                        <h4 class="item-title">Nazra Level</h4>
                        <div class="item-number">120</div>
                    </div>
                    <div class="student-count pseudo-bg-yellow">
                        <h4 class="item-title">Tajweed Level</h4>
                        <div class="item-number">60</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Urdu Class Calendar -->
    <div class="col-12 col-xl-6 col-12-xxxl">
        <div class="card dashboard-card-four pd-b-20 d-flex flex-column">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Urdu Class Calendar</h3>
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
</div>

<!-- Include jQuery, Bootstrap JS, and Chart.js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.js"></script>

<script>
  // Student Performance Bar Chart
  var ctx = document.getElementById('studentPerformanceChart').getContext('2d');
  var studentPerformanceChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Nazra', 'Tajweed'],
      datasets: [{
        label: 'Students',
        data: [120, 60],
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

  // FullCalendar for Urdu Class Calendar
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

<!-- FullCalendar CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.css">

<!-- Custom CSS for Layout Adjustments -->

