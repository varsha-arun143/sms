<div class="row gutters-20">
    <!-- Total Students -->
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="dashboard-summery-one mg-b-20 d-flex flex-column justify-content-between">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="item-icon bg-light-green">
                        <i class="flaticon-classmates text-green"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="item-content">
                        <div class="item-title">Total Students</div>
                        <!-- Example number: 1,500 -->
                        <div class="item-number">
                            <span class="counter" data-num="1500">1,500</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Current Classes -->
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="dashboard-summery-one mg-b-20 d-flex flex-column justify-content-between">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="item-icon bg-light-blue">
                        <i class="flaticon-book text-blue"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="item-content">
                        <div class="item-title">Current Classes</div>
                        <!-- Example number: 30 -->
                        <div class="item-number">
                            <span class="counter" data-num="30">30</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Payroll This Month -->
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="dashboard-summery-one mg-b-20 d-flex flex-column justify-content-between">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="item-icon bg-light-yellow">
                        <i class="flaticon-money text-orange"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="item-content">
                        <div class="item-title">Payroll Month</div>
                        <!-- Example payroll in ₹ -->
                        <div class="item-number">
                            <span class="counter" data-num="200000">₹ 2,00,000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Today's Leave Requests -->
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="dashboard-summery-one mg-b-20 d-flex flex-column justify-content-between">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="item-icon bg-light-red">
                        <i class="flaticon-user text-red"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="item-content">
                        <div class="item-title">Leave Requests</div>
                        <!-- Example number: 5 -->
                        <div class="item-number">
                            <span class="counter" data-num="5">5</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery, Bootstrap JS, and Counter JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.rawgit.com/mhuggins/jQuery-UI-Spinner/master/js/jquery.spinner.min.js"></script>

<script>
  // Initialize counters (use the actual numbers as needed)
  $(document).ready(function () {
    $('.counter').each(function () {
      var $this = $(this);
      var countTo = $this.attr('data-num');
      $({
        countNum: $this.text()
      }).animate({
        countNum: countTo
      }, {
        duration: 2000,
        easing: 'swing',
        step: function () {
          $this.text(Math.floor(this.countNum));
        },
        complete: function () {
          $this.text(this.countNum);
        }
      });
    });
  });
</script>
