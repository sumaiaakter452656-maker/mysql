
<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dashboard-container">

    <aside class="sidebar">
        <h2>Learn<span>Hub</span></h2>

        <ul>
            <li><a href="admin-dashboard.php">Dashboard</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Categories</a></li>
            <li><a href="#">Courses</a></li>
            <li><a href="#">Sections & Lessons</a></li>
            <li><a href="#">Enrollments</a></li>
            <li><a href="#">Payments</a></li>
            <li><a href="#">Quizzes & Questions</a></li>
            <li><a href="#">Live Classes</a></li>
            <li><a href="#">Course Reviews</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <h2>Admin Dashboard</h2>
        <p>Welcome, <?php echo $_SESSION['name']; ?></p>

        <div class="dashboard-cards">
            <div class="card">
                <h3>Total Users</h3>
                <p>Manage Users</p>
            </div>

            <div class="card">
                <h3>Total Courses</h3>
                <p>Manage Courses</p>
            </div>

            <div class="card">
                <h3>Total Enrollments</h3>
                <p>Manage Enrollments</p>
            </div>

            <div class="card">
                <h3>Total Payments</h3>
                <p>Manage Payments</p>
            </div>
        </div>
    </main>

</div>

</body>
</html>
