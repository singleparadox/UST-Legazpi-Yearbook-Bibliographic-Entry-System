<?php
	include 'connection.php';
	session_start();
	if (isset($_POST['submit-add-record'])) {
			$fname = $_POST['fname'];
			$m_initial = $_POST['mname'];//
			$lname = $_POST['lname'];
			$suffix = $_POST['suffix'];
			$birthday = $_POST['birthday'];
			$grad_year = $_POST['grad'];
			$perm_address = $_POST['perm-add'];//
			$future = $_POST['future'];
			$strand = $_POST['strand'];
			$guiding = $_POST['guiding'];
			$track = $_POST['track'];
			$life = $_POST['life'];

			/*echo $alumni_id;
			echo $fname;
			echo $m_initial;
			echo $lname;
			echo $suffix;
			echo $email;				//FOR DEBUGGING PURPOSES
			echo $birthday;
			echo $grad_year;
			echo $thesis;
			echo $college_id;
			echo $course_id;
			echo $rating_id;*/


			$sql_details = "INSERT INTO `shs_details` (`shs_alum_details_id`, `shs_fname`, `shs_m_initial`, `shs_suffix`, `shs_perm_address`, `shs_bdate`, `shs_grad_year`, `guiding_principle`, `lesson`, `future_career`, `shs_lname`) VALUES ('', '".$fname."', '".$m_initial."', '".$suffix."', '".$perm_address."', '".$birthday."', '".$grad_year."', '".$guiding."', '".$life."', '".$future."', '".$lname."')";
			
			$conn->query($sql_details);


			$sql_select = "SELECT shs_alum_details_id FROM shs_details WHERE shs_fname='".$fname."' AND shs_m_initial='".$m_initial."' AND shs_lname='".$lname."'";
			$result_select = $conn->query($sql_select);
			$fetch_select = $result_select->fetch_assoc();
			
			$sql_alumni = "INSERT INTO shs_alumni (track_id, strand_id, shs_alum_details_id) VALUES ('".$track."', '".$strand."', '".$fetch_select['shs_alum_details_id']."')";
			$conn->query($sql_alumni);



			header("Location:../../index.php?s=1");

		}

?>