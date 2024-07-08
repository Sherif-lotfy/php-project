<?php
require('./connection.php');
    
echo '<a href="./index.php">goback to homePage</a>';
echo"<br>";
echo"<br>";
echo '
    <form method="post">
        <label for="fname">First Name</label>
        <input type="text" name="fname" required/>
        <label for="lname">Last Name</label>
        <input type="text" name="lname" required/>
        <label for="email">Email</label>
        <input type="text" name="email"/>
        <label for="phone">Phone Number</label>
        <input type="number" name="phone" required/>
        <ul>
            <li>
                <label for="COMP202">DataStructur</label>
                <input type="checkbox" name="COMP202"/>
            </li>
            <li>
                <label for="MATH202">ODE</label>
                <input type="checkbox" name="MATH202"/>
            </li>
            <li>
                <label for="COMP208">Automata</label>
                <input type="checkbox" name="COMP208"/>
            </li>
        </ul>
        <input type="submit" value="add student"/>
    </form>
';

if(isset($_POST['fname'])){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    if(isset($_POST["email"])){
        $email = $_POST["email"];
    } else {
        $email = "";
    }
    if(isset($_POST["phone"])){
        $phone = $_POST["phone"];
    } else {
        $phone = "";
    }

    $stat ="insert into student (fname , lname , email , phone) values (\"$fname\" , \"$lname\" , \"$email\" , \"$phone\" );";
    $sql = $connection -> prepare($stat);
    $sql -> execute();

    $stat = "select max(s.StudentId) as max from student s ; ";
            $sql = $connection -> prepare($stat);
            $sql -> execute(); 
            $students = $sql -> get_result();
            $id =0;
            foreach ($students as $st){
                $id = $st['max'];
            }
            $courses = [];
    if(isset($_POST['COMP202'])){
        $courses = array_merge($courses , ['COMP202']);
    }
    if(isset($_POST['MATH202'])){
        $courses = array_merge($courses , ['MATH202']);
    }
    if(isset($_POST['COMP208'])){
        $courses = array_merge($courses , ['COMP208']);
    }
    foreach ($courses as $key) {
        $stat = "insert into student_course (studentId , courseCode ,grade ) values ($id , \"$key\" ,\"0\");";
        $sql = $connection -> prepare($stat);
        $sql -> execute();
    }

}
