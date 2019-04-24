<?php
	include 'connection.php';
	$track = $_POST['track'];
	$strand = $_POST['strand'];


	$sql = "SELECT * FROM shs_alumni, track, strand, shs_details WHERE shs_alumni.strand_id NOT IN (SELECT strand.strand_id FROM strand) OR shs_alumni.track_id NOT IN (SELECT track.track_id FROM track) AND shs_details.shs_alum_details_id=shs_alumni.shs_alum_details_id GROUP BY shs_alumni.shs_alum_id";
	$result = $conn->query($sql);
	$data = '';
	while ($row = $result->fetch_assoc()) {
		$data .= $row['shs_alum_id'].",";
	}

	$exp = explode(',', $data);

	foreach ($exp as $key) {
		$sql = "UPDATE shs_alumni SET track_id='".$track."', strand_id='".$strand."' WHERE shs_alum_id='".$key."'";
		$conn->query($sql);
	}

?>

<script type="text/javascript">alert("Success");</script>

<?php
	header("Location:../../index.php");
?>