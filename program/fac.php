<h1><font color = red>factory</font></h1>
<?php
require("connect.php");
$sql="select * from machine;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$sum=0;
while ( $rs=mysqli_fetch_assoc($result))
{
    //甚麼商品買幾個
	$computer=$_POST[$rs['name']];
	$sql2="select * from userlist where have='$rs[id]';";
	$result2=mysqli_query($conn,$sql2) or die("DB Error: fuck.");
	$rs2=mysqli_fetch_assoc($result2);
	$a= $rs2['much']+$computer;
	echo "你買了".$rs['name'].$computer."台";
	echo "<br>";
    $sql3="update userlist set  much = $a where have='$rs[id]';";
    $result3=mysqli_query($conn,$sql3) or die("DB Error: Cannot retrieve message fuck.");
    //總多少錢
    $sum+=$computer*$rs['price'];
}
$sql="select * from ingredient;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");

while ( $rs=mysqli_fetch_assoc($result))
{
	$computer=$_POST[$rs['cname']];
	$sql2="select * from userlist where have='$rs[IID]';";
	$result2=mysqli_query($conn,$sql2) or die("DB Error: fuck.");
	$rs2=mysqli_fetch_assoc($result2);
	$a= $rs2['much']+$computer;
	echo "你買了".$rs['cname'].$computer."公克";
	echo "<br>";
    $sql3="update userlist set  much = $a where have='$rs[IID]';";
    $result3=mysqli_query($conn,$sql3) or die("DB Error: Cannot retrieve message fuck.");
    $sum+=$computer*$rs['price'];
}
$sql="select * from user where ID='Mary';";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$rs=mysqli_fetch_assoc($result);
if($sum>$rs['money'])
	echo '<font color=red>'."你錢不夠"."</font>";
else
	{
	$sql4="update user set  money = $rs[money]-$sum where ID='Mary';";
    $result4=mysqli_query($conn,$sql4) or die("DB Error: Cannot retrieve message.");
    echo "你共花了".$sum;
}
?>
<a href="factory.php">回工廠</a>
<a href="store.php">回商店</a>
<a href="home1.php">回首頁</a>