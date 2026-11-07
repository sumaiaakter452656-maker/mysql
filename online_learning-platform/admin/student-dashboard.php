
<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] != 'student') {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="dashboard-container">

    <aside class="sidebar">
        <h2>Learn<span>Hub</span></h2>

        <ul>
            <li><a href="student-dashboard.php">Dashboard</a></li>
            <li><a href="#">Browse Courses</a></li>
            <li><a href="#">My Wishlist</a></li>
            <li><a href="#">My Enrollments</a></li>
            <li><a href="#">Lessons</a></li>
            <li><a href="#">My Quizzes & Results</a></li>
            <li><a href="#">Live Classes</a></li>
            <li><a href="#">Payment History</a></li>
            <li><a href="#">Certificates</a></li>
            <li><a href="#">My Reviews</a></li>
            <li><a href="#">My Profile</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <h2>Student Dashboard</h2>
        <p>Welcome, <?php echo $_SESSION['name']; ?></p>

        <div class="dashboard-cards">
            <div class="card">
                <h3>My Courses</h3>
                <p>View Enrolled Courses</p>
            </div>

            <div class="card">
                <h3>My Lessons</h3>
                <p>Continue Learning</p>
            </div>

            <div class="card">
                <h3>My Results</h3>
                <p>View Quiz Results</p>
            </div>

            <div class="card">
                <h3>Certificates</h3>
                <p>View Certificates</p>
            </div>
        </div>
    </main>

</div>

</body>
</html>
