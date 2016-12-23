<!DOCTYPE html>
<?php
session_start();
require("connect.php");
$user = $_SESSION['userID'];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel=stylesheet type="text/css" href="CSS/home1.css">
</style>
<title>首頁</title>
</head>
<body>
<div id = "form">
<h1 id="title">工廠首頁</h1>
 <div id="menu">
	<ul>
		<li><a href="ingredient2.php">材料庫存</a></li>
		<li><a href="product.php">擁有產品</a></li>
		<li><a href="store.php">商城</a></li>
	</ul>

</div>
<?php	
$sql = "select * from user where ID='$user'";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$rs=mysqli_fetch_assoc($result);
echo "<table border = 10 width = 300>
<tr>
	<td rowspan = 10><img src = images\boy.gif  title = $rs[ID] width = 150 height = 150 /></td>
	<td></td>
</tr>
<tr>
	<td>$:$rs[money] NT</td>
</tr>
</table>
<br/>
";
?>
<form name="info" method="post" action="making_machine.php">
<table border = "5" width = "100">
<tr>
	<th rowspan = "5">工廠</th>
	<td rowspan = "5">
    <?php
        echo "<input type=\"hidden\" name=\"user\" value=\"$user\">";
    ?>
    <input type = "submit" value = "詳細資訊"/>
    </form>
</tr>
<tr>
	<td><img src = "images\M.gif" alt = "machine 1" title = "machine 2" width = "100" height = "100" /></td>
	<td>machine01</td>
	
</tr>
<tr>
	<td><img src = "images\M.gif" alt = "machine 2" title = "machine 3" width = "100" height = "100" /></td>
	<td>machine02</td>

</tr>
<tr>
	<td><img src = "images\M.gif" alt = "machine 3" title = "machine 4" width = "100" height = "100" /></td>
	<td>machine03</td>
	
</tr>
<tr>
	<td><img src = "images\M.gif" alt = "machine 4" title = "machine 5" width = "100" height = "100" /></td>
	<td>machine04</td>
	</tr>
</table> 
</div>
</body>
</html>