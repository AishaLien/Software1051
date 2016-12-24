<html>
<title>我的cool工廠</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel=stylesheet type="text/css" href="CSS/detail.css">
</head>
<body>
<div id="de">
<h1><font color = purple>my Develope History</font></h1>
<button type="button" value="回首頁" onclick="location.href='home1.php'">回首頁<img src="images/09_home.png" width=30 height=30></button>
<button type="button" value="回首頁" onclick="location.href='making_machine.php'">回工廠<img src="images/build.png" width=30 height=30></button>
<?php
require("connect.php");
$user = 'Mary';
$sql="select * from user where ID='$user';";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$rs=mysqli_fetch_assoc($result);
print "<h1 align=center>"."<font color = orange >".$rs['ID']."你好"."</font>"."</h1>";
$sql="select * from make where user='$user';";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
echo "<table width=300 border=1 align=center>";
echo "<tr>";
echo "<td width=100>"."製作時間"."</td>";
echo "<td width=100>"."產品名稱"."</td>";
echo "<td width=100>"."產品價格"."</td>";
$sql="select * from make where user='$user';";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
while ( $rs=mysqli_fetch_assoc($result))
{   
	echo "<table width=300 border=1 align=center>";
    echo "<tr>";
    echo "<td width=100>".$rs['time']."</td>";
    echo "<td width=100>".$rs['PID']."</td>";
    $sql2="select * from product where PID='$rs[PID]';";
    $result2=mysqli_query($conn,$sql2) or die("DB Error: Cannot retrieve message.");
    $rs2=mysqli_fetch_assoc($result2);
    echo "<td width=100>".$rs2['price']."</td>";
    echo"</tr>";
} 





?>
</div>
</body>
</html>