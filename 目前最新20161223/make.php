<?php
include 'dbconnect.php';
$id=$_POST["id"];
//紀錄目前要對第i個機器執行
$i=(int)$_POST["num"]+1;
$UID=$_POST["userID"];
date_default_timezone_set('Asia/Taipei');
$datetime= date("Y/m/d H:i:s");
$sql="insert into make(time,user,pid) values ('$datetime','Peter','$id');";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>