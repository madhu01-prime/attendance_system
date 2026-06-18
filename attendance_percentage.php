<?php
include("config.php");

$sql = "
SELECT
    students.name,
    students.reg_no,
    COUNT(attendance.id) AS total_days,
    SUM(CASE WHEN attendance.status='Present' THEN 1 ELSE 0 END) AS present_days
FROM students
LEFT JOIN attendance
ON students.id = attendance.student_id
GROUP BY students.id
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance Percentage</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Attendance Percentage Report</h2>

<table border="1">
<tr>
    <th>Register No</th>
    <th>Name</th>
    <th>Present Days</th>
    <th>Total Days</th>
    <th>Percentage</th>
</tr>

<?php
while($row = $result->fetch_assoc())
{
    $total = $row['total_days'];

    if($total > 0)
    {
        $percentage = ($row['present_days'] / $total) * 100;
    }
    else
    {
        $percentage = 0;
    }
?>

<tr>
    <td><?php echo $row['reg_no']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['present_days']; ?></td>
    <td><?php echo $row['total_days']; ?></td>
    <td><?php echo round($percentage,2); ?>%</td>
</tr>

<?php
}
?>

</table>

</body>
</html>