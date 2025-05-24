<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'error'): ?>
    <div class="alert alert-danger">Registration failed. Please try again.</div>
<?php endif; ?>

    <div class="container mt-5">
        
        <h1>User Registration Form</h1>
        <form action="submit_registration.php" method="POST" enctype="multipart/form-data">
           <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="whatsapp_number">WhatsApp Number:</label>
                <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address"></textarea>
            </div>
            <div class="form-group">
                <label for="profile_image">Profile Image:</label>
                <input type="file" class="form-control-file" id="profile_image" name="profile_image">
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="guardian_name">Guardian Name:</label>
                <input type="text" class="form-control" id="guardian_name" name="guardian_name">
            </div>
            <div class="form-group">
                <label for="guardian_phone">Guardian Phone:</label>
                <input type="text" class="form-control" id="guardian_phone" name="guardian_phone">
            </div>
            <div class="form-group">
                <label for="current_level">Current Level:</label>
                <input type="text" class="form-control" id="current_level" name="current_level">
            </div>
            <div class="form-group">
                <label for="learning_goals">Learning Goals:</label>
                <textarea class="form-control" id="learning_goals" name="learning_goals"></textarea>
            </div>
            <div class="form-group">
                <label for="school_class_level">School Class Level:</label>
                <input type="text" class="form-control" id="school_class_level" name="school_class_level">
            </div>
            <div class="form-group">
                <label for="school_name">School Name:</label>
                <input type="text" class="form-control" id="school_name" name="school_name">
            </div>
            <div class="form-group">
                <label for="college_course">College Course:</label>
                <input type="text" class="form-control" id="college_course" name="college_course">
            </div>
            <div class="form-group">
                <label for="other_college_course">Other College Course:</label>
                <input type="text" class="form-control" id="other_college_course" name="other_college_course">
            </div>
            <div class="form-group">
                <label for="college_name">College Name:</label>
                <input type="text" class="form-control" id="college_name" name="college_name">
            </div>
            <div class="form-group">
                <label for="occupation">Occupation:</label>
                <input type="text" class="form-control" id="occupation" name="occupation">
            </div>
            <div class="form-group">
                <label for="other_occupation">Other Occupation:</label>
                <input type="text" class="form-control" id="other_occupation" name="other_occupation">
            </div>
            <div class="form-group">
                <label for="company_name">Company Name:</label>
                <input type="text" class="form-control" id="company_name" name="company_name">
            </div>
            <div class="form-group">
                <label for="business_type">Business Type:</label>
                <input type="text" class="form-control" id="business_type" name="business_type">
            </div>
            <div class="form-group">
                <label for="other_business_type">Other Business Type:</label>
                <input type="text" class="form-control" id="other_business_type" name="other_business_type">
            </div>
            <div class="form-group">
                <label for="years_in_business">Years in Business:</label>
                <select class="form-control" id="years_in_business" name="years_in_business">
                    <option value="1-3_years">1-3 Years</option>
                    <option value="4-6_years">4-6 Years</option>
                    <option value="7+_years">7+ Years</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Register User</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
