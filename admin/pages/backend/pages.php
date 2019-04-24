<table id="table-view" class="table table-hover"  >
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
	

	$sql = "SELECT * FROM alumni, alumni_details, course, college, rating WHERE alumni.alum_detail_id=alumni_details.alum_detail_id AND course.course_id=alumni.course_id AND alumni.college_id=college.college_id AND alumni_details.rating_id=rating.rating_id ORDER BY alumni_details.last_name,alumni_details.first_name ASC LIMIT ".$val_lim.",10";
	$result = $conn->query($sql);

	$data = '<tbody id="table-view-table">';
	while ($row = $result->fetch_assoc()) {
		$date = new DateTime($row['bdate']);
		if ($row['college_id'] == 6) {
			$type = "print.php";
		} else {
			$type = "print_college.php";
		}
		$data.= "
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
					</td>
				<td><button id='remove' type=\"button\" class=\"btn btn-link\" onclick='location.href=\"pages/backend/remove.php?id=".$row['alum_id']."&detail_id=".$row['alum_detail_id']."\";'>R</button></td>
			</tr>


		";
	}

	$data .= '  </tbody>
</table><div id="pages_backend" style="width:200px !important; margin: 0 auto !important;">
  <ul class="pagination">
	';

	$sql_num_of_pages = "SELECT * FROM alumni, alumni_details, course, college, rating WHERE alumni.alum_detail_id=alumni_details.alum_detail_id AND course.course_id=alumni.course_id AND alumni.college_id=college.college_id AND alumni_details.rating_id=rating.rating_id ORDER BY alumni_details.last_name,alumni_details.first_name";
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