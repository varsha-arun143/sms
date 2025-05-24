<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuran School Management System</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your external CSS for styling -->
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 36px;
            color: #004aac;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            background-color: #004aac;
            color: #fff;
            font-size: 18px;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #003580;
        }

        .footer {
            margin-top: 20px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php if (isset($_GET['msg']) && $_GET['msg'] === 'registered'): ?>
    <div class="alert alert-success">Student registered successfully!</div>
<?php endif; ?>

        <h1 class="title">Kuran School Management System</h1>

        <!-- Login and Register Buttons -->
        <div>
            <a href="login.php" class="btn">Login</a>
            <a href="register.php" class="btn">Register</a>
            <a href="staff_register.php" class="btn">Staff Register</a>

        </div>

        <!-- Optional Footer -->
        <div class="footer">
            <p>© 2025 Kuran School. All rights reserved.</p>
        </div>
    </div>

    

</body>
</html>
