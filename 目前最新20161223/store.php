<html>
<title>我的cool工廠</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h1><font color = green>store</font></h1>
<button type="button" value="回首頁" onclick="location.href='home.php'">回首頁<img src="09_home.png" width=30 height=30></button>
<button type="button" value="回首頁" onclick="location.href='factory.php'">回工廠<img src="build.png" width=30 height=30></button>
<?php
//echo "<font color = red>機器</font>";
require("dbconnect.php");
echo"<form name=info method=post action=fac.php>";
$r=-4;
$sql = "select * from machine ;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
echo "<table width=300 border=1 align=center>";
    echo "<tr>"; 
		
  echo "<td width=75>" ."設備名稱"."</td>";
  echo "<td width=75>" . "價格". "</td>";
  echo "<td width=75>" . "生產時間" . "</td>";
  echo "<td>" . "選擇數量" . "</td>";
while ( $rs=mysqli_fetch_assoc($result)) {
	echo "<table width=300 border=1 align=center>";
    echo "<tr>";
	$t=$r.".jpg";	
  echo "<td width=75>" .$rs['cname']."<img src=$t width=60 height=40>"."</td>";
  echo "<td width=75>" . $rs['price']. "</td>";
  echo "<td width=75>" . $rs['time'] ."分鐘". "</td>";
  echo "<td>";
 echo "<select name=$rs[cname]>";
 //echo "<option value=0 selected=True>0</option>";
 $r++;
  for($i=0;$i<10;$i++)
  {
  	echo "<option value=$i >$i</option>";
 }
 echo "</select><br/>";
echo "</td>";
}


















//echo "<font color = red>原料</font>";
require("dbconnect.php");
echo"<form name=info method=post action=fac.php>";
$r=0;
$sql = "select * from ingredient ;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
echo "<table width=300 border=1 align=center>";
    echo "<tr>";
    
  echo "<td width=100>" ."原料名稱"."</td>";
  echo "<td width=100>" . "價格". "</td>";
  echo "<td>" . "選擇數量" . "</td>";
  echo "<br>";
while ( $rs=mysqli_fetch_assoc($result)) {
  echo "<table width=300 border=1 align=center>";
    echo "<tr>";
  $t=$r.".jpg";   
  echo "<td width=100>" .$rs['cname']."<img src=$t width=60 height=40>"."</td>";
  echo "<td width=100>" . $rs['price']. "</td>";
  echo "<td>";
 echo "<select name=$rs[cname]>";
 $r++;
  for($i=0;$i<10;$i++)
  {
    echo "<option value=$i >$i</option>";
 }
 echo "</select><br/>";
echo "</td>";
echo "<input type=submit value=購買  style=width:120px;height:40px;font-size:20px;top:600px;left:800px;position:absolute;></form>";
}


?>


</body>
</html>