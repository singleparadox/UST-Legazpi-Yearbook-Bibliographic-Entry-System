<?php
	include 'connection.php';
	session_start();
	if (isset($_POST['submit-add-record'])) {
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


			$sql_details = "INSERT INTO alumni_details (first_name, middle_initial, last_name, thesis, rating_id, grad_year, suffix, email, bdate, perm_address) VALUES ('".$fname."', '".$m_initial."', '".$lname."', '".$thesis."', '".$rating_id."', '".$grad_year."', '".$suffix."', '".$email."', '".$birthday."', '".$perm_address."')";
			
			$conn->query($sql_details);


			$sql_select = "SELECT alum_detail_id FROM alumni_details WHERE first_name='".$fname."' AND middle_initial='".$m_initial."' AND last_name='".$lname."' AND email='".$email."'";
			$result_select = $conn->query($sql_select);
			$fetch_select = $result_select->fetch_assoc();
			
			$sql_alumni = "INSERT INTO alumni (course_id, college_id, alum_detail_id) VALUES ('".$course_id."', '".$college_id."', '".$fetch_select['alum_detail_id']."')";
			$conn->query($sql_alumni);



			header("Location:../../index.php?s=1");

		}

?>