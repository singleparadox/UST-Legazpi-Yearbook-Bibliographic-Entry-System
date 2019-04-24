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

<div id="search" class="card border-dark mb-3" style="max-width: 20rem;">
	<div class="card-header">Manage Track/Strand</div>
	<div class="card-body">
		<div class="form-group">
			<label for="add-college">Add Track</label>
			<input type="text" id="add-college" class="form-control" placeholder="Enter Track name" id="inputDefault">
			<button id="add-college-btn" type="button" class="btn btn-outline-success">Add Track</button>
		</div>

		<div class="form-group" id="course-container">
			<label for="select-college">Add Strand</label>
			<select id="select-college" class="custom-select">
				<option value="0" selected="">Select Track</option>
				<?php
					$sql = "SELECT * FROM track";
					$result = $conn->query($sql);

					while ($row = $result->fetch_assoc()) {
						if ($row['track_label'] != "None") {
							echo '<option value="'.$row['track_id'].'">'.$row['track_label'].'</option>';
						}	
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<input type="text" id="add-course" class="form-control" placeholder="Enter Strand name" id="inputDefault">
			<button id="add-course-btn" type="button" class="btn btn-outline-success" style="float: right; margin-top: 5px;">Add Strand</button>
		</div>


		<div class="form-group">
			<label for="rm-college">Remove Track</label>
			<select id="rm-college" class="custom-select">
				<option value="0" selected="">Select Track</option>
				<?php
					$sql = "SELECT * FROM track";
					$result = $conn->query($sql);

					while ($row = $result->fetch_assoc()) {
						if ($row['track_label'] != 'None') {
							echo '<option value="'.$row['track_id'].'">'.$row['track_label'].'</option>';
						}
						
					}
				?>
			</select>
			<button id="rm-college-btn" type="button" class="btn btn-outline-success">Remove Track</button>
		</div>

		<div class="form-group">
			<label for="rm-course">Remove Strand</label>
			<select id="rm-college" onchange="change_strand(this.value)" class="custom-select">
				<option value="0" selected="">Select Track</option>
				<?php
					$sql = "SELECT * FROM track";
					$result = $conn->query($sql);

					while ($row = $result->fetch_assoc()) {
						if ($row['track_label'] != 'None') {
							echo '<option value="'.$row['track_id'].'">'.$row['track_label'].'</option>';
						}
					}
				?>
			</select>
			<select id="course-options" class="custom-select">
				<option value="0" selected="">Please select a Track first...</option>
				
			</select>
			<button id="rm-course-btn" type="button" class="btn btn-outline-success">Remove Strand</button>
		</div>
	</div>
</div>

<script type="text/javascript" src="js/scripts.js"></script>