<html>
<title>我的cool工廠</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<link rel= "stylesheet" type= "text/css" href= "main.css" />
<body>
 <? if($action == 'timesup') exit('Timesup'); ?> 
<h1><font color = red>factory</font></h1>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">  
  var minutes = [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1];
  var seconds = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]; 
  var cache = [60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60]; 
  var ppp=["show","show1","show2","show3","show4","show5","show6","show7","show8","show9","show10","show11","show12","show13","show14","show15","show16","show17","show18","show19","show20"];
function express(URL){
//var value="abc";
//location.href="ingredient.php?value=" +value;
$.ajax({
		url: URL,
		dataType: 'html',
		type: 'POST',
		success: function(response) { //the call back function when ajax call succeed
			$('#ain').html(response); //set the html content of the object msg
			}
	});
} 
  function count(id){  
          if ( minutes[id]==0 && seconds[id]==0){ 
                //document.getElementById(ppp[id]).remove();
               	document.getElementById(ppp[id]).innerHTML='<font color="green">'+"閒置中"+'</font>';
               	express('ingredient.php');
         }else{ 
                  
                 if (seconds[id] == 0){ 
                          if (minutes[id] == 0){ 
                                  minutes[id] = cache[id]-1; 
                                  seconds[id] = cache[id]; 
                          }else{ 
                                  seconds[id] = cache[id]; 
                                  minutes[id] = minutes[id]-1; 
                         } 
                  }else{ 
                          seconds[id] = seconds[id]-1; 
                  }
                  document.getElementById(ppp[id]).innerHTML = '尚餘 '+minutes[id]+' 分鐘 '+seconds[id]+' 秒'+'<font color="red">'+"運作中"+'</font>'; 
                  setTimeout("count(" + id + ")", 1000);
          } 
          
          
  } 

  //document.write('<div id="show">尚餘 '+hours+' 小時 '+minutes+' 分鐘 '+seconds+' 秒</div>'); 
  //var count1=new count();
</script> 
<input type="hidden" id="url"  value="ingredient.php" ><br>
<?php
require("dbconnect.php");
$sql="select * from machine;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$colors= array("show","show1","show2","show3","show4","show5","show6","show7","show8","show9","show10","show11","show12","show13","show14","show15","show16","show17","show18","show19","show20");
$control= array(0,0,0,0,0,0,0,0,0,0);
$r=0;$i=-4;$y=0;
while ( $rs=mysqli_fetch_assoc($result))
{   
    $sql2="select * from list;";
	$result2=mysqli_query($conn,$sql2) or die("DB Error: fuck.");
	$rs2=mysqli_fetch_assoc($result2);
    for($t=0;$t<$rs2[$rs['name']];$t++)
    {
    	$r++;
    	print $e;
    	$v=$i.".jpg";
    	echo "<table width=300 border=1 >";
    	print "<td>"."<img src=$v width=60 height=40>"."</td>";
    	print "<td>".$rs['name']."</td>";
    	print "<td>"."<input type=button value=開始運作 onclick=count($r);>"."</td>";
    	print "<td>"."<input type=button value=機器功能 >"."</td>";
    	print "<td>"."<div id=$colors[$r]></div>"."</td>";
    	print "<tr>";
    	print "<br>";
    }
    $i++;
}
?>
<div id="ain"><h1></h1></div>
<a href="store.php">回商店</a>
