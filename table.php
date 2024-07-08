<!DOCTYPE html>
<html lang="en">
<head>
    <title>index</title>
</head>
<body>
    <table>
    <tr>
        <th>id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Course</th>
        <th>Link</th>
    </tr>
    <?php
    require_once './connection.php';

    $stat = "select studentId as id , FName as fn , LName as ln , email , phone from student";
    $sql = $connection -> prepare($stat);
    $sql -> execute();
    $students = $sql -> get_result();

    foreach ($students as $s){
        echo"
        <tr>
        <td>".$s['id']."</td>
        <td>".$s['fn']."</td>
        <td>".$s['ln']."</td>
        <td>".$s['email']."</td>
        <td>".$s['phone']."</td>
        <td><a href=\"./student-data.php?id=".$s['id']."\">about...</a></td>
        </tr>";
    }
    ?>
    </table>
    <!-- <a href="add_student.php">Register New Student</a> -->
</body>
</html>