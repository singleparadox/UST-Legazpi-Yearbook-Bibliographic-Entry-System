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

	if (isset($_POST['submit-add-account'])) {
			$username = $_POST['username'];
			$fname = $_POST['fname'];
			$m_initial = $_POST['m_initial'];
			$lname = $_POST['lname'];
			$password = $_POST['pass'];
			$a_id = $_POST['hidden-id'];


			$sql_update = "UPDATE admin SET username='".$username."', password='".$password."' WHERE admin_id=".$a_id;
			$conn->query($sql_update);

			$sql_update_detail = "UPDATE admin_details SET first_name='".$fname."', middle_initial='".$m_initial."', last_name='".$lname."' WHERE ad_detail_id=".$a_id;
			$conn->query($sql_update_detail);


			header("Location:../../index.php?s=1");

		}



?>