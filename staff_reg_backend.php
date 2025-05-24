<?php
 include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
   
    // Collect form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $role='staff';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $whatsapp_number = $_POST['whatsapp_number'];
    $address = $_POST['address'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $community = $_POST['community'];
    $mother_tongue = $_POST['mother_tongue'];
    $hourly_rate = $_POST['hourly_rate'];
    $monthly_salary = $_POST['monthly_salary'];
    $join_date = $_POST['join_date'];
    $status = $_POST['status'];
    $can_teach_without_tajweed = $_POST['can_teach_without_tajweed'];
    $can_teach_with_tajweed = $_POST['can_teach_with_tajweed'];
    $other_subjects = $_POST['other_subjects'];
    $languages_known = $_POST['languages_known'];
    $photo_verified = $_POST['photo_verified'];
    $voice_verified = $_POST['voice_verified'];
    $verification_status = $_POST['verification_status'];

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Handle file upload for profile image
    $profile_image = $_FILES['profile_image']['name'];
    $target_dir = "uploads/profile/";
    $target_file = $target_dir . basename($profile_image);
    move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file);

    // Insert into users table
    $user_query = "INSERT INTO users (email, password_hash, phone, role) VALUES ('$email', '$password_hash', '$phone','$role')";
    if ($conn->query($user_query) === TRUE) {
        // Get the last inserted user ID
        $user_id = $conn->insert_id;

        // Insert into staff table
        $staff_query = "INSERT INTO staff (user_id, first_name, last_name, phone, whatsapp_number, address, profile_image, date_of_birth, gender, community, mother_tongue, hourly_rate, monthly_salary, join_date, status, can_teach_without_tajweed, can_teach_with_tajweed, other_subjects, languages_known, photo_verified, voice_verified, verification_status) 
                        VALUES ('$user_id', '$first_name', '$last_name', '$phone', '$whatsapp_number', '$address', '$target_file', '$date_of_birth', '$gender', '$community', '$mother_tongue', '$hourly_rate', '$monthly_salary', '$join_date', '$status', '$can_teach_without_tajweed', '$can_teach_with_tajweed', '$other_subjects', '$languages_known', '$photo_verified', '$voice_verified', '$verification_status')";

        if ($conn->query($staff_query) === TRUE) {
            header('location: login.php');
        } else {
            echo "Error: " . $staff_query . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $user_query . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
