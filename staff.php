<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>staffs</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/staff.css">
</head>
<body>


<?php
       require 'connection.php';
       
    error_reporting(E_ALL & ~ E_NOTICE);
// =========================UPLOADING IMAGE============================//

       $uploadOk = 0;
        $target_dir = "imgUploads/";
        $target_file = $target_dir.basename($_FILES['uploadImg']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
       

        if(isset($_POST['uploadbtn'])){
                $verifyImage = getimagesize($_FILES['uploadImg']['tmp_name']);
                if($verifyImage==true){
                    echo 'file is an image';
                    $uploadOk=1;
                }else{
                    $uploadOk=0;
                }



                if($uploadOk==1){
                    if(move_uploaded_file($_FILES['uploadImg']['tmp_name'], $target_file)){
                         echo 'image uploaded successfully';
                    }else{
                        echo 'there was a problem uploading this image. please choose another';
                    }
                 }

                // if(file_exists($target_file)){
                //     echo 'file exist';
                //     $uploadOk=1;
                // }else{
                //     echo 'file doesnt exist';
                //     $uploadOk=0;
                // }


                // if($_FILES['uploadImg']['name'] > 200000000){
                //     echo 'file is too big';
                //     $uploadOk =0;
                // }else{
                //     $uploadOk=1;
                // }

    



} // upload btn terminal







        $errMsg ='';
        $SerrMsg='';
        $regOk = 0;
        $PicErr = '';
       if(isset($_POST['register'])){
           $name = htmlspecialchars($_POST['username']);
           $password = $_POST['password'];
           $class = $_POST['class'];
           $matric = $_POST['matric'];
           $gender = $_POST['gender'];
           $profile = $_POST['profile'];       
           $staff = $_POST['staff'];
           
           
           $selectpsw = "SELECT password FROM students WHERE password = '$password' LIMIT 1";
           $selectPswQuery = mysqli_query($connect, $selectpsw);



           $comfirm = mysqli_num_rows($selectPswQuery);
           if ($comfirm==0){
                $regOk=1;
           }else{
               $regOk=0;
                $errMsg= 'password already exist';
           }


           
           if($staff=='12345'){
                $regOk=1;
            }else{
                $regOk=0;
             $SerrMsg='You are not a staff!!! /n Please get the permission of the modrosa to register student';
            }



            // if(isset($_POST['uploadbtn'])){
            //     $regOk=1;
            // }else{
            //     $regOk=0;
            //     $PicErr = 'Select student\'s image';
            // }




        if($regOk==1){
            $insert = "INSERT INTO students(names, password, matric, gender, class, Images)VALUES ('$name', '$password', '$matric', '$gender', '$class', '$profile')";
            $insertQuery = mysqli_query($connect, $insert);
                if($insertQuery){
                    echo "<script>alert('student registered successfully')</script>";  
                }
        }
           
       }// if isset register terminal


       ?>







<div id="head_bar" class="bg-succes">
        <center>
            <div id="title">
                <span class="name"> مدرسة خير الأدب للدراسات العربية والإسلامية</span>
            </div>
        </center>
        
       <div class="head" id="head">
           <a href="index.html"><span id="home" class="tabs">Home</span></a> 
            <a href="login.php"><span id="students" class="tabs">Students</span></a>
            <a href="staff.php"><span id="staff" class="tabs">Staff</a></span></a>
            <span id="contacts" class="tabs">Contacts</span>
            <a href="stud_list.php"><span class="tabs">StudentsList</span></a>
       </div>
       
       <div class="row" style="margin-left:40px">
       
       <div class="col-xs-5">
       
        <?php
        
         echo "<img src='$target_file' width='100px' height='100px' style='margin-left:40px; margin-top:30px; border-radius:50%;' alt=''>"
         
        ?>
        
        <form action="staff.php" enctype="multipart/form-data" method="post">
        <div><span name= "errMsg" class="errmsg" style="color:red"> Select student's Image</span></div>
        <input type="file" name="uploadImg" id="uploadImg">
        <input type="submit" name="uploadbtn">
        <input type="submit" name="loadbtn" value="load">
        </form>
        
       
       <h2 style="color:goldenrod">New Student's Account</h2>
                <form action="staff.php" class="reg" method="post">
                    <input type="hidden" name = "profile" value = "<?php echo $target_file?>" >
                    <div class="form-group">
                        <label for="password">Staff ID </label>
                        <input type="password" class="form-control" name="staff" id="staff"  required>
                        <span name= "errMsg" class="errmsg" style="color:red"><?php echo "$SerrMsg" ?></span>
                    </div>

                    <div class="form-group">
                        <label for="username"> Student's name </label>
                        <input type="text" class="form-control" name="username" id="username"  required>
                    </div>

                    <div class="form-group">
                        <label for="class"> class </label>
                        <input type="class" class="form-control" name="class" id="class"  required>
                    </div>

                    <div class="form-group">
                        <label for="password">Set Student's Password </label>
                        <input type="password" class="form-control" name="password" id="password"  required>
                        <span name= "errMsg" class="errmsg" style="color:red"><?php echo "$errMsg" ?></span>
                    </div>

                    <div class="form-group">
                        <label for="firstname"> matric number </label>
                        <input type="text" class="form-control" name="matric"  id="year" required>
                    </div>
                   
                    <div class="form-group">
                        <label for="gender"> Gender </label>
                        <select name="gender" id="gender" class="form-control" >
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Register" id="register" name="register">
                        
                    </div>
                    
        
                </form>
       </div>
       </div>
   

</div>

<!-- ==========================FILE UPLOAD=================================== -->
<?php






?>
</body>
</html>