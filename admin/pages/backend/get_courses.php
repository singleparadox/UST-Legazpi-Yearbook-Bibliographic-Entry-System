<?php 
	include 'connection.php';

	$val = (int)$_POST['vals'];

	$sql = "SELECT * FROM course WHERE college_id=".$val;
	$result = $conn->query($sql);

	$data = "";
	while ($row = $result->fetch_assoc()) {
		$data .= "<option value='".$row['course_id']."'>".$row['course_label']."</option>
		";
	}
	echo $data;

?>