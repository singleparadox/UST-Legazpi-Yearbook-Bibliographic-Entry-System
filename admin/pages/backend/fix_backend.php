<?php
	include 'connection.php';
	$college = $_POST['college'];
	$course = $_POST['course'];


	$sql = "SELECT * FROM alumni, college, course, alumni_details WHERE alumni.course_id NOT IN (SELECT course.course_id FROM course) OR alumni.college_id NOT IN (SELECT college.college_id FROM college) AND alumni_details.alum_detail_id=alumni.alum_detail_id GROUP BY alumni.alum_id";
	$result = $conn->query($sql);
	$data = '';
	while ($row = $result->fetch_assoc()) {
		$data .= $row['alum_id'].",";
	}

	$exp = explode(',', $data);

	foreach ($exp as $key) {
		$sql = "UPDATE alumni SET college_id='".$college."', course_id='".$course."' WHERE alum_id='".$key."'";
		$conn->query($sql);
	}

?>

<script type="text/javascript">alert("Success");</script>

<?php
	header("Location:../../index.php");
?>