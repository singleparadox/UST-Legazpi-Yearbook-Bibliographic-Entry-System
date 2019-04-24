<?php
	session_start();
	include 'connection.php';
	if (isset($_SESSION['admin_id'])) {
		if ($_SESSION['admin_id'] != 1) {
			header("Location: ../../index.php");
		}
	} else {
		header("Location: ../../index.php");
	}

	if (isset($_GET['id']) && isset($_GET['detail_id'])) {
		$acc_id = $_GET['id'];
		$acc_detail_id = $_GET['detail_id'];

		$sql_delete_account = "DELETE FROM admin WHERE admin_id = ".$acc_id;
		$sql_delete_detail = "DELETE FROM admin_details WHERE ad_detail_id = ".$acc_detail_id;

		$conn->query($sql_delete_account);
		$conn->query($sql_delete_detail);

		header("Location: ../../index.php?s=1");

	} else {
		echo "Forbidden";
	}


?>