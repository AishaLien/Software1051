<html>
<title>我的cool工廠</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h1><font color = green>store</font></h1>
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
  echo "<td width=75>" .$rs['name']."<img src=$t width=60 height=40>"."</td>";
  echo "<td width=75>" . $rs['price']. "</td>";
  echo "<td width=75>" . $rs['time'] ."分鐘". "</td>";
  echo "<td>";
 echo "<select name=$rs[name]>";
 echo "<option value=0 selected=True>0</option>";
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
    
  echo "<td width=100>" .$rs['name']."</td>";
  echo "<td width=100>" . $rs['price']. "</td>";
  echo "<td>";
 echo "<select name=$rs[name]>";
 echo "<option value=0 selected=True>0</option>";
  for($i=1;$i<10;$i++)
  {
    echo "<option value=$i >$i</option>";
 }
 echo "</select><br/>";
echo "</td>";
}
echo "<input type=submit value=購買 align=right></form>";

?>

<a href="factory.php">回工廠</a>
<a href="home.php">回首頁</a>
</body>
</html>