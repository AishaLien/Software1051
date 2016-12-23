<?php
require("connect.php");

function checkUser($userID, $Pwd) {
	global $conn;
	$ID =mysqli_real_escape_string($conn,$userID);
    $Pwd = mysqli_real_escape_string($conn,$Pwd);
	$sql = "SELECT  passwd,ID FROM user WHERE ID='$ID'";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
			if ($row['passwd'] == $Pwd) {
				return $row['ID'];
			} 
		}
	}
	//-1 ==> fail
	return -1;
}
?>