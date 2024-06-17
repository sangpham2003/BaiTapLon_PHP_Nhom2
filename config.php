<?php
    $db='db_x';
    $host='localhost';
    $username='root';
    $password='';
    $conn=mysqli_connect($host,$username,$password,$db);
    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }
    else{
        echo "Connected successfully";
    }
?>