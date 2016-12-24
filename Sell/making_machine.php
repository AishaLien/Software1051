<?php
 require "connect.php";
 session_start();
 ?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel=stylesheet type="text/css" href="CSS/machine.css">
<script type="text/javascript" src="jquery.js"></script>

<script language="javascript">

function handlem(mID) {//設置machine
	now= new Date(); //get the current time
	tday=new Date(myArray[mID]['time']);//設置arr用來存取爆炸時間
	if (tday <= now) {//製作時間已經過惹
		//alert('exploded');
		//use jQuery ajax to reset timer
		$.ajax({
			url: "json.php",
			dataType: 'html',
			type: 'POST',
			data: { id: myArray[mID]['num']}, //optional, you can send field1=10, field2='abc' to URL by this
			error: function(response) { //the call back function when ajax call fails
				alert('Ajax request failed!');
				},
			success: function(txt) { //the call back function when ajax call succeed
				alert("Start" + mID + ": " + txt)
				myArray[mID]['time']=txt
				}
		});
	
	} else {
		alert("counting down, be patient.")
	}
}
function check_add(num){
     //檢查資料庫的status 狀態 如果為busy turn to finish
     //product ++
     //console.log("1");
     if (tday <= now) {//製作時間已經過惹
		$.ajax({
			url: "check.php",
			dataType: 'html',
			type: 'POST',
			data: { MID: num}, //optional, you can send field1=10, field2='abc' to URL by this
			error: function(response) { //the call back function when ajax call fails
				alert('Ajax request failed!');
				},
			success: function(txt) { //the call back function when ajax call succeed
				   if(txt==1){
                       alert("第" + num + "機台已收成!" +txt);
                    }
                    console.log(txt);
                }
		});
	
	} else {
		alert("counting down, be patient.")
	}
}
function ara(){
    alert("counting down, be patient.")
}
function checkm() {
	now= new Date(); //get the current time

	//check each bomb with a for loop
	//array length: number of items in the global array: myArray
	for (i=0; i < myArray.length;i++) {	
		tday=new Date(myArray[i]['time']); //convert the date string into date object in javascript
		console.log(i);
        console.log(tday)
        console.log(now)
        if (tday <= now) { 
			//expired, set the explode image and text
            check_add(i);
			$("#making" + i).attr('src',"images/get.jpg");
            $("#making" + i).attr('onclick',"javascript:location.href='making_product.php?n="+i+"'");
            $("#P" + i).attr('src',"images/w.png");
			$("#timer"+i).html("待機中!");
            $("#ing"+i).html("閒置中");
		} else {
			//set the bomb image  and calculate count down
			$("#making" + i).attr('src',"images/M.gif");
			$("#timer"+i).html(Math.floor((tday-now)/1000))	;
            $("#ing").html("製作中");
			//console.log("tday=",tday,"now=",now)    	
		}
	}
}

//javascript, to set the timer on windows load event
window.onload = function () {
	//check the bomb status every 1 second
    setInterval(function () {
		checkm()
    }, 1000);
};
</script>
</head>

<body >
<div id="list">
<h4>工廠首頁</h4>
<button type="button" value="回首頁" onclick="location.href='home1.php'">回首頁<img src="images/09_home.png" width=30 height=30></button>
<button type="button" value="回首頁" onclick="location.href='making_machine.php'">回工廠<img src="images/build.png" width=30 height=30></button>
<table border="1" cellpadding="4">
<?php
$user = $_SESSION['userID'];
$i=0; //counter for machine 紀錄機器數
//select all bomb information from DB
$sql=" select status.time,status.PID,status.num,status.busy,userlist.have 
         from status,userlist
         where status.MID = userlist.have and userlist.UID= '$user'
         group by status.num"; 
$res=mysqli_query($conn,$sql) or die("db1 error");
$arr = array(); //define an array for bombs
echo "<tr bgColor=\"#ffffffff\"><th>製造</th><th>空閒與否</th><th>製造的商品</th></tr>";
while($row=mysqli_fetch_assoc($res)) {//抓一筆放在row
    echo "<tr>";
	$arr[] = $row; //store the row into the array
	
    if(strcmp($row['busy'],"1")==0){
        echo "<td><img src='images/get.jpg' id='making$i' height=\"200\" width=\"200\" onclick='ara($i)'><div id='timer$i'>待機中</div></td>";
        echo "<td ><div id='ing$i'>製作商品中</div></td>";
        echo "<td><img src='images/".$row['PID'].".jpg' id='P$i' height=\"100\" width=\"200\"></td>";
    }else{
        echo "<td><img src='images/get.jpg' id='making$i' height=\"200\" width=\"200\" onclick=\"javascript:location.href='making_product.php?n=".$i."'\"><div id='timer$i'>待機中</div></td>";
        echo "<td><div id='ing$i'>閒置中</div></td><td><img src='images/w.png' id='P$i' height=\"100\" width=\"200\"></td>";
    }        
   
    echo "</tr>";
    $i++; //increase counter
}

?>
</table>
</div>
<script>
<?php
	//print the bomb array to the web page as a javascript object
	echo "var myArray=" . json_encode($arr);
?>
</script>

</body></html>