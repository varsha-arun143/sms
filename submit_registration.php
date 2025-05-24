<?php
include('db_config.php');

// Handle file upload
$profile_image = null;
if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
    $target_dir = "uploads/profile/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0755, true);
    }
    
    $file_ext = pathinfo($_FILES["profile_image"]["name"], PATHINFO_EXTENSION);
    $target_file = $target_dir . uniqid() . '.' . $file_ext;
    
    $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
    if ($check === false) {
        die(json_encode(['success' => false, 'error' => "File is not an image."]));
    }
    
    if ($_FILES["profile_image"]["size"] > 2000000) {
        die(json_encode(['success' => false, 'error' => "File is too large (max 2MB)."]));
    }
    
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array(strtolower($file_ext), $allowed_ext)) {
        die(json_encode(['success' => false, 'error' => "Only JPG, JPEG, PNG & GIF files are allowed."]));
    }
    
    if (!move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
        die(json_encode(['success' => false, 'error' => "Error uploading file."]));
    }
    
    $profile_image = $target_file;
}

// Set parameters for users table
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$phone = $_POST['phone'] ;
// Validate required fields
if (empty($email) || empty($password) || empty($first_name) || empty($last_name)) {
    die(json_encode(['success' => false, 'error' => "All required fields must be filled."]));
}



// Check if username exists
$check_username = $conn->prepare("SELECT user_id FROM users WHERE phone = ?");
$check_username->bind_param("s", $username);
$check_username->execute();
$check_username->store_result();

while ($check_username->num_rows > 0) {
    $username = $base_username . $counter;
    $check_username->bind_param("s", $username);
    $check_username->execute();
    $check_username->store_result();
    $counter++;
}
$check_username->close();

// Check if email exists
$check_email = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
$check_email->bind_param("s", $email);
$check_email->execute();
$check_email->store_result();

if ($check_email->num_rows > 0) {
    die(json_encode(['success' => false, 'error' => "Email already registered."]));
}
$check_email->close();

// Hash password
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$role = 'student';
$is_active = 1;

// Insert into users table
$stmt_user = $conn->prepare("INSERT INTO users (phone, email, password_hash, role, is_active, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
$stmt_user->bind_param("ssssi", $phone, $email, $password_hash, $role, $is_active);

if ($stmt_user->execute()) {
    $user_id = $stmt_user->insert_id;
    $stmt_user->close();
    
    // Prepare students table insert with all 26 columns
    $stmt_student = $conn->prepare("
        INSERT INTO students (
            user_id, first_name, last_name, phone, whatsapp_number, address, 
            profile_image, date_of_birth, gender, category, guardian_name, 
            guardian_phone, current_level, learning_goals, school_class_level, 
            school_name, college_course, other_college_course, college_name, 
            occupation, other_occupation, company_name, business_type, 
            other_business_type, years_in_business, status, join_date
        ) VALUES (
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
        )
    ");
    
    if (!$stmt_student) {
        die(json_encode(['success' => false, 'error' => "Prepare failed: " . $conn->error]));
    }
    
    // Set all student parameters (27 total)
    
    $whatsapp_number = $_POST['whatsapp_number'] ?? null;
    $address = $_POST['address'] ?? null;
    $date_of_birth = $_POST['date_of_birth'] ?? null;
    $gender = $_POST['gender'] ?? null;
    $category = $_POST['category'] ?? null;
    $guardian_name = $_POST['guardian_name'] ?? null;
    $guardian_phone = $_POST['guardian_phone'] ?? null;
    $current_level = $_POST['current_level'] ?? null;
    $learning_goals = $_POST['learning_goals'] ?? null;
    $school_class_level = $_POST['school_class_level'] ?? null;
    $school_name = $_POST['school_name'] ?? null;
    $college_course = $_POST['college_course'] ?? null;
    $other_college_course = $_POST['other_college_course'] ?? null;
    $college_name = $_POST['college_name'] ?? null;
    $occupation = $_POST['occupation'] ?? null;
    $other_occupation = $_POST['other_occupation'] ?? null;
    $company_name = $_POST['company_name'] ?? null;
    $business_type = $_POST['business_type'] ?? null;
    $other_business_type = $_POST['other_business_type'] ?? null;
    $years_in_business = $_POST['years_in_business'] ?? null;
    $status = $_POST['status'] ?? 'active';
    $join_date = $_POST['join_date'] ?? date('Y-m-d');
    
    // Bind all 27 parameters (user_id + 26 fields)
    $stmt_student->bind_param(
        "issssssssssssssssssssssssss", 
        $user_id, $first_name, $last_name, $phone, $whatsapp_number, $address, 
        $profile_image, $date_of_birth, $gender, $category, $guardian_name, 
        $guardian_phone, $current_level, $learning_goals, $school_class_level, 
        $school_name, $college_course, $other_college_course, $college_name, 
        $occupation, $other_occupation, $company_name, $business_type, 
        $other_business_type, $years_in_business, $status, $join_date
    );
    
   if ($stmt_student->execute()) {
    header('Location: index.php?msg=registered');
    exit();
} else {
    header('Location: register.php?msg=error');
    exit();
}
    
    $stmt_student->close();
} else {
    echo json_encode([
        'success' => false,
        'error' => 'User registration failed: ' . $stmt_user->error
    ]);
}

$conn->close();
?>