<?php
	include 'connection.php';

	$college_id = $_POST['cID'];

	$sql = "DELETE FROM college WHERE college_id=".$college_id;
	$sql2 = "DELETE FROM course WHERE college_id=".$college_id;

	if ($college_id != 0) {
		$conn->query($sql);
		$conn->query($sql2);
		echo "success";
	} else {
		echo "error;";
	}


?>