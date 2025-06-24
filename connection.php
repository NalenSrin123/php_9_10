<?php 
    try{
        $connection= new mysqli('localhost','root','','db_php_ajax_9_10',3308);
    }catch(Exception $e){
        echo 'Connection fail :'.$e;
    }
?>