<table class="table table-hover">
<thead>
	<tr>
		<th scope="col">Alumni ID</th>
		<th scope="col">First Name</th>
		<th scope="col">Middle Initial</th>
		<th scope="col">Last Name</th>
		<th scope="col">Suffix</th>
		<th scope="col">Thesis</th>
		<th scope="col">Adj. Rating</th>
		<th scope="col">Email</th>
		<th scope="col">Perm. Address</th>
		<th scope="col">Birthdate (M-D-Y)</th>
		<th scope="col">Grad. Year (0=none)</th>
		<th scope="col">College</th>
		<th scope="col">Course</th>
		<th scope="col">Edit</th>
		<th scope="col">Remove</th>
	</tr>
</thead>

<?php
	include 'connection.php';

	if (isset($_POST['sT']) && isset($_POST['sQ'])) {
		$search_type = $_POST['sT'];
		$search_query = $_POST['sQ'];

		switch ($search_type) {
			case '1': // Last name
				$sql = "SELECT * FROM alumni, alumni_details, course, college, rating WHERE alumni.alum_detail_id=alumni_details.alum_detail_id AND course.course_id=alumni.course_id AND alumni.college_id=college.college_id AND alumni_details.rating_id=rating.rating_id AND alumni_details.last_name LIKE '".$search_query."' ORDER BY alumni_details.last_name,alumni_details.first_name ASC";
				$result = $conn->query($sql);

				break;

			case '2': // First Name
				$sql = "SELECT * FROM alumni, alumni_details, course, college, rating WHERE alumni.alum_detail_id=alumni_details.alum_detail_id AND course.course_id=alumni.course_id AND alumni.college_id=college.college_id AND alumni_details.rating_id=rating.rating_id AND alumni_details.first_name LIKE '".$search_query."' ORDER BY alumni_details.last_name,alumni_details.first_name ASC";
				$result = $conn->query($sql);

				break;

			case '3': // Email
				$sql = "SELECT * FROM alumni, alumni_details, course, college, rating WHERE alumni.alum_detail_id=alumni_details.alum_detail_id AND course.course_id=alumni.course_id AND alumni.college_id=college.college_id AND alumni_details.rating_id=rating.rating_id AND alumni_details.email LIKE '".$search_query."' ORDER BY alumni_details.last_name,alumni_details.first_name ASC";
				$result = $conn->query($sql);
				break;

			case '4': // Thesis
				$sql = "SELECT * FROM alumni, alumni_details, course, college, rating WHERE alumni.alum_detail_id=alumni_details.alum_detail_id AND course.course_id=alumni.course_id AND alumni.college_id=college.college_id AND alumni_details.rating_id=rating.rating_id AND alumni_details.thesis LIKE '".$search_query."' ORDER BY alumni_details.last_name,alumni_details.first_name ASC";
				$result = $conn->query($sql);
				break;
			case '5': // Adjectivial Rating
				$sql = "SELECT * FROM alumni, alumni_details, course, college, rating WHERE alumni.alum_detail_id=alumni_details.alum_detail_id AND course.course_id=alumni.course_id AND alumni.college_id=college.college_id AND alumni_details.rating_id=rating.rating_id AND rating.rating_label LIKE '".$search_query."' ORDER BY alumni_details.last_name,alumni_details.first_name ASC";
				$result = $conn->query($sql);
				break;

			case '6': // Graduation Year
				$sql = "SELECT * FROM alumni, alumni_details, course, college, rating WHERE alumni.alum_detail_id=alumni_details.alum_detail_id AND course.course_id=alumni.course_id AND alumni.college_id=college.college_id AND alumni_details.rating_id=rating.rating_id AND alumni_details.grad_year LIKE '".$search_query."' ORDER BY alumni_details.last_name,alumni_details.first_name ASC";
				$result = $conn->query($sql);
				break;

			case '7': // Adjectivial Rating
				$sql = "SELECT * FROM alumni, alumni_details, course, college, rating WHERE alumni.alum_detail_id=alumni_details.alum_detail_id AND course.course_id=alumni.course_id AND alumni.college_id=college.college_id AND alumni_details.rating_id=rating.rating_id AND college.college_label LIKE '".$search_query."' ORDER BY alumni_details.last_name,alumni_details.first_name ASC";
				$result = $conn->query($sql);
				break;

			case '8': // Adjectivial Rating
				$sql = "SELECT * FROM alumni, alumni_details, course, college, rating WHERE alumni.alum_detail_id=alumni_details.alum_detail_id AND course.course_id=alumni.course_id AND alumni.college_id=college.college_id AND alumni_details.rating_id=rating.rating_id AND course.course_label LIKE '".$search_query."' ORDER BY alumni_details.last_name,alumni_details.first_name ASC";
				$result = $conn->query($sql);
				break;
			
			default:
				# code...
				break;
		}
	} else {
		// Error
	}

?>

<?php

	while ($row = $result->fetch_assoc()) {
		$date = new DateTime($row['bdate']);
		if ($row['college_id'] == 6) {
			$type = "print.php";
		} else {
			$type = "print_college.php";
		}
		$date = new DateTime($row['bdate']);
		echo "
				<tbody>
						<tr>
						<th scope='row'>".$row['alum_id']."</th>
							<td>".$row['first_name']."</td>
							<td>".$row['middle_initial']."</td>
							<td>".$row['last_name']."</td>
							<td>".$row['suffix']."</td>
							<td>".$row['thesis']."</td>
							<td>".$row['rating_label']."</td>
							<td>".$row['email']."</td>
							<td>".$row['perm_address']."</td>
							<td>".$date->format('m-d-Y')."</td>
							<td>".$row['grad_year']."</td>
							<td>".$row['college_label']."</td>
							<td>".$row['course_label']."</td>
							<td>
								<button type=\"button\" class=\"btn btn-link\" onclick='edit(".$row['alum_id'].")'>E</button>
								<a  class=\"btn btn-link\" target='_blank' href='pages/backend/".$type."?alumni_id=".$row['alum_id']."'>P</a>
							<td><button id='remove' type=\"button\" class=\"btn btn-link\" onclick='location.href=\"pages/backend/remove.php?id=".$row['alum_id']."&detail_id=".$row['alum_detail_id']."\";'>R</button></td>
						</tr>

				</tbody>
			
		";
	}


?>


<script type="text/javascript" src="js/scripts.js"></script>