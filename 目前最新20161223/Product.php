<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>購物車加入範例</title>
<button type="button" value="回首頁" onclick="location.href='home.php'">回首頁<img src="09_home.png" width=30 height=30></button>
<button type="button" value="回首頁" onclick="location.href='factory.php'">回工廠<img src="build.png" width=30 height=30></button>
<script type="text/javascript"> 
var ppp=["波羅麵包","泡芙","牛角麵包","肉鬆麵包"];
var TestBox=["show","show1","show2","show3"];
var g=["<img src=21.jpg width=100>","<img src=22.jpg width=100>","<img src=23.jpg width=100>","<img src=24.jpg width=100>","<img src=4.jpg width=100>"];
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
//echo "<table width=300 border=1 >";
echo "<table width=300 border=1 align=center>";
echo "<td width=150>"."原料名稱"."</td>";
echo "<td width=150>"."擁有數量"."</td>";
$t=0;
$colors= array("show","show1","show2","show3");
while ( $rs=mysqli_fetch_assoc($result))
{   
   $sql2="select * from product ;";
   $result2=mysqli_query($conn,$sql2) or die("DB Error: Cannot retrieve message.");
   while($rs2=mysqli_fetch_assoc($result2))
   {
   	   if($rs2['pid']==$rs['have'])
      {   
      	echo "<table width=300 border=1 align=center>";
    	echo "<td width=150>".'<font color=green>'."<div id=$colors[$t] onmousemove=mouse($t) onmouseout=b($t)>".$rs2['cname']."</div>"."</font>"."</td>";
    	echo "<td width=150>".'<font color=red>'.$rs['much']."</font>"."</td>" ;
        $t++;
      }
   }
}  	
?>

</div>
</div>
</body>
</html>
