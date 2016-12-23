<html>
<title>我的cool工廠</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h1><font color = purple>my Develope History</font></h1>
<button type="button" value="回首頁" onclick="location.href='home.php'">回首頁<img src="09_home.png" width=30 height=30></button>
<button type="button" value="回首頁" onclick="location.href='factory.php'">回工廠<img src="build.png" width=30 height=30></button>
<?php
require("dbconnect.php");
$sql="select * from user;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$rs=mysqli_fetch_assoc($result);
print "<h1 align=center>"."<font color = orange >".$rs['name']."你好"."</font>"."</h1>";
$sql="select * from make;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
echo "<table width=300 border=1 align=center>";
echo "<tr>";
echo "<td width=100>"."購買時間"."</td>";
echo "<td width=100>"."產品名稱"."</td>";
echo "<td width=100>"."產品價格"."</td>";
$sql="select * from make where user='Peter';";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
while ( $rs=mysqli_fetch_assoc($result))
{   
	echo "<table width=300 border=1 align=center>";
    echo "<tr>";
    echo "<td width=100>".$rs['time']."</td>";
    echo "<td width=100>".$rs['pid']."</td>";
    $sql2="select * from product where cname='$rs[pid]';";
    $result2=mysqli_query($conn,$sql2) or die("DB Error: Cannot retrieve message.");
    $rs2=mysqli_fetch_assoc($result2);
    echo "<td width=100>".$rs2['price']."</td>";
} 





?>