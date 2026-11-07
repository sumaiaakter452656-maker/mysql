
<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] != 'instructor') {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instructor Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dashboard-container">

    <aside class="sidebar">
        <h2>Learn<span>Hub</span></h2>

        <ul>
            <li><a href="instructor-dashboard.php">Dashboard</a></li>
            <li><a href="#">My Courses</a></li>
            <li><a href="#">Course Sections</a></li>
            <li><a href="#">Lessons</a></li>
            <li><a href="#">Enrolled Students</a></li>
            <li><a href="#">Quizzes & Questions</a></li>
            <li><a href="#">Live Classes</a></li>
            <li><a href="#">Course Reviews</a></li>
            <li><a href="#">My Profile</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <h2>Instructor Dashboard</h2>
        <p>Welcome, <?php echo $_SESSION['name']; ?></p>

        <div class="dashboard-cards">
            <div class="card">
                <h3>My Courses</h3>
                <p>Manage Your Courses</p>
            </div>

            <div class="card">
                <h3>Students</h3>
                <p>View Enrolled Students</p>
            </div>

            <div class="card">
                <h3>Lessons</h3>
                <p>Manage Lessons</p>
            </div>

            <div class="card">
                <h3>Reviews</h3>
                <p>View Course Reviews</p>
            </div>
        </div>
    </main>

</div>

</body>
</html>
