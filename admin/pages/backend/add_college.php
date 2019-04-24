<?php
	include 'connection.php';

	$college_name = $_POST['cName'];
	if (empty($college_name)) {
		echo "error";
	}


	$sql = "INSERT INTO college (college_id, college_label) VALUES ('', '".$college_name."')";
	$conn->query($sql);
	echo "success";

?>