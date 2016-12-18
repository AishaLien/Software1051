<!DOCTYPE html>
<html>
<head>
<title>玩家登入</title>
<link rel=stylesheet type="text/css" href="login.css">
</head>
<div class="container">
<body>
<?php
session_start();
//set the login mark to empty
$_SESSION['userID'] = "";
?>
<div id="form">
<h1>Login Form</h1><hr />
<form method="post" action="controller.php">
<!--給conroller 判斷做啥動作-->
<input type="hidden" name="act" value="login">
User Name: <input type="text" name="id"><br />
Password : <input type="password" name="passwd"><br />
<input type="submit">
</form>
</div>
</div>
<!--<a href='add_view.php'>創建帳號</a>--->

</body>
</html>