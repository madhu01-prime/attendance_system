<?php
include("session_check.php");
include("config.php");

$total_students = $conn->query("SELECT COUNT(*) as total FROM students");
$total_students = $total_students->fetch_assoc()['total'];

$today = date("Y-m-d");

$present_today = $conn->query("
SELECT COUNT(*) as total
FROM attendance
WHERE attendance_date='$today'
AND status='Present'
");
$present_today = $present_today->fetch_assoc()['total'];

$absent_today = $conn->query("
SELECT COUNT(*) as total
FROM attendance
WHERE attendance_date='$today'
AND status='Absent'
");
$absent_today = $absent_today->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Attendance Management System</h1>

<hr>

<div class="card-container">

    <div class="card">
        <h2><?php echo $total_students; ?></h2>
        <p>Total Students</p>
    </div>

    <div class="card">
        <h2><?php echo $present_today; ?></h2>
        <p>Present Today</p>
    </div>

    <div class="card">
        <h2><?php echo $absent_today; ?></h2>
        <p>Absent Today</p>
    </div>

</div>

<br>

<a href="add_student.php">➕ Add Student</a><br><br>

<a href="view_students.php">📋 View Students</a><br><br>

<a href="mark_attendance.php">✅ Mark Attendance</a><br><br>

<a href="attendance_report.php">📊 Attendance Report</a><br><br>

<a href="attendance_percentage.php">📈 Attendance Percentage</a><br><br>

<a href="logout.php">🚪 Logout</a>

</body>
</html>