<h1><font color = red>factory</font></h1>
<button type="button" value="回首頁" onclick="location.href='home.php'">回首頁<img src="09_home.png" width=30 height=30></button>
<button type="button" value="回首頁" onclick="location.href='factory.php'">回工廠<img src="build.png" width=30 height=30></button>
<button type="button" value="回首頁" onclick="location.href='store.php'">回商城<img src="store.png" width=30 height=30></button>
</br>
<?php
require("dbconnect.php");
date_default_timezone_set('Asia/Taipei');
$datetime= date("Y/m/d H:i:s");
$sql="select * from machine;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$sum=0;
while ( $rs=mysqli_fetch_assoc($result))
{
	$computer=$_POST[$rs['cname']];
	$sql2="select * from userlist where have='$rs[mid]';";
	$result2=mysqli_query($conn,$sql2) or die("DB Error: fuck.");
	$rs2=mysqli_fetch_assoc($result2);
	$a= $rs2['much']+$computer;
	echo "你買了".$rs['cname'].$computer."台";
	echo "<br>";
    $sql3="update userlist set  much = $a where have='$rs[mid]';";
    $result3=mysqli_query($conn,$sql3) or die("DB Error: Cannot retrieve message fuck.");
    $sum+=$computer*$rs['price'];
    $sql5="insert into buy(time,thing,num,uid) values ('$datetime','$rs[cname]','$computer','Peter');";
    if($computer>0)
    $result5=mysqli_query($conn,$sql5) or die("DB Error: Cannot retrieve message fuck.");
}
$sql="select * from ingredient;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
while ( $rs=mysqli_fetch_assoc($result))
{
	$computer=$_POST[$rs['cname']];
	$sql2="select * from userlist where have='$rs[iid]';";
	$result2=mysqli_query($conn,$sql2) or die("DB Error: fuck.");
	$rs2=mysqli_fetch_assoc($result2);
	$a= $rs2['much']+$computer;
	echo "你買了".$rs['cname'].$computer."公克";
	echo "<br>";
    $sql3="update userlist set  much = $a where have='$rs[iid]';";
    $result3=mysqli_query($conn,$sql3) or die("DB Error: Cannot retrieve message fuck.");
    $sum+=$computer*$rs['price'];
    $sql5="insert into buy(time,thing,num,uid) values ('$datetime','$rs[cname]','$computer','Peter');";
    if($computer>0)
    $result5=mysqli_query($conn,$sql5) or die("DB Error: Cannot retrieve message fuck.");
}
$sql="select * from user where name='Peter';";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$rs=mysqli_fetch_assoc($result);
if($sum>$rs['price'])
	echo '<font color=red>'."你錢不夠"."</font>";
if($sum==0)
echo '<font color=blue>'."來了就要買好嗎，下次請消費"."</font>";
else
	{
	$sql4="update user set  price = $rs[price]-$sum where name='Peter';";
    $result4=mysqli_query($conn,$sql4) or die("DB Error: Cannot retrieve message.");
    echo "你共花了".$sum;
}

?>

