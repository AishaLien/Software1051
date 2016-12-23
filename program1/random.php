<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>RANDOM</title>

</head>

<body>
<?php
function randomP(){
    include 'connect.php';
    for($i=0;$i<5;$i++){
        $price =rand(1,9)*100;
        $sql = "update product set price=$price where PID = 'P0$i'";
        $res=mysqli_query($conn,$sql) or die("db error");
    }  
}
function randomI(){
        for($i=0;$i<5;$i++){
        $price =rand(1,9)*10;
        $sql = "update ingredient set price=$price where IID = 'I0$i'";
        $res=mysqli_query($conn,$sql) or die("db error");
    }
}
?>
<div class="container">

<div id = "choose"></div>

<div id="moon">
<h1 id="title">更改價格</h1>
<table border="1" width = "700" id="calendar">
<tr><td>更改商品價格</td><td>更改原料價格</td></tr>
<tr><td><?php echo "<input type=\"button\" onclick=randomP() name=\"detail\" value=\"確定更改\" />"  ?></td><td><?php echo "<input type=\"button\" onclick=randomI() name=\"detail\" value=\"確定更改\" >" ?></td></tr>
</table>
</div>

</div>


</body>
</html>