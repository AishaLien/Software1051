<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel=stylesheet type="text/css" href="CSS/ing2.css">
<title>持有材料</title>
</head>
<body>
<div id="ing">
<button type="button" value="回首頁" onclick="location.href='home1.php'">回首頁<img src="images/09_home.png" width=30 height=30></button>
<button type="button" value="回工廠" onclick="location.href='making_machine.php'">回工廠<img src="images/build.png" width=30 height=30></button>
<script type="text/javascript"> 
var ppp=["白白的麵粉","雞蛋","純棉奶油","草莓","牛奶","巧克力","麻糬","紅豆"];
var TestBox=["show1","show2","show3","show4","show5","show6","show7","show8"];
var g=["<img src=images/I01.jpg width=100>","<img src=images/I02.jpg width=100>","<img src=images/I03.jpg width=100>","<img src=images/I04.jpg width=100>","<img src=images/I05.jpg width=100>","<img src=images/I06.jpg width=100>","<img src=images/I07.jpg width=100>","<img src=images/I08.jpg width=100>"];
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
$sql="select * from userlist,ingredient,user where userlist.have = ingredient.IID and userlist.UID=user.ID and user.ID = 'Mary'";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
echo "<table width=300 border=1 align=center>";
echo "<tr>";
echo "<td width=150>"."產品名稱"."</td>";
echo "<td width=150>"."擁有數量"."</td>";
$t=0;
$colors= array("show1","show2","show3","show4","show5","show6","show7","show8");
while ( $rs=mysqli_fetch_assoc($result))
{   
   $sql2="select * from ingredient where IID='$rs[have]';";
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
</body>
</html>

