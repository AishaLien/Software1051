<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>購物車加入範例</title>
<button type="button" value="回首頁" onclick="location.href='home.php'">回首頁<img src="09_home.png" width=30 height=30></button>
<button type="button" value="回首頁" onclick="location.href='factory.php'">回工廠<img src="build.png" width=30 height=30></button>
<script type="text/javascript"> 
var ppp=["麵粉","糖","焦糖","奶油","蛋"];
var TestBox=["show","show1","show2","show3","show4"];
var g=["<img src=0.jpg width=100>","<img src=1.jpg width=100>","<img src=2.jpg width=100>","<img src=3.jpg width=100>","<img src=4.jpg width=100>"];
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
require("dbconnect.php");
$sql="select * from userlist;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
echo "<table width=300 border=1 align=center>";
echo "<tr>";
echo "<td width=150>"."產品名稱"."</td>";
echo "<td width=150>"."擁有數量"."</td>";
$t=0;
$colors= array("show","show1","show2","show3","show4");
while ( $rs=mysqli_fetch_assoc($result))
{   
   $sql2="select * from ingredient where iid='$rs[have]';";
   $result2=mysqli_query($conn,$sql2) or die("DB Error: Cannot retrieve message.");
   while($rs2=mysqli_fetch_assoc($result2))
   {
      	echo "<table width=300 border=1 align=center>";
    	echo "<td width=150>".'<font color=green>'."<div id=$colors[$t] onmousemove=mouse($t) onmouseout=b($t)>".$rs2['cname']."</div>"."</font>"."</td>";
    	echo "<td width=150>".'<font color=red>'.$rs['much']."</font>"."</td>" ;
        $t++;
    }
}
?>
</div>
</div>
</body>
</html>

