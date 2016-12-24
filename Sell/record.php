<html>
<title>我的cool工廠</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h1><font color = blue>my Purchase History</font></h1>
<button type="button" value="回首頁" onclick="location.href='home1.php'">回首頁<img src="images/09_home.png" width=30 height=30></button>
<button type="button" value="回首頁" onclick="location.href='making_machine.php'">回工廠<img src="images/build.png" width=30 height=30></button>
<?php
require("connect.php");
$sql="select * from user where ID = 'Mary';";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$rs=mysqli_fetch_assoc($result);
print "<h1 align=center>"."<font color = orange >".$rs['ID']."你好"."</font>"."</h1>";
$sql="select * from buy;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
echo "<table width=400 border=1 align=center>";
echo "<tr>";
echo "<td width=100>"."購買時間"."</td>";
echo "<td width=100>"."產品名稱"."</td>";
echo "<td width=100>"."產品數量"."</td>";
echo "<td width=100>"."金額"."</td>";
$sql="select * from buy where UID='Mary';";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
while ( $rs=mysqli_fetch_assoc($result))
{   
	echo "<table width=400 border=1 align=center>";
    echo "<tr>";
    echo "<td width=100>".$rs['time']."</td>";
    echo "<td width=100>".$rs['thing']."</td>";
    echo "<td width=100>".$rs['num']."</td>";
    $sql2="select * from machine where cname='$rs[thing]';";
    $result2=mysqli_query($conn,$sql2) or die("DB Error: Cannot retrieve message.");
    $rs2=mysqli_fetch_assoc($result2);
    if($rs2['price']!=0)
    echo "<td width=100>".$rs2['price']*$rs['num']."</td>";
    else
    {
       $sql2="select * from ingredient where cname='$rs[thing]';";
       $result2=mysqli_query($conn,$sql2) or die("DB Error: Cannot retrieve message.");
       $rs2=mysqli_fetch_assoc($result2);
       echo "<td width=100>".$rs2['price']*$rs['num']."</td>";
    }
} 





?>	
