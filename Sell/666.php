<Script Language="JavaScript">
setTimeout("location.href='random.php'",20);
</Script>
<?php
require("connect.php");
$price1=rand(1,9)*100;
$price2=rand(1,9)*100;
$price3=rand(1,9)*100;
$price4=rand(1,9)*100;
$price5=rand(1,9)*100;
$sql="update product set price =$price1 where PID='P01' ";
$result=mysqli_query($conn,$sql) or die("fuck1");
$sql="update product set price=$price2 where PID='P02' ";
$result=mysqli_query($conn,$sql) or die("fuck2.");
$sql="update product set price=$price3 where PID='P03' ";
$result=mysqli_query($conn,$sql) or die("fuck3");
$sql="update product set price=$price4 where PID='P04' ";
$result=mysqli_query($conn,$sql) or die("fuck4");
$sql="update product set price=$price5 where PID='P05' ";
$result=mysqli_query($conn,$sql) or die("fuck5");

?>