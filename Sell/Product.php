<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel=stylesheet type="text/css" href="CSS/pro.css">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Product</title>
<body>
<div id = "pro">
<button type="button" value="回首頁" onclick="location.href='home1.php'">回首頁<img src="images/09_home.png" width=30 height=30></button>
<button type="button" value="回首頁" onclick="location.href='making_machine.php'">回工廠<img src="images/build.png" width=30 height=30></button>
<script type="text/javascript"> 
var ppp=["小吃貨專用吐司","中國黑心小麻糬","紅豆麵包","假的牛角麵包"];
var TestBox=["show","show1","show2","show3"];
var g=["<img src=images/P01.jpg width=100>","<img src=images/P02.jpg width=100>","<img src=images/P03.jpg width=100>","<img src=images/P04.jpg width=100>"];
function mouse(mid)
{   
	document.getElementById(TestBox[mid]).innerHTML=g[mid];
} 
function b(id)
{
	document.getElementById(TestBox[id]).innerHTML='<font color=green>'+ppp[id]+'</font>';
}

</script>
<?php
require("connect.php");
$sql="select have,product.cname,much from userlist,product,user where userlist.have = product.PID and userlist.UID = user.ID and user.ID = 'Mary';";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
//echo "<table width=300 border=1 >";
echo "<table width=300 border=1 align=center>";
echo "<td width=150>"."原料名稱"."</td>";
echo "<td width=150>"."擁有數量"."</td>";
$t=0;
$colors= array("show","show1","show2","show3","show4");
while ( $rs=mysqli_fetch_assoc($result))
{   
   $sql2="select * from product ;";
   $result2=mysqli_query($conn,$sql2) or die("DB Error: Cannot retrieve message.");
   while($rs2=mysqli_fetch_assoc($result2))
   {
   	   if($rs2['PID']==$rs['have'])
      {   
      	echo "<table width=300 border=1 align=center>";
    	echo "<td width=150>".'<font color=green>'."<div id=$colors[$t] onmousemove=mouse($t) onmouseout=b($t)>".$rs2['cname']."</div>"."</font>"."</td>";
    	echo "<td width=150>".'<font color=red>'.$rs['much']."</font>"."</td>" ;
        $t++;
      }
   }
}  	
?>

</body>
</html>
