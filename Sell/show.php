<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>麵包製作</title>
<link rel=stylesheet type="text/css" href="CSS/outstyle.css">
</head>

<body>

<div class="container">


<div id="moon">
<h1 id="title">PRODUCT</h1>
<?php
include 'connect.php';
session_start();
$userID = $_SESSION['userID'];
$sql_query = "SELECT * FROM product";
$result = mysqli_query($conn,$sql_query) or die("Query Fail! ".mysqli_error($conn));


htmlTable($result,$userID);	
function htmlTable($result,$userID) {
    echo "<table border=\"5\" cellpadding=\"4\">\n";
    echo "<tr bgColor=\"#add8e6\">";
    echo "<th>麵包編號</th>";
    echo "<th>麵包名稱</th>";
    echo "<th>價格</th>";
    echo "<th>所需時間</th>";
    echo "<th>麵包圖片</th>";
    echo "<th>詳細</th>";
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
        echo "\t\t<td><img src=\sell\images\P0".$img.".jpg height=\"100\" width=\"100\"></td>\n";
        echo "<td><input type=\"button\" value=\"詳細\" onclick=\"location.href='BOM.php?PID=".$tmpe[$j]."'\" /></td>";
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