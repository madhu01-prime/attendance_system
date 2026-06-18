<?php
include("config.php");

$id = $_GET['id'];

if(isset($_POST['update']))
{
    $reg_no = $_POST['reg_no'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $year = $_POST['year'];

    $sql = "UPDATE students
            SET reg_no='$reg_no',
                name='$name',
                department='$department',
                year='$year'
            WHERE id=$id";

    if($conn->query($sql))
    {
        echo "Student Updated Successfully";
    }
}

$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="POST">

Register No:
<input type="text" name="reg_no" value="<?php echo $row['reg_no']; ?>"><br><br>

Name:
<input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>

Department:
<input type="text" name="department" value="<?php echo $row['department']; ?>"><br><br>

Year:
<input type="text" name="year" value="<?php echo $row['year']; ?>"><br><br>

<input type="submit" name="update" value="Update Student">

</form>

</body>
</html>