<?php 
    date_default_timezone_set('Asia/Phnom_Penh');
    $profile=date('y-m-d_h-i-s').'_'.$_FILES['profile']['name'];
    $tmp_name=$_FILES['profile']['tmp_name'];
    $path='./upload/'.$profile;
    move_uploaded_file($tmp_name,$path);
    echo $profile;

?>