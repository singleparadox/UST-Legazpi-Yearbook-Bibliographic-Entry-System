<table id="table-view" class="table table-hover"  >
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
	include "connection.php";
	
	if (!isset($_POST['vals'])) {
		$val = 1;
	} else {
		$val = $_POST['vals'];
	}

	if ($val == 1) {
		$val_lim = 0;
	} else {
		$val_lim = ($val * 10) - 10;
	}
	

	$sql = "SELECT * FROM shs_alumni, shs_details, strand, track WHERE shs_alumni.shs_alum_details_id=shs_details.shs_alum_details_id AND shs_alumni.track_id=track.track_id AND strand.strand_id=shs_alumni.strand_id ORDER BY shs_details.shs_fname,shs_details.shs_lname ASC LIMIT ".$val_lim.",10";
	$result = $conn->query($sql);

	$data = '<tbody id="table-view-table">';
	while ($row = $result->fetch_assoc()) {
		$date = new DateTime($row['shs_bdate']);
		$data.= "
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
					</td>
				<td><button id='remove' type=\"button\" class=\"btn btn-link\" onclick='location.href=\"pages/backend/remove.php?id=".$row['shs_alum_id']."&detail_id=".$row['shs_alum_details_id']."\";'>R</button></td>
			</tr>


		";
	}

	$data .= '  </tbody>
</table><div id="pages_backend" style="width:200px !important; margin: 0 auto !important;">
  <ul class="pagination">
	';

	$sql_num_of_pages = "SELECT * FROM shs_alumni, shs_details, strand, track WHERE shs_alumni.shs_alum_details_id=shs_details.shs_alum_details_id AND shs_alumni.track_id=track.track_id AND strand.strand_id=shs_alumni.strand_id ORDER BY shs_details.shs_lname";
	$result_num_pages = $conn->query($sql_num_of_pages);
	$num_of_pages = ceil(((float)($result_num_pages->num_rows)) / 10);

	for ($i=1; $i <= $num_of_pages; $i++) { 
		if ($i == $val) {
			$data.= "<li class=\"page-item active\"><input id='val' onclick='getPage(\"".$i."\")' type='button' value='".$i."' class=\"page-link\"></li>";
		} else {
			$data.= "<li class=\"page-item\"><input id='val' onclick='getPage(\"".$i."\")' type='button' value='".$i."' class=\"page-link\"></li>";
			}
	}

	$data .= '
			</ul>
			</div>
			';
	echo $data;

?>
<script type="text/javascript" src="js/scripts.js"></script>