<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>擁有產品</title>
<link rel=stylesheet type="text/css" href="CSS/pro.css">
</head>
<body>
<div id = "pro">
<?php
require("connect.php");
$sql="select * from userlist;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
//echo "<table width=300 border=1 >";
echo "<table width=300 border=1 >";
echo "<td width=150>"."原料名稱"."</td>";
echo "<td width=150>"."擁有數量"."</td>";
while ( $rs=mysqli_fetch_assoc($result))
{   
   $sql2="select * from product ;";
   $result2=mysqli_query($conn,$sql2) or die("DB Error: Cannot retrieve message.");
   while($rs2=mysqli_fetch_assoc($result2))
   {
   	   if($rs2['PID']==$rs['have'])
      {   
      	echo "<table width=300 border=1 >";
    	echo "<td width=150>".'<font color=green>'.$rs2['cname']."</td>"."</font>";
    	echo "<td width=150>".'<font color=red>'.$rs['much']."</font>"."</td>" ;
        //echo "</br>";
      }
   }
}
echo "<table width=80 border=1 >";
echo "<td><a href=home1.php>回首頁</a></td>" ;   	
?>

</div>
</body>
</html>
