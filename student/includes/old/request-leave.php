<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>Student Leave Request</h3>
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

        <form action="leave_request_backend.php" method="POST">
    <div class="form-group">
        <label for="leaveType">Leave Type</label>
        <select name="leave_type" class="form-control" required>
            <option value="">-- Select --</option>
            <option value="Sick Leave">Sick Leave</option>
            <option value="Personal Leave">Personal Leave</option>
        </select>
    </div>
    <div class="form-group">
        <label for="startDate">Start Date</label>
        <input type="date" name="start_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="endDate">End Date</label>
        <input type="date" name="end_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="reason">Reason</label>
        <textarea name="reason" class="form-control" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit Request</button>
</form>

    </div>
</div>
