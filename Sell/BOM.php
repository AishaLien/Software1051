<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>配方表</title>



<link rel=stylesheet type="text/css" href="CSS/outstyle.css">
</head>

<body>

<div class="container">


<div id="moon">
<?php
include 'connect.php';

/*標題 產品名稱 以及 需要的時間*/

$product = $_GET["PID"]; 
$sql_query = "SELECT cname,time FROM product where PID = '$product'";
$result = mysqli_query($conn,$sql_query) or die("Query Fail! ".mysqli_error($conn));
$row_result=mysqli_fetch_assoc($result);
$cname = $row_result["cname"];
$time = $row_result["time"];
echo "<h1 id=\"title\">產品 ".$cname."</h1><h2>需要".$time."秒製作</h2>";
?>

<?php
$sql_query = "select bom.IID,cname,bom.much,userlist.much from ingredient,bom,userlist where ingredient.IID = bom.IID and bom.IID = userlist.have and bom.PID = '$product' group by IID";
$result = mysqli_query($conn,$sql_query) or die("Query Fail! ".mysqli_error($conn));
htmlTable($result);	
    function htmlTable($result) {
    echo "<table border=\"5\" cellpadding=\"4\">\n";
    echo "<tr bgColor=\"#add8e6\">";
    echo "<th>材料名稱</th>";
    echo "<th>消耗</th>";
    echo "<th>目前持有</th>";
    echo "<th>材料圖</th>";
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
            else
                echo "\t\t<td>$col_value</td>\n";
            $i++;
        }
        echo "\t\t<td><img src=images\\"."$tmpe[$j].jpg"." height=\"100\" width=\"100\"></td>\n";
        echo "\t</tr>\n";
        //$img += 1;
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