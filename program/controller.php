<?php
require("user.php");
session_start();
if(! isset($_POST["act"])) {
    exit(0);
}

$act =$_POST["act"];
switch($act) {
    case "login":
        $loginID = $_POST['id'];
        $passwd= $_POST['passwd'];
        $userID = checkUser($loginID, $passwd);
        echo $userID;
        if ( $userID != -1) {
               $_SESSION['userID'] = $loginID;
               echo '歡迎! 登入成功!!';
              echo'<meta http-equiv=REFRESH CONTENT=1;url=home1.php>';
        }
        else{
             //set login mark to empty
            $_SESSION['user'] = "";
            $_SESSION['ID'] = -1;
            echo '登入失敗!! 請確認帳號密碼是否正確!'; 
            echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>'; 
        }
}
?>