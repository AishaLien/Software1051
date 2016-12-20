<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>麵包製作</title>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
        
function make(ID,n,UID) {//設置machine
        console.log(ID)
		$.ajax({
			url: "json.php",
			dataType: 'html',
			type: 'POST',
			data: { id: ID,num:n,userID:UID}, //optional, you can send field1=10, field2='abc' to URL by this
			error: function(response) { //the call back function when ajax call fails
				alert('Ajax request failed!');
				},
			success: function(txt) { //the call back function when ajax call succeed
              if(txt.match("OK")){
                  console.log(txt);
                  document.location.href="making_machine.php ";
              }
              else{
                  console.log(txt)
                  alert("材料不足!!! 請確認!");
              }
              
		    }
		});
}
</script>

<link rel=stylesheet type="text/css" href="outstyle.css">
</head>

<body>

<div class="container">


<div id="moon">
<h1 id="title">PRODUCT</h1>
<?php
include 'connect.php';

$userID = "Mary";
$n = $_GET['n'];
$sql_query = "SELECT * FROM product";
$result = mysqli_query($conn,$sql_query) or die("Query Fail! ".mysqli_error($conn));


htmlTable($result,$n,$userID);	
function htmlTable($result,$n,$userID) {
    echo "<table border=\"5\" cellpadding=\"4\">\n";
    echo "<tr bgColor=\"#add8e6\">";
    echo "<th>麵包編號</th>";
    echo "<th>麵包名稱</th>";
    echo "<th>價格</th>";
    echo "<th>所需時間</th>";
    echo "<th>麵包圖片</th>";
    echo "<th>詳細</th>";
    echo "<th>製作</th>";
    echo "</tr>\n";
    $img = 1;
    $i =0;
    $j=0;

    while ($line = mysqli_fetch_row($result)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value) {
            if($i==0){
                $tmpe[$j]=$col_value;
            }
            echo "\t\t<td>$col_value</td>\n";
            $i++;
        }
        $tm=json_encode($tmpe[$j]);
        $which=json_encode($n);
        $UID=json_encode($userID);
        echo "\t\t<td><img src=\"P".$img.".jpg\" height=\"100\" width=\"100\"></td>\n";
        echo "<td><input type=\"button\" value=\"詳細\" onclick=\"location.href='BOM.php?PID=".$tmpe[$j]."'\" /></td>";
        echo "<td><input type=\"button\" onclick=make($tm,$which,$UID) name=\"detail\" value=\"製作\" /></td>";
        echo "\t</tr>\n";
        $img += 1;
        $j++;
        $i=0;
    }
    echo" </table>";
}
?>

</div>

</div>


</body>
</html>