<?php
	include 'connection.php';
	$sql = "SELECT * FROM shs_alumni, track, strand, shs_details WHERE shs_alumni.strand_id NOT IN (SELECT strand.strand_id FROM strand) OR shs_alumni.track_id NOT IN (SELECT track.track_id FROM track) AND shs_details.shs_alum_details_id=shs_alumni.shs_alum_details_id GROUP BY shs_alumni.shs_alum_id ORDER BY shs_details.shs_lname ASC";

?>


<br>
<center>
	<h1>Archives</h1>
</center>

<div id="archive-table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">Alumni ID</th>
				<th scope="col">First Name</th>
				<th scope="col">Middle Inititial</th>
				<th scope="col">Last Name</th>
				<th scope="col">Edit</th>
				<th scope="col">Remove</th>
			</tr>
		</thead>
	<tbody>
	    
	    	<?php
	    		$result = $conn->query($sql);
	    		while ($row = $result->fetch_assoc()) {
	    			echo "
	    				<tr>
							<th scope=\"row\">".$row['shs_alum_id']."</th>
							<td>".$row['shs_fname']."</td>
							<td>".$row['shs_m_initial']."</td>
							<td>".$row['shs_lname']."</td>
							<td>
								<button type=\"button\" class=\"btn btn-link\" onclick='edit_a(".$row['shs_alum_id'].")'>E</button>
							</td>
							<td><button id='remove' type=\"button\" class=\"btn btn-link\" onclick='location.href=\"pages/backend/remove.php?id=".$row['shs_alum_id']."&detail_id=".$row['shs_alum_details_id']."\";'>R</button></td>
						</tr>
	    			";
	    		}
	    	?>

	    
	</tbody>
	<small><a href="#" onclick="arch()" id="fix-link">Fix All</a></small>
</div>
