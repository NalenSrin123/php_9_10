<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="https://png.pngtree.com/png-clipart/20250105/original/pngtree-user-profile-login-icon-in-silver-color-access-authentication-vector-png-image_19841391.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        
    }
    body{
        background-image: url('https://img.freepik.com/free-photo/horizontal-banner-cosmetic-products-with-cucumber_23-2149446590.jpg?semt=ais_hybrid&w=740');
        background-repeat: no-repeat;
        background-size: cover;
       height: 86vh;
    }
    form{
        width: 450px;
        padding: 30px;
        border-radius: 10px;
        margin: 100px auto;
        background-color: rgba(255, 252, 252, 0.07);
        box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 15px;
    }
    button{
        padding: 7px 20px;
        border: none;
        border-radius: 5px; 
        background-color: rgba(255, 252, 252, 0.07);
        box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 15px;
        color: #000;
    }
    button:hover{
        background-color: rgba(255, 252, 252, 0.42)
    }
</style>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h2 class="text-center">Register</h2>
        <div class="form-group">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="sex" class="form-label">Sex</label>
            <select name="sex" id="sex" class="form-select">
                <option value="0">Male</option>
                <option value="1">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="profile" class="form-label">Profile</label>
            <input type="file" name="profile" id="profile" class="form-control">
        </div>
        <div class="form-group d-flex justify-content-center mt-2">
            <a href="login.php">Already have account?</a>
        </div>
        <div class="form-group d-flex justify-content-center mt-3">
            <button class=" w-100">Register</button>
        </div>
    </form>
</body>
</html>
<?php 
include 'moveFile.php';
include 'connection.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['username'];
    $email=$_POST['email'];
    $sex=$_POST['sex'];
    $password=$_POST['password'];
    if(empty($_FILES['profile']['name'])){
        $insert="INSERT INTO `users`( `username`, `sex`, `email`, `password`,`profile`) 
        VALUES ('$name','$sex','$email','$password','image.png')";
    }else{
        $profile=moveFile('profile');
        $insert="INSERT INTO `users`( `username`, `sex`, `email`, `password`, `profile`) 
        VALUES ('$name','$sex','$email','$password','$profile')";
    }
    global $con;
    $result=$con->query($insert);
    if($result){
        header('location: login.php');
    }
}
?>