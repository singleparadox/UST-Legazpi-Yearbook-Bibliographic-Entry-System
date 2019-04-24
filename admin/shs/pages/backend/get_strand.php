<?php 
	include 'connection.php';

	$val = (int)$_POST['vals'];

	$sql = "SELECT * FROM strand WHERE track_id=".$val;
	$result = $conn->query($sql);

	$data = "";
	if (($result->num_rows) < 1) {
		$data .="<option value='0'>None</option>";
	}
	while ($row = $result->fetch_assoc()) {
		$data .= "<option value='".$row['strand_id']."'>".$row['strand_label']."</option>
		";
	}
	echo $data;

?>