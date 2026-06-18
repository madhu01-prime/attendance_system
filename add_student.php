<?php
include("config.php");

if(isset($_POST['submit']))
{
    $reg_no = $_POST['reg_no'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $year = $_POST['year'];

    $sql = "INSERT INTO students(reg_no,name,department,year)
            VALUES('$reg_no','$name','$department','$year')";

    if($conn->query($sql))
    {
        echo "Student Added Successfully";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2>Add Student</h2>

<form method="POST">

    Register No:
    <input type="text" name="reg_no"><br><br>

    Name:
    <input type="text" name="name"><br><br>

    Department:
    <input type="text" name="department"><br><br>

    Year:
    <input type="text" name="year"><br><br>

    <input type="submit" name="submit" value="Add Student">

</form>

</body>
</html>