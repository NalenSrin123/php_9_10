<?php 
    include 'connection.php';
    $name=$_POST['name'];
    $sex=$_POST['sex'];
    $position=$_POST['position'];
    $salary=$_POST['salary'];
    $province=$_POST['province'];
    $profile=$_POST['profile'];
    global $connection;
    $insert="INSERT INTO `tbemployees`(`emp_name`, `sex`, `position`, `salary`, `province`, `profile`) 
    VALUES ('$name','$sex','$position','$salary','$province','$profile')";
    $connection->query($insert);
   
    $select_id="SELECT `emp_id` FROM `tbemployees` ORDER BY `emp_id` DESC LIMIT 1";
    $res=$connection->query($select_id);
    $id=$res->fetch_assoc()['emp_id'];
    echo $id;
?>