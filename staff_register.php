<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Registration Form</h2>
    <form action="staff_reg_backend.php" method="POST" enctype="multipart/form-data">
        
        <!-- User Information Section -->
        <h3>User Information</h3>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <!-- Staff Information Section -->
        <h3>Staff Information</h3>
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>

        <div class="mb-3">
            <label for="whatsapp_number" class="form-label">WhatsApp Number</label>
            <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="profile_image" class="form-label">Profile Image</label>
            <input type="file" class="form-control" id="profile_image" name="profile_image">
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="community" class="form-label">Community</label>
            <input type="text" class="form-control" id="community" name="community">
        </div>

        <div class="mb-3">
            <label for="mother_tongue" class="form-label">Mother Tongue</label>
            <input type="text" class="form-control" id="mother_tongue" name="mother_tongue">
        </div>

        <div class="mb-3">
            <label for="hourly_rate" class="form-label">Hourly Rate</label>
            <input type="number" class="form-control" id="hourly_rate" name="hourly_rate">
        </div>

        <div class="mb-3">
            <label for="monthly_salary" class="form-label">Monthly Salary</label>
            <input type="number" class="form-control" id="monthly_salary" name="monthly_salary">
        </div>

        <div class="mb-3">
            <label for="join_date" class="form-label">Join Date</label>
            <input type="date" class="form-control" id="join_date" name="join_date" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </div>

        <!-- Staff Qualifications -->
        <div class="mb-3">
            <label for="can_teach_without_tajweed" class="form-label">Can Teach Without Tajweed</label>
            <select class="form-control" id="can_teach_without_tajweed" name="can_teach_without_tajweed">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="can_teach_with_tajweed" class="form-label">Can Teach With Tajweed</label>
            <select class="form-control" id="can_teach_with_tajweed" name="can_teach_with_tajweed">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="other_subjects" class="form-label">Other Subjects</label>
            <input type="text" class="form-control" id="other_subjects" name="other_subjects">
        </div>

        <div class="mb-3">
            <label for="languages_known" class="form-label">Languages Known</label>
            <input type="text" class="form-control" id="languages_known" name="languages_known">
        </div>

        <div class="mb-3">
            <label for="photo_verified" class="form-label">Photo Verified</label>
            <select class="form-control" id="photo_verified" name="photo_verified">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="voice_verified" class="form-label">Voice Verified</label>
            <select class="form-control" id="voice_verified" name="voice_verified">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="verification_status" class="form-label">Verification Status</label>
            <select class="form-control" id="verification_status" name="verification_status">
                <option value="Verified">Verified</option>
                <option value="Not Verified">Not Verified</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
