<?php
include("config.php");

$sql = "SELECT students.name,
               students.reg_no,
               attendance.attendance_date,
               attendance.status
        FROM attendance
        JOIN students
        ON attendance.student_id = students.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Attendance Report</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Register No</th>
    <th>Name</th>
    <th>Date</th>
    <th>Status</th>
</tr>

<?php
while($row = $result->fetch_assoc())
{
?>
<tr>
    <td><?php echo $row['reg_no']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['attendance_date']; ?></td>
    <td><?php echo $row['status']; ?></td>
</tr>
<?php
}
?>

</table>

</body>
</html>