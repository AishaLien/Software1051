<?php 
require "connect.php";

$id=$_POST["id"];
//紀錄目前要對第i個機器執行
$n=(int)$_POST["num"]+1;
$UID=$_POST["userID"];
function checkin($PID,$UID,$conn){
    $need_l=0;
    $have_l=0;
    $sql = "select IID,much from bom where PID = '$PID'";
    $res=mysqli_query($conn,$sql) or die("db error");
    while($row=mysqli_fetch_assoc($res)) {//抓一筆放在row
	    $need[] = $row; //store the row into the array
        $need_l++;
    }
    $sql = "select ingredient.IID,userlist.much from ingredient,userlist where ingredient.IID=userlist.have and userlist.UID ='$UID' group by IID";
    $res=mysqli_query($conn,$sql) or die("db error");
    while($row=mysqli_fetch_assoc($res)) {//抓一筆放在row
	    $have[] = $row; //store the row into the array
        $have_l++;
    }
    //檢查
    for($i=0;$i<$need_l;$i++){
        for($j=0;$j<$have_l;$j++){
            if(strcmp("".$have[$j]['IID'],"".$need[$i]['IID'])==0){
                if($have[$j]['much']-$need[$i]['much']<0){
                    return 0;
                }
            }
        }
    }
    //檢查
    for($i=0;$i<$need_l;$i++){
        
        for($j=0;$j<$have_l;$j++){
            if(strcmp("".$have[$j]['IID'],"".$need[$i]['IID'])==0){
                if($have[$j]['much']-$need[$i]['much']>=0){
                    $now = $have[$j]['much']-$need[$i]['much'];
                    $which = "".$need[$i]['IID'];
                    $sql="update userlist set much = $now where have = '$which'";
                    $res=mysqli_query($conn,$sql) or die("db error");
                }
            }
        }
    }
    return 1;
}
//製作
if(checkin($id,$UID,$conn)==1){
    $sql = "update status set PID='$id' where num = $n";
    $res=mysqli_query($conn,$sql) or die("db error");
    $sql = "update status set busy=1 where num = '$n'";
    $res=mysqli_query($conn,$sql) or die("db error");
    $sql="select time from product where PID = '$id'";
    $res=mysqli_query($conn,$sql) or die("db error");
    //依照時間設置
     $j=0;
    while ($ro = mysqli_fetch_row($res)) {
        foreach ($ro as $col_value) {
           $tmp[$j]=$col_value;
           $str ="+7 hours ".$tmp[$j]." seconds";
        }
    }

    //設置時間為$str = "+7 hours $sec seconds"
    $newD = date("Y-m-d H:i:s",strtotime($str)); 
    $sql="update status set time ='$newD' where num=$n";
    $res=mysqli_query($conn,$sql) or die("db error");
    echo "OK";
}
else if(checkin($id,$UID,$conn)){//不給做，轉跳回product頁面
    echo"NO";
}
?>
