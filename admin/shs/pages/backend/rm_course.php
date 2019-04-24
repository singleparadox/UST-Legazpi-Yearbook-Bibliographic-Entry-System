<?php
	include 'connection.php';

	$course_id = $_POST['cID'];

	$sql = "DELETE FROM strand WHERE strand_id=".$course_id;

	if ($course_id != 0) {
		$conn->query($sql);
		echo "success";
	} else {
		echo "error;";
	}


?>