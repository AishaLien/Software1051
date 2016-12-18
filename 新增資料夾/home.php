<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type = "text/css">
th {
color:blue;
font-family:標楷體;
font-size:24pt;
padding:10px;
}
td {
font-size:16pt;
}
#menu{
	position:absolute;
	left:600px;
}
#menu li {
	margin:20px auto;
	text-decoration:none;
	display:block;
	border:7px solid #00DD77;
	border-radius:5px 5px 5px 5px;/*圓角:左上 右上 右下 左下*/
	padding:24px;
	width:200px;
	font-size:16pt;
	position:relative;
}
</style>
<title>首頁</title>
</head>
<body>

 <div id="menu">
	<ul>
		<li><a href="ingredient2.php">材料庫存</a></li>
		<li><a href="product.php">擁有產品</a></li>
		<li><a href="store.php">商城</a></li>
	</ul>

</div>
<?php	
require("dbconnect.php");
$sql = "select * from user where name='Peter';";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$rs=mysqli_fetch_assoc($result);
echo "<table border = 10 width = 300>
<tr>
	<td rowspan = 10><img src = boy.gif  title = $rs[name] width = 150 height = 150 /></td>
	<td></td>
</tr>
<tr>
	<td>$:$rs[money] NT</td>
</tr>
</table>
<br/>";
?>
<form name="info" method="post" action="factory.php">
<table border = "5" width = "100">
<tr>
	<th rowspan = "5">工廠</th>
	<td rowspan = "5"><input type = "submit" value = "詳細資訊"/></form>
</tr>
<tr>
	<td><img src = "-4.jpg" alt = "machine 1" title = "machine 2" width = "100" height = "100" /></td>
	<td>machine2</td>
	
</tr>
<tr>
	<td><img src = "-3.jpg" alt = "machine 2" title = "machine 3" width = "100" height = "100" /></td>
	<td>machine3</td>

</tr>
<tr>
	<td><img src = "-2.jpg" alt = "machine 3" title = "machine 4" width = "100" height = "100" /></td>
	<td>machine4</td>
	
</tr>
<tr>
	<td><img src = "-1.jpg" alt = "machine 4" title = "machine 5" width = "100" height = "100" /></td>
	<td>machine5</td>
	</tr>
</table> 
</body>
</html>