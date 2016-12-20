<?php 
    //資料庫主機設定
    $db_host = "localhost";
    $db_username = "sell";
    $db_password = "test";
    $db_name = "sell";
    //連線伺服器
    $conn = @mysqli_connect($db_host, $db_username, $db_password, $db_name) or die('Error with MySQL connection');
    //設定字元集與連線校對
    mysqli_set_charset($conn, 'utf8');
?>