<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>Student Enquiry</h3>
            </div>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                </div>
            </div>
        </div>

        <!-- Student Enquiry Form -->
        <form class="new-added-form">
            <div class="row">
                <!-- Name Field -->
                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <label>Name *</label>
                    <input type="text" placeholder="Enter Your Name" class="form-control" required>
                </div>

                <!-- Query Content Field -->
                <div class="col-xl-3 col-lg-6 col-12 form-group">
                    <label>Query Content *</label>
                    <textarea class="textarea form-control" name="query-content" rows="4" placeholder="Describe Your Query" required></textarea>
                </div>

                <!-- Submit and Reset Buttons -->
                <div class="col-12 form-group mg-t-8">
                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Submit Enquiry</button>
                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>
