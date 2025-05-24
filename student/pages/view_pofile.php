<div class="row gutters-20">
    <!-- Personal Profile Summary Section -->
    <div class="col-12 col-xl-8 col-6-xxxl">
        <div class="card dashboard-card-one pd-b-20">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Student Profile Summary</h3>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-expanded="false">...</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-times text-orange-red"></i>Close
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs text-dark-pastel-green"></i>Edit Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-redo-alt text-orange-peel"></i>Refresh
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Profile Summary Content -->
                <div class="profile-summary">
                    <div class="item-content">
                        <div class="single-item pseudo-bg-blue">
                            <h4>Name</h4>
                            <span>John Doe</span> <!-- Replace with dynamic name -->
                        </div>
                        <div class="single-item pseudo-bg-green">
                            <h4>Contact</h4>
                            <span>+91 123 456 7890</span> <!-- Replace with dynamic contact -->
                        </div>
                        <div class="single-item pseudo-bg-red">
                            <h4>Class</h4>
                            <span>Class 5A</span> <!-- Replace with dynamic class -->
                        </div>
                    </div>
                </div>

                <!-- Action Links -->
                <div class="dropdown">
                    <a class="action-dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                       aria-expanded="false">View More</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs text-dark-pastel-green"></i>Edit Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-redo-alt text-orange-peel"></i>Refresh
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Student Performance Section -->
    <div class="col-12 col-xl-6 col-3-xxxl">
        <div class="card dashboard-card-three pd-b-20">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Student Performance</h3>
                    </div>
                </div>
                <!-- Performance Details -->
                <div class="student-report">
                    <div class="student-count pseudo-bg-blue">
                        <h4 class="item-title">Grade: A</h4>
                        <div class="item-number">120</div>
                    </div>
                    <div class="student-count pseudo-bg-yellow">
                        <h4 class="item-title">Subject Proficiency</h4>
                        <div class="item-number">Math: 90%, English: 85%, Science: 88%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fee Collection Section -->
    <div class="col-12 col-xl-6 col-3-xxxl">
        <div class="card dashboard-card-two pd-b-20">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Fee Collection Overview</h3>
                    </div>
                </div>
                
                <!-- Fee Report Content -->
                <div class="earning-report">
                    <div class="item-content">
                        <div class="single-item pseudo-bg-blue">
                            <h4>Total Fees Paid</h4>
                            <span>₹30,000</span>
                        </div>
                        <div class="single-item pseudo-bg-red">
                            <h4>Pending Fees</h4>
                            <span>₹5,000</span>
                        </div>
                    </div>
                </div>
                
                <!-- Fee Collection Chart -->
                <div class="earning-chart-wrap">
                    <canvas id="earning-line-chart" width="660" height="320"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Class Routine Section -->
    <div class="col-12 col-xl-6 col-4-xxxl">
        <div class="card dashboard-card-four pd-b-20">
            <div class="card-body">
                <div class="heading-layout1">
                    <div class="item-title">
                        <h3>Class Routine</h3>
                    </div>
                </div>

                <!-- Class Routine Table -->
                <div class="routine-wrap">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Monday</td>
                                <td>Class 5A</td>
                                <td>Math</td>
                                <td>9:00 AM - 10:00 AM</td>
                            </tr>
                            <tr>
                                <td>Tuesday</td>
                                <td>Class 5A</td>
                                <td>English</td>
                                <td>10:00 AM - 11:00 AM</td>
                            </tr>
                            <tr>
                                <td>Wednesday</td>
                                <td>Class 5A</td>
                                <td>Science</td>
                                <td>11:00 AM - 12:00 PM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
