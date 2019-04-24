<?php
	include 'connection.php';
	session_start();
	if (isset($_POST['submit-edit-record'])) {
			$alumni_id = $_POST['alumni_id'];
			$fname = $_POST['fname'];
			$m_initial = $_POST['mname'];
			$lname = $_POST['lname'];
			$suffix = $_POST['suffix'];
			$email = $_POST['email'];
			$birthday = $_POST['birthday'];
			$grad_year = $_POST['grad'];
			$thesis = $_POST['thesis'];
			$college_id = $_POST['college'];
			$course_id = $_POST['course'];
			$rating_id = $_POST['rating'];
			$perm_address = $_POST['perm-add'];

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

			$sql_update = "UPDATE alumni_details,alumni SET alumni_details.first_name='".$fname."', alumni_details.middle_initial='".$m_initial."', alumni_details.last_name='".$lname."', alumni_details.suffix='".$suffix."',alumni_details.email='".$email."', alumni_details.bdate='".$birthday."', alumni_details.grad_year='".$grad_year."', alumni_details.thesis='".$thesis."', alumni.college_id='".$college_id."', alumni.course_id='".$course_id."', alumni_details.rating_id='".$rating_id."', alumni_details.perm_address='".$perm_address."' WHERE alumni.alum_detail_id=alumni_details.alum_detail_id AND alumni.alum_id=".$alumni_id;
			$conn->query($sql_update);
			header("Location:../../index.php?s=1");
		}

?>