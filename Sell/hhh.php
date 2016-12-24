<Script Language="JavaScript">
setTimeout("location.href='random.php'",20);
</Script>
<?php
require("connect.php");
$price1=rand(1,9)*10;
$price2=rand(1,9)*10;
$price3=rand(1,9)*10;
$price4=rand(1,9)*10;
$price5=rand(1,9)*10;
$price6=rand(1,9)*10;
$price7=rand(1,9)*10;
$price8=rand(1,9)*10;
$sql="update ingredient set price =$price1 where iid='I01' ";
$result=mysqli_query($conn,$sql) or die("fuck1");
$sql="update ingredient set price=$price2 where iid='I02' ";
$result=mysqli_query($conn,$sql) or die("fuck2.");
$sql="update ingredient set price=$price3 where iid='I03' ";
$result=mysqli_query($conn,$sql) or die("fuck3");
$sql="update ingredient set price=$price4 where iid='I04' ";
$result=mysqli_query($conn,$sql) or die("fuck4");
$sql="update ingredient set price=$price5 where iid='I05' ";
$result=mysqli_query($conn,$sql) or die("fuck5");
$sql="update ingredient set price=$price6 where iid='I06' ";
$result=mysqli_query($conn,$sql) or die("fuck5");
$sql="update ingredient set price=$price7 where iid='I07' ";
$result=mysqli_query($conn,$sql) or die("fuck5");
$sql="update ingredient set price=$price8 where iid='I08' ";
$result=mysqli_query($conn,$sql) or die("fuck5");
?>