<div class="row gutters-20">
    <!-- Total Classes -->
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
                        <div class="item-title">Total Classes</div>
                        <!-- Example number: 30 -->
                        <div class="item-number">
                            <span class="counter" data-num="30">30</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- My Overall Progress -->
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="dashboard-summery-one mg-b-20 d-flex flex-column justify-content-between">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="item-icon bg-light-yellow">
                        <i class="flaticon-stats text-orange"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="item-content">
                        <div class="item-title">Overall Progress</div>
                        <!-- Example progress: 85% -->
                        <div class="item-number">
                            <span class="counter" data-num="85">85%</span>
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
  // Initialize counters for dynamic number updates
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
