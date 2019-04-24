<table class="table table-hover">
<thead>
	<tr>
      <th scope="col">Alumni ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Initial</th>
      <th scope="col">Last Name</th>
      <th scope="col">Suffix</th>
      <th scope="col">Perm. Address</th>
      <th scope="col">Birthdate (M-D-Y)</th>
      <th scope="col">Grad. Year (0=none)</th>
      <th scope="col">Track</th>
      <th scope="col">Strand</th>
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
				$sql = "SELECT * FROM shs_alumni, shs_details, strand, track WHERE shs_alumni.shs_alum_details_id=shs_details.shs_alum_details_id AND shs_alumni.track_id=track.track_id AND strand.strand_id=shs_alumni.strand_id AND shs_details.shs_lname LIKE '".$search_query."' ORDER BY shs_details.shs_fname,shs_details.shs_lname ASC";
				$result = $conn->query($sql);

				break;

			case '2': // First Name
				$sql = "SELECT * FROM shs_alumni, shs_details, strand, track WHERE shs_alumni.shs_alum_details_id=shs_details.shs_alum_details_id AND shs_alumni.track_id=track.track_id AND strand.strand_id=shs_alumni.strand_id AND shs_details.shs_fname LIKE '".$search_query."' ORDER BY shs_details.shs_fname,shs_details.shs_lname ASC";
				$result = $conn->query($sql);

				break;

			case '3': // Track
				$sql = "SELECT * FROM shs_alumni, shs_details, strand, track WHERE shs_alumni.shs_alum_details_id=shs_details.shs_alum_details_id AND shs_alumni.track_id=track.track_id AND strand.strand_id=shs_alumni.strand_id AND track_label LIKE '".$search_query."' ORDER BY shs_details.shs_fname,shs_details.shs_lname ASC";
				$result = $conn->query($sql);
				break;

			case '4': // Strand
				$sql = "SELECT * FROM shs_alumni, shs_details, strand, track WHERE shs_alumni.shs_alum_details_id=shs_details.shs_alum_details_id AND shs_alumni.track_id=track.track_id AND strand.strand_id=shs_alumni.strand_id AND strand_label LIKE '".$search_query."' ORDER BY shs_details.shs_fname,shs_details.shs_lname ASC";
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
		$date = new DateTime($row['shs_bdate']);
		echo "
				<tbody>
						<tr>
						<th scope='row'>".$row['shs_alum_id']."</th>
						<td>".$row['shs_fname']."</td>
						<td>".$row['shs_m_initial']."</td>
						<td>".$row['shs_lname']."</td>
						<td>".$row['shs_suffix']."</td>
						<td>".$row['shs_perm_address']."</td>
						<td>".$date->format('m-d-Y')."</td>
						<td>".$row['shs_grad_year']."</td>
						<td>".$row['track_label']."</td>
						<td>".$row['strand_label']."</td>
							<td>
								<button type=\"button\" class=\"btn btn-link\" onclick='edit(".$row['shs_alum_id'].")'>E</button>
								<a  class=\"btn btn-link\" target='_blank' href='pages/backend/print.php?alumni_id=".$row['shs_alum_id']."'>P</a>
							<td><button id='remove' type=\"button\" class=\"btn btn-link\" onclick='location.href=\"pages/backend/remove.php?id=".$row['shs_alum_id']."&detail_id=".$row['shs_alum_details_id']."\";'>R</button></td>
						</tr>

				</tbody>
			
		";
	}


?>


<script type="text/javascript" src="js/scripts.js"></script>