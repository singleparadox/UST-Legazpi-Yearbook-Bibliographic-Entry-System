<?php

if(session_status() == PHP_SESSION_NONE)
	session_start();

require_once "connection.php";

$username = $_POST['username'];
$password = $_POST['password'];


$query = "SELECT admin_id FROM admin WHERE username='".$username."' AND password='".$password."';";
$result = $conn->query($query);

// close database connection
$conn->close();

if($result->num_rows < 1) {
	$_SESSION['error_msg'] = "Invalid username or password";
	//header("Location: ../index.php");
	echo "invalid";
}
else if($result->num_rows > 0) {
	$row = $result->fetch_assoc();

	$_SESSION['admin_id'] = $row["admin_id"];

	/*$sql = "SELECT * FROM admin,admin_details WHERE admin.ad_detail_id=admin_details.ad_detail_id AND admin.admin_id=".$_SESSION['admin_id'];
	$res = $conn->query($sql);
	$fetch = $res->fetch_assoc();

	$file = "../admin/pages/backend/log.txt";
	$txt = "&#013;[USER-ID: ".$_SESSION['admin_id']."][USERNAME:".$fetch['username']."] logged in at ".date("Y/m/d H:i:s");
	$current = file_get_contents($file);
	$current .= $txt;
	file_put_contents($file, $current);*/

	//header("Location:../index.php");
	echo "valid";
}

?>