<?php
session_start();
include 'db_config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnHub - Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/app.js" defer></script>
</head>
<body>

<div class="login-container">
    <h2>Learn<span>Hub</span></h2>
    <h3>Login to Your Account</h3>

    <form action="" method="POST">
        <input type="email" name="email" id="email" placeholder="Enter Email" required>

        <input type="password" name="password" id="password" placeholder="Enter Password" required>

        <p id="error" class="error"></p>

        <button type="submit" name="login" class="btn">Login</button>
        <!-- <input type="button" value="sumbit" name="login"> -->
    </form>

    <?php
    if (isset($_POST['login'])) {
        extract($_POST);
        $password = sha1($password);

        // $result = $conn->query("SELECT * FROM users WHERE email = '$email' AND password = '$password' AND role = '$role'");
        $result = $conn->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

        $row = $result->fetch_assoc();

        if ($result->num_rows > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];

            if ($row['role'] == 'admin') {
                $_SESSION['url'] = 'admin_dashboard.php';
                header("Location: admin/admin-dashboard.php");
                exit;
            } else if ($row['role'] == 'instructor') {
                $_SESSION['url'] = 'instructor_dashboard.php';
                header("Location: admin/instructor-dashboard.php");
                exit;
            } else if ($row['role'] == 'student') {
                $_SESSION['url'] = 'student_dashboard.php';
                header("Location: admin/student-dashboard.php");
                exit;
            }
        } else {
            echo '
            <div class="alert border-0 bg-danger-subtle alert-dismissible fade show">
                <div class="d-flex align-items-center">
                    <div class="text-danger">Problem Login</div>
                </div>
            </div>
            ';
        }
    }
    ?>

    <a href="index.html">Back to Home</a>
</div>

</body>
</html>
