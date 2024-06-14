<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'db_xemphim';

    $conn = new mysqLi($server, $user, $pass, $database);

    if($conn) 
    {
        mysqLi_query($conn, "SET NAME 'utf8' ");
    }
    else 
    {
        'Kết nối thất bại';
    }
?>