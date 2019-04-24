<?php 
	include "connection.php";

	if (isset($_POST['submit-record'])) {
		$fname = $_POST['fname'];
		$middle_initial = $_POST['middleinitial'];
		$lname = $_POST['lname'];
		$suffix = $_POST['suffix'];
		$birthday = $_POST['birthday'];
		$perm_address = $_POST['perm-address'];
		$email = $_POST['email'];
		$college = $_POST['college'];
		$course = $_POST['course'];

		if ($college == '6') {
			$thesis = $_POST['thesis'];
			$rating = $_POST['rating'];
		} else {
			$thesis = NULL;
			$rating = NULL;
		}

		if (empty($suffix) || $suffix == '') {
			$suffix = NULL;
		}

		$sql_details = "INSERT INTO `alumni_details` (`first_name`, `middle_initial`, `last_name`, `thesis`, `rating_id`, `grad_year`, `suffix`, `email`, `bdate`, `perm_address`) VALUES ('".$fname."', '".$middle_initial."', '".$lname."', '".$thesis."', '".$rating."', '', '".$suffix."', '".$email."', '".$birthday."', '".$perm_address."')";
		$conn->query($sql_details);

		$sql_select = "SELECT alum_detail_id FROM alumni_details WHERE first_name='".$fname."' AND middle_initial='".$middle_initial."' AND last_name='".$lname."' AND email='".$email."'";
		$result_select = $conn->query($sql_select);
		$fetch_select = $result_select->fetch_assoc();

		$sql_alumni = "INSERT INTO alumni (course_id, college_id, alum_detail_id) VALUES ('".$course."', '".$college."', '".$fetch_select['alum_detail_id']."')";
		$conn->query($sql_alumni);


		header("Location:../../index.php?s=1");

		
	}


?>