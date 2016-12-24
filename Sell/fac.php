<h1><font color = red>factory</font></h1>
<button type="button" value="回首頁" onclick="location.href='home1.php'">回首頁<img src="images/09_home.png" width=30 height=30></button>
<button type="button" value="回首頁" onclick="location.href='making_machine.php'">回工廠<img src="images/build.png" width=30 height=30></button>
<button type="button" value="回首頁" onclick="location.href='store.php'">回商城<img src="images/store.png" width=30 height=30></button>
</br>
<?php
require("connect.php");
date_default_timezone_set('Asia/Taipei');
$user = "Mary";
$datetime= date("Y/m/d H:i:s");
//找到所有machine 內的資料
$sql="select * from machine;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message1.");
//找到所有正在做的東西的資料
$sql6="select * from status;";
$result6=mysqli_query($conn,$sql6) or die("DB Error: fuck.");
$sum=0;
$total_records=mysqli_num_rows($result6); 
while ( $rs=mysqli_fetch_assoc($result))
{
	$computer=$_POST[$rs['cname']];
	for($a=0;$a<$computer;$a++)
	{   
		$s=$total_records+$a;
		$serial="M01";
		$sql6="insert into status(time,PID,MID,cname,busy) values ('$datetime','P01','$serial','$rs[cname]','0');";
	    $result6=mysqli_query($conn,$sql6) or die("DB Error: fuck1.");
	}
	$sql2="select * from userlist where have='$rs[MID]';";
	$result2=mysqli_query($conn,$sql2) or die("DB Error: fuck.");
	$rs2=mysqli_fetch_assoc($result2);
	$a= $rs2['much']+$computer;
	echo "你買了".$rs['cname'].$computer."台";
	echo "<br>";
    $sql3="update userlist set  much = $a where have='$rs[MID]';";
    $result3=mysqli_query($conn,$sql3) or die("DB Error: Cannot retrieve message fuckOAQ.");
    $sum+=$computer*$rs['price'];
    $sql5="insert into buy(time,thing,uid,much) values ('$datetime','$rs[cname]','$user','$computer');";
    if($computer>0)
    $result5=mysqli_query($conn,$sql5) or die("DB Error: Cannot retrieve message fuck2.");
}
$sql="select * from ingredient;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message1.");
while ( $rs=mysqli_fetch_assoc($result))
{
	$computer=$_POST[$rs['cname']];
	$sql2="select * from userlist where have='$rs[IID]';";
	$result2=mysqli_query($conn,$sql2) or die("DB Error: fuck.");
	$rs2=mysqli_fetch_assoc($result2);
	$a= $rs2['much']+$computer;
	echo "你買了".$rs['cname'].$computer."公克";
	echo "<br>";
    $sql3="update userlist set  much = $a where have='".$rs['IID']."' and UID = 'Mary' ";
    $result3=mysqli_query($conn,$sql3) or die("DB Error: Cannot retrieve message fuckOAQ.");
    $sum+=$computer*$rs['price'];
    $sql5= "insert into buy(time,thing,UID,much) values ('$datetime','".$rs['cname']."','Mary','$computer');";
    //"insert into buy(time,thing,num,UID) values ('$datetime','".$rs['cname']."','$computer','Mary');";
    if($computer>0)
    $result5=mysqli_query($conn,$sql5) or die("DB Error: Cannot retrieve message fuckOAQQ.");
}
$sql="select * from user where ID='Mary';";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message3.");
$rs=mysqli_fetch_assoc($result);
if($sum>$rs['money'])
	echo '<font color=red>'."你錢不夠"."</font>";
if($sum==0)
echo '<font color=blue>'."來了就要買好嗎，下次請消費"."</font>";
else
	{
	$sql4="update user set  money = ".$rs['money']."-$sum where ID='Mary';";
    $result4=mysqli_query($conn,$sql4) or die("DB Error: Cannot retrieve message.");
    echo "你共花了".$sum;
}

?>

