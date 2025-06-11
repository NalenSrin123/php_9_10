<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        background-image: url('https://png.pngtree.com/thumb_back/fw800/back_our/20190621/ourmid/pngtree-simple-skin-care-cosmetics-promotion-image_175553.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        height: 86vh;
    }
    form{
        width: 400px;
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
    <form action="" method="post">
        <h2 class="text-center">Login</h2>
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group d-flex justify-content-center mt-2">
            <a href="register.php">Create an account?</a>
        </div>
        <div class="form-group d-flex justify-content-center mt-3">
            <button class=" w-100">Login</button>
        </div>
    </form>
</body>
</html>
<?php 
    include 'connection.php';
    session_start();
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $select="SELECT `email`, `password` FROM `users` WHERE `email`='$email' AND `password`='$password'";
        global $con;
        $result=$con->query($select);
        if($result->num_rows<=0){
            echo '
                <div id="myAlert" class="alert alert-danger alert-dismissible fade show " role="alert" style="position:absolute; top:30px; right:40%;">
                    Incorrect email or password!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            ';
        }else{
            $_SESSION['login']=$email;
            header('location: index.php');
        }
    }
?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
      const alert = bootstrap.Alert.getOrCreateInstance(document.getElementById('myAlert'));
      alert.close();
    }, 5000); 
  });
</script>
