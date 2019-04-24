<?php
	include 'connection.php';
	$sql = "SELECT * FROM alumni, college, course, alumni_details WHERE alumni.course_id NOT IN (SELECT course.course_id FROM course) OR alumni.college_id NOT IN (SELECT college.college_id FROM college) AND alumni_details.alum_detail_id=alumni.alum_detail_id GROUP BY alumni.alum_id ORDER BY alumni_details.last_name ASC";

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
							<th scope=\"row\">".$row['alum_id']."</th>
							<td>".$row['first_name']."</td>
							<td>".$row['middle_initial']."</td>
							<td>".$row['last_name']."</td>
							<td>
								<button type=\"button\" class=\"btn btn-link\" onclick='edit_a(".$row['alum_id'].")'>E</button>
							</td>
							<td><button id='remove' type=\"button\" class=\"btn btn-link\" onclick='location.href=\"pages/backend/remove.php?id=".$row['alum_id']."&detail_id=".$row['alum_detail_id']."\";'>R</button></td>
						</tr>
	    			";
	    		}
	    	?>

	    
	</tbody>
	<small><a href="#" onclick="arch()" id="fix-link">Fix All</a></small>
</div>
