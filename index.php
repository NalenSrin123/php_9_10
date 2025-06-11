<?php
session_start(); 
if(empty($_SESSION['login'])){
    header('Location: login.php');
}
include 'connection.php';
global $con;
        $email=$_SESSION['login'];
        $get_user_id="SELECT `user_id` FROM `users` WHERE `email`='$email'";
        $res=$con->query($get_user_id);
        $user_id=$res->fetch_assoc()['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="https://png.pngtree.com/png-vector/20220708/ourmid/pngtree-skin-care-logo-png-image_5774040.png">
</head>
<body>
    <div class="container mt-5 shadow-lg p-3 rounded">
        <h3>Skin Care Stocks</h3>
        <button class="btn btn-primary  rounded-pill py-2 float-end" id="btnAdd" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-circle me-1" ></i>Add Skin Care</button>
        <table class="table text-center align-middle mt-5" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>User</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    global $con;
                   
                    $select="SELECT * , `profile` FROM `skincare` INNER JOIN `users` ON `userID`=`user_id`";
                    $result=$con->query($select);
                    while($row=$result->fetch_assoc()){
                        echo '
                            <tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['price'].'$</td>
                                <td>'.$row['stock'].'</td>
                                <td><img width="80" src="./uploads/'.$row['image'].'" alt=""></td>
                                <td><img width="80" src="./uploads/'.$row['profile'].'" alt=""></td>
                                <td>
                                    <button class="btn btn-warning me-1" id="btnEdit">Edit</button>
                                    <button class="btn btn-danger ">Delete</button>
                                </td>
                            </tr>
                        ';
                    }
                ?>
                
            </tbody>
        </table>
        <a href="logout.php">Logout</a>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" min="1" name="stock" id="stock" class="form-control">
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control">
            </div>
            <div class="form-group">
                <label for="expire" class="form-label">Expire</label>
                <input type="date" name="expire" id="expire" class="form-control">
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group mt-3 d-flex justify-content-end">
                <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal">Cancel</button>
                <input type="submit" value="Save" id="save" name="btn"  class="btn btn-primary">
                <input type="submit" value="Edit" id="edit" name="btn"  class="btn btn-success">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#btnAdd').click(function(){
            $('#exampleModalLabel').html('Add Skin Care');
            $('#save').show();
            $('#edit').hide();
        });
        $(document).on('click','#btnEdit',function(){
            $('#exampleModalLabel').html('Edit Skin Care');
            $('#save').hide();
            $('#edit').show();
        });
        
    });
</script>
<?php 
    include 'moveFile.php';
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name=$_POST['name'];
        $stock=$_POST['stock'];
        $price=$_POST['price'];
        $expire=$_POST['expire'];
        $image=moveFile('image');
        global $con;
        global $user_id;
        $btn=$_POST['btn'];
        if($btn=="Save"){
            $insert="INSERT INTO `skincare`(`name`, `price`, `stock`, `image`, `userID`, `expire`) 
            VALUES ('$name','$price','$stock','$image','$user_id','$expire')";
            $res=$con->query($insert);
            header('location: index.php');
        }
    }
    
?>
