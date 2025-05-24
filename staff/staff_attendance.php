<?php
// Database connection (update with your actual database details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u329947844_sms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission for marking attendance
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mark_attendance'])) {
    $staff_id = $_POST['staff_id'];
    $attendance_status = $_POST['attendance_status'];
    $attendance_date = date("Y-m-d");

    // SQL to insert attendance record
    $sql = "INSERT INTO staff_attendance (staff_id, attendance_status, attendance_date)
            VALUES ('$staff_id', '$attendance_status', '$attendance_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Attendance marked successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch all staff members (you can replace this with a dynamic list from the database)
$sql = "SELECT id, first_name, last_name FROM staff";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Attendance</title>
</head>
<body>
    <h1>Staff Attendance</h1>

    <!-- Attendance Marking Form -->
    <form action="staff_attendance.php" method="post">
        <label for="staff_id">Select Staff:</label>
        <select name="staff_id" id="staff_id" required>
            <?php
            // Display staff members in dropdown
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['first_name'] . " " . $row['last_name'] . "</option>";
            }
            ?>
        </select>

        <label for="attendance_status">Attendance Status:</label>
        <select name="attendance_status" id="attendance_status" required>
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
            <option value="On Leave">On Leave</option>
        </select>

        <button type="submit" name="mark_attendance">Mark Attendance</button>
    </form>

    <h2>Attendance Records</h2>
    <!-- Displaying Attendance Records -->
    <table border="1">
        <tr>
            <th>Staff Name</th>
            <th>Date</th>
            <th>Attendance Status</th>
        </tr>
        <?php
        // Fetch attendance records
        $attendance_sql = "SELECT sa.attendance_date, sa.attendance_status, s.first_name, s.last_name
                            FROM staff_attendance sa
                            JOIN staff s ON sa.staff_id = s.id
                            ORDER BY sa.attendance_date DESC";
        $attendance_result = $conn->query($attendance_sql);

        while ($row = $attendance_result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
                    <td>" . $row['attendance_date'] . "</td>
                    <td>" . $row['attendance_status'] . "</td>
                  </tr>";
        }
        ?>
    </table>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
