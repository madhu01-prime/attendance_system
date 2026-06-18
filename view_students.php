<?php
include("config.php");

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Student List</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Register No</th>
        <th>Name</th>
        <th>Department</th>
        <th>Year</th>
        <th>Action</th>
    </tr>

<?php
while($row = $result->fetch_assoc())
{
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['reg_no']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['department']; ?></td>
    <td><?php echo $row['year']; ?></td>

    <td>
    <a href="edit_student.php?id=<?php echo $row['id']; ?>">Edit</a>
    |
    <a href="delete_student.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure you want to delete this student?');">
Delete
</a>
</td>
</tr>
<?php
}
?>

</table>

</body>
</html>