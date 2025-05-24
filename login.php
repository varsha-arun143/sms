<?php
// Include database configuration
include('db_config.php');

// Define variables and initialize with empty values
$phone = $password = "";
$phone_err = $password_err = $login_err = "";

// Process the login form when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate email
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Please enter an phone.";
    } else {
        $phone = trim($_POST["phone"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Check if there are no errors
    if (empty($phone_err) && empty($password_err)) {
        // Prepare a select statement to fetch user details
        $sql = "SELECT user_id, phone, password_hash, role FROM users WHERE phone = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement
            $stmt->bind_param("s", $param_email);

            // Set parameters
            $param_email = $phone;

            // Attempt to execute the statement
            if ($stmt->execute()) {
                $stmt->store_result();

                // Check if email exists in the database
                if ($stmt->num_rows == 1) {
                    // Bind the result to variables
                    $stmt->bind_result($user_id, $phone_db, $hashed_password, $role);

                    if ($stmt->fetch()) {
                        // Verify the password
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["user_id"] = $user_id;
                            $_SESSION["email"] = $phone_db;
                            $_SESSION["role"] = $role;

                            // Redirect based on user role
                            if ($role == 'admin') {
                                
                                header("location: admin/index.php"); // Admin Dashboard
                            } elseif ($role == 'staff') {
                                $sql = "SELECT staff_id FROM staff WHERE user_id = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $user_id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                if ($result->num_rows > 0) {
                                    $staff = $result->fetch_assoc();
                                    $_SESSION['staff_ID'] = $staff['staff_id'];
                                }
                               
                                header("location: staff/index.php"); // Staff Dashboard
                            } elseif ($role == 'student') {
                                $sql = "SELECT student_id FROM students WHERE user_id = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $user_id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                if ($result->num_rows > 0) {
                                    $std = $result->fetch_assoc();
                                    $_SESSION['student_ID'] = $std['student_id'];
                                }
                                header("location: student/index.php"); // Student Dashboard
                            }
                        } else {
                            $login_err = "Invalid password.";
                        }
                    }
                } else {
                    $login_err = "No account found with that email.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close the statement
            $stmt->close();
        }
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <p>Please enter your credentials to log in.</p>
    
    <!-- Display login error -->
    <?php if (!empty($login_err)): ?>
        <div style="color: red;"><?php echo $login_err; ?></div>
    <?php endif; ?>
    <?php
if (isset($_GET['message'])) {
    echo "<div style='color: green; font-weight: bold; margin-bottom: 10px;'>" . htmlspecialchars($_GET['message']) . "</div>";
}
?>

    <form action="" method="post">
        <div>
            <label>Phone</label>
            <input type="tel" name="phone" value="<?php echo $phone; ?>">
            <span style="color: red;"><?php echo $phone_err; ?></span>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" value="<?php echo $password; ?>">
            <span style="color: red;"><?php echo $password_err; ?></span>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a>.</p>
</body>
</html>
