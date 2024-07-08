<?php

if(isset($_GET['id'])){
    
    require('./connection.php');
    $id = $_GET['id'];
    $stat = "select * from student where studentId = $id ;";
    $sql = $connection -> prepare($stat);
    $sql -> execute();
    $result = $sql -> get_result();
    foreach($result as $student){
        echo 'Name :'.$student['fname']." ".$student['lname'];
        echo "<br>";
        echo "<br>";
        echo 'Email : '.$student['email'];
        echo "<br>";
        echo "<br>";
        echo 'Phone : '.$student['phone']; 
        echo "<br>";
        echo "<br>";
    }

    $stat = "select c.title as title, sc.grade as grade from student_course sc , courses c where sc.courseCode = c.courseCode and studentId = $id ;";
    $sql = $connection -> prepare($stat);
    $sql -> execute();
    $result = $sql -> get_result();
    echo "
    <style>
        td ,th  {
            text-align:center;
            border:2px solid;
            padding:3px
        }
    </style>
    <table>
        <tr>
            <th>title</th>
            <th>grade</th>
        </tr>";
    foreach($result as $course){
            echo "
                <tr> 
                    <td>".$course['title']."</td>
                    <td>".$course['grade']."</td>
                </tr>";
    }
    echo"</table>";

    
    
    
}