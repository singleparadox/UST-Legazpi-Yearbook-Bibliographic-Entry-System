<?php
	include 'connection.php';

	$course_name = $_POST['cName'];
	$selected_college = $_POST['sCollege'];
	if (($selected_college == 0) || empty($course_name)) {
		echo "error";
	} else {
		$sql = "INSERT INTO `course` (`course_id`, `college_id`, `course_label`) VALUES ('', '".$selected_college."', '".$course_name."')";
		$conn->query($sql);
		echo "success";
	}




?>