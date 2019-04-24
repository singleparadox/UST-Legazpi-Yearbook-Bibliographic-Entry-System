<?php 
	include "connection.php";

	if (isset($_POST['submit-record'])) {
		$fname = $_POST['fname'];
		$middle_initial = $_POST['middleinitial'];
		$lname = $_POST['lname'];
		$suffix = $_POST['suffix'];
		$birthday = $_POST['birthday'];
		$perm_address = $_POST['perm-address'];
		$future = $_POST['future'];
		$strand = $_POST['strand'];
		$guiding = $_POST['guiding'];
		$track = $_POST['track'];
		$life = $_POST['life'];


		if (empty($suffix) || $suffix == '') {
			$suffix = NULL;
		}

		$sql_details = "INSERT INTO `shs_details` (`shs_alum_details_id`, `shs_fname`, `shs_m_initial`, `shs_suffix`, `shs_perm_address`, `shs_bdate`, `shs_grad_year`, `guiding_principle`, `lesson`, `future_career`, `shs_lname`) VALUES ('', '".$fname."', '".$middle_initial."', '".$suffix."', '".$perm_address."', '".$birthday."', '0', '".$guiding."', '".$life."', '".$future."', '".$lname."')";
		$conn->query($sql_details);

		$sql_select = "SELECT shs_alum_details_id FROM shs_details WHERE shs_fname='".$fname."' AND shs_m_initial='".$middle_initial."' AND shs_lname='".$lname."'";
		$result_select = $conn->query($sql_select);
		$fetch_select = $result_select->fetch_assoc();

		$sql_alumni = "INSERT INTO shs_alumni (track_id, strand_id, shs_alum_details_id) VALUES ('".$track."', '".$strand."', '".$fetch_select['shs_alum_details_id']."')";
		$conn->query($sql_alumni);


		header("Location:../../index.php?s=1");

		
	}


?>