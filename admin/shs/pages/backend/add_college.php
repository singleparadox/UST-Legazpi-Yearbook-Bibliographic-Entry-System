<?php
	include 'connection.php';

	$college_name = $_POST['cName'];
	if (empty($college_name)) {
		echo "error";
	}


	$sql = "INSERT INTO track (track_id, track_label) VALUES ('', '".$college_name."')";
	$conn->query($sql);
	echo "success";

?>