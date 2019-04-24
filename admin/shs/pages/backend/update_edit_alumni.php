<?php
	include 'connection.php';
	session_start();
	if (isset($_POST['submit-edit-record'])) {
			$alumni_id = $_POST['alumni_id'];
			$fname = $_POST['fname'];
			$m_initial = $_POST['mname'];
			$lname = $_POST['lname'];
			$suffix = $_POST['suffix'];
			$birthday = $_POST['birthday'];
			$grad_year = $_POST['grad'];
			$perm_address = $_POST['perm-add'];
			$track = $_POST['track'];
			$strand = $_POST['strand'];
			$future_career = $_POST['future'];
			$life_lesson = $_POST['life'];
			$guiding = $_POST['guiding'];
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
			$sql_update = "UPDATE shs_alumni, shs_details SET shs_alumni.track_id='".$track."', shs_alumni.strand_id='".$strand."', shs_details.shs_fname='".$fname."', shs_details.shs_lname='".$lname."', shs_details.shs_m_initial='".$m_initial."', shs_details.shs_suffix='".$suffix."', shs_details.shs_perm_address='".$perm_address."', shs_details.shs_bdate='".$birthday."', shs_details.shs_grad_year='".$grad_year."', shs_details.guiding_principle='".$guiding."', shs_details.lesson='".$life_lesson."', shs_details.future_career='".$future_career."' WHERE shs_alumni.shs_alum_details_id=shs_details.shs_alum_details_id AND shs_alumni.shs_alum_id=".$alumni_id;

			$conn->query($sql_update);
			header("Location:../../index.php?s=1");
		}

?>