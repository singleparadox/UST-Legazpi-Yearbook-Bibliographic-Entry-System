<?php
	include 'connection.php';
	session_start();

	$newPass = $_POST['nPass'];


	$sql_update_pass = "UPDATE admin SET password ='".$newPass."' WHERE admin_id=".$_SESSION['admin_id'];
	$conn->query($sql_update_pass);
	echo "success";
?>