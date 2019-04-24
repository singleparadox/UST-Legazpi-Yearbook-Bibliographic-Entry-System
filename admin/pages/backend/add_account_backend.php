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


			$sql_details = "INSERT INTO admin (username, password) VALUES ('".$username."', '".$password."')";
			$conn->query($sql_details);

			$sql_select = "SELECT * FROM admin WHERE username='".$username."' AND password='".$password."'";
			$result_select = $conn->query($sql_select);
			$fetch_select = $result_select->fetch_assoc();

			$sql_update = "UPDATE admin SET ad_detail_id='".$fetch_select['admin_id']."' WHERE username='".$username."' AND password='".$password."'";
			$conn->query($sql_update);

			$sql_alumni = "INSERT INTO admin_details (ad_detail_id, first_name, middle_initial, last_name) VALUES ('".$fetch_select['ad_detail_id']."', '".$fname."', '".$m_initial."', '".$lname."')";
			$conn->query($sql_alumni);



			header("Location:../../index.php?s=1");

		}



?>