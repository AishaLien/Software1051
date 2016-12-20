<?php
 require "connect.php";
 ?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery.js"></script>

<script language="javascript">

function handlem(mID) {//設置machine
	now= new Date(); //get the current time
	tday=new Date(myArray[mID]['time']);//設置arr用來存取爆炸時間
	console.log("now")
    console.log(now)//檢查用語法
    console.log("tday")
    console.log(tday)
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
function add(){
     //檢查資料庫的status 狀態 如果為busy turn to finish
     //product ++
}
function checkm() {
	now= new Date(); //get the current time
	
	//check each bomb with a for loop
	//array length: number of items in the global array: myArray
	for (i=0; i < myArray.length;i++) {	
		tday=new Date(myArray[i]['time']); //convert the date string into date object in javascript
		if (tday <= now) { 
			//expired, set the explode image and text
			$("#making" + i).attr('src',"images/explode.jpg");
			$("#timer"+i).html("待機中!")
		} else {
			//set the bomb image  and calculate count down
			$("#making" + i).attr('src',"images/bomb.jpg");
			$("#timer"+i).html(Math.floor((tday-now)/1000))		
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
<?php
//$userID = $_POST["user"];
$i=0; //counter for machine 紀錄機器數
//select all bomb information from DB
$sql=" select * from status,userlist where status.MID = userlist.have and userlist.UID = 'Mary'"; 
$res=mysqli_query($conn,$sql) or die("db error");
$arr = array(); //define an array for bombs

while($row=mysqli_fetch_assoc($res)) {//抓一筆放在row
	$arr[] = $row; //store the row into the array
	//generate the image tag, the div tag for timer text. Note on the use of $i in tag ID
	//echo "<img src='images/bomb.jpg' id='making$i' onclick='handlem($i)'><div id='timer$i'>0</div><br />";
	echo "<img src='images/bomb.jpg' id='making$i' onclick=\"javascript:location.href='making_product.php?n=".$i."'\"><div id='timer$i'>待機中</div><br />";
    $i++; //increase counter
}

?>

<script>
<?php
	//print the bomb array to the web page as a javascript object
	echo "var myArray=" . json_encode($arr);
?>
</script>

</body></html>