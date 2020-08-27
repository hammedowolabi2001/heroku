<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studentList</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href= "css/studlist.css">
</head>
<body class= "bg-success">

<?php

require 'connection.php';
$select = "SELECT * FROM students";
$query = mysqli_query($connect, $select);
$count = 1;





?>









    <center>
        <div id="title">
            <span class="modrosaName"> مدرسة خير الأدب للدراسات العربية والإسلامية</span>
        </div>
    </center>
    <center>
        <div id="title">
            <span class="modrosaName"> أسماء الطلاب في بقعتنا الشريفة</span>
        </div>
    </center>


    <!-- <div class="head" id="head">
        <a href="index.html"><span id="home" class="tabs">Home</span></a> 
        <a href="login.php"><span id="students" class="tabs">Students</span></a>
        <a href="staff.php"><span id="staff" class="tabs">Staff</a></span></a>
        <span id="contacts" class="tabs">Contacts</span>
        <span class="tabs">StudentsList</span>
    </div> -->


    <div class="container">
    <table class="table table-striped" id="table">
        <thead style="background-color:green; font-weight:bolder; font-size:25px; color:goldenrod">
            <tr>
                <th scope = "col">S/N</th>
                <th scope = "col">Names</th>
                <th scope = "col">Matric Number</th>
                <th scope = "col">Class</th>
                <th scope = "col">Gender</th>
            </tr>
        </thead>

        <tbody>
            <?php
         
            while($data = mysqli_fetch_assoc($query)){
                $names= $data['names'];
                $matric = $data['matric'];
                $class =$data['class'];
                $gender= $data['gender'];
                echo "<tr>
                        <th scope='row'>".$count++. "</th>
                        <td>$names</td>
                        <td>$matric</td>
                        <td>$class</td>
                        <td>$gender</td>
                     </tr>";
            }
            
            
            
            ?>
        </tbody>

    </table>
    </div>
</body>
</html>