<?php 
require "connect.php";
$i=(int)$_POST["MID"]+1;
session_start();
$user = $_SESSION['userID'];
$sql="select busy from status where Unum = $i";
$res=mysqli_query($conn,$sql) or die("db error");
$rs=mysqli_fetch_assoc($res);
if(strcmp($rs['busy'],"0")==0){
    echo "0";
}
else{
    // 先找到哪個商品 計入商品名稱
    $sql = "select PID from status where Unum = $i";
    $res=mysqli_query($conn,$sql) or die("db error");
    $rs=mysqli_fetch_assoc($res);
    $product = $rs['PID'];
    // 剩下多少等等使用來做運算
    $sql = "select money from user where ID = '$user'";
    $res=mysqli_query($conn,$sql) or die("db error");
    $rs=mysqli_fetch_assoc($res);
    $money = (int)$rs['money']  ;
    // 剩下多少等等使用來做運算
    $sql = "select price from product where PID = '$product'";
    $res=mysqli_query($conn,$sql) or die("db error");
    $rs=mysqli_fetch_assoc($res);
    $add = (int)$rs['price']  ;
    $money = $money+$add;
    // 更新擁有商品個數
    $sql = "update user set money=$money where ID = '$user'";
    $res=mysqli_query($conn,$sql) or die("db error");
    $sql = "update status set busy = 0 where Unum = $i  and UID = '$user'";
    $res=mysqli_query($conn,$sql) or die("db error");
    $sql = "select time from status where Unum = $i  and UID = '$user'";
    $res=mysqli_query($conn,$sql) or die("db error");
    $rs=mysqli_fetch_assoc($res);
    $time= $rs['time'];
    $sql = "insert into make(time,PID,user) values('$time','$product','$user')";
    $res=mysqli_query($conn,$sql) or die("db error");
    echo $product;
}


?>
