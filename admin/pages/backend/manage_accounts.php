<?php
	session_start();
	include 'connection.php';
	if (isset($_SESSION['admin_id'])) {
		if ($_SESSION['admin_id'] != 1) {
			header("Location: ../../index.php");
		}
	} else {
		header("Location: ../../index.php");
	}

?>
<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">Admin ID</th>
			<th scope="col">Username</th>
			<th scope="col">First Name</th>
			<th scope="col">Middle Initial</th>
			<th scope="col">Last Name</th>
			<th scope="col">Edit</th>
			<th scope="col">Remove</th>
		</tr>
	</thead>

	<tbody>
		
			<?php 
				$sql = "SELECT * FROM admin, admin_details WHERE admin.ad_detail_id=admin_details.ad_detail_id ORDER BY admin_id ASC";
				$result = $conn->query($sql);

				while ($row = $result->fetch_assoc()) {
					if ($row['admin_id'] != 1) {
						$a = "
							<td><button id='edit-account' onclick='hidden_id(".$row['admin_id'].")' type=\"button\" class=\"btn btn-link\">E</button></td>
							<td><button onclick='location.href=\"pages/backend/remove_account.php?id=".$row['admin_id']."&detail_id=".$row['ad_detail_id']."\"' type=\"button\" class=\"btn btn-link\">R</button></td>

							";
					} else {
						$a = '<td>Invulnerable</td><td>Invulnerable</td>';
					}
					echo "
					<tr>
						<th scope=\"row\">".$row['admin_id']."</th>
						<td>".$row['username']."</td>
						<td>".$row['first_name']."</td>
						<td>".$row['middle_initial']."</td>
						<td>".$row['last_name']."</td>
						".$a."
					</tr>

					";
				}
			?>
		
	</tbody>

</table>

<button id="add-acc-btn" type="button" class="btn btn-outline-success">Add Account</button>

<script type="text/javascript" src="js/scripts.js"></script>