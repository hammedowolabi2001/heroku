<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
  
    <style>
     
    </style>
</head>
<body>


    <?php
    error_reporting(E_ALL &~ E_NOTICE);
    require 'connection.php';
    if(isset($_POST['login'])){
        $errMsg = '';
        $matric = $_POST['username'];
        $password = $_POST['password'];

        $select = "SELECT * FROM students WHERE matric = '$matric' AND password = '$password'";
        $query = mysqli_query($connect, $select);

        //  if(mysqli_num_rows($query)){
        //     header('location:profile_page.php');
        // }else{
        //     $errMsg= 'oops!! invalid login detail';
        // }
    }
    ?>
    <div id="head_bar" class="bg-success">
        <center>
            <div id="title">
                <span class="name"> مدرسة خير الأدب للدراسات العربية والإسلامية</span>
            </div>
        </center>
        
       <div class="head" id="head">
            <a href="index.html"><span id="home" class="tabs">Home</a></span</a>
            <a href="login.php"><span id="students" class="tabs">Students</a></span></a>
            <a href="staff.php"><span id="staff" class="tabs">Staff</a></span></a>
            <span id="contacts" class="tabs">Contacts</a></span>
            <span class="tabs">FAQS</span>
       
       </div>
       
    </div>
    <div id="boxe" class="text-center align-middle">
        <center><h2 style="color:white">Students Login</h2></center>
        <form action="profile_page.php" method="post">
            <div class="form-group">
                    <input type="text" placeholder="matric number" name="username" id="username" class="forms" >
            </div>
            

            <div class="form-group">
                <input type="password" placeholder="password" name="password" class="forms"   id="password">
            </div>

            <div class="form-group">
                <input type="checkbox" name="check" class="pull-left" id="" >
                
                <input type="submit" value="submit" name="login" class="btn btn-success pull-right" id="submit" width="90px" ><br><span class="remember pull-left" style="color: white;">remember me</span>
                
            </div>
            <span style="color:red"><?php echo $errMsg ?></span>
        </form>
        

    </div>
</body>
</html>
<script> 
    // document.getElementById('submit').addEventListener('click',()=>{
    //     alert('Hu')
    // })
    //  let role = 
    // exit(json_encode(array('status'=>1, 'teacher'=>header('location:teacher.php', 'student'=>header('location:student.php')))))

    // if(resp.status===1){
    //     if(role === 'teacher'){
    //         resp.teacher
    //     }
    // }else{
        
    // }
</script>