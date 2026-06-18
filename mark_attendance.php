<?php
include("config.php");

if(isset($_POST['submit']))
{
    $student_id = $_POST['student_id'];
    $date = $_POST['attendance_date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO attendance(student_id, attendance_date, status)
            VALUES('$student_id', '$date', '$status')";

    if($conn->query($sql))
    {
        echo "Attendance Marked Successfully";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mark Attendance</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Mark Attendance</h2>

<form method="POST">

Student ID:
<input type="number" name="student_id" required><br><br>

Date:
<input type="date" name="attendance_date" required><br><br>

Status:
<select name="status">
    <option value="Present">Present</option>
    <option value="Absent">Absent</option>
</select><br><br>

<input type="submit" name="submit" value="Mark Attendance">

</form>

</body>
</html>