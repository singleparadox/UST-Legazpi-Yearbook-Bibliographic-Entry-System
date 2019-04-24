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
	<div class="card-header">Manage College/Course</div>
	<div class="card-body">
		<div class="form-group">
			<label for="add-college">Add College</label>
			<input type="text" id="add-college" class="form-control" placeholder="Enter College name" id="inputDefault">
			<button id="add-college-btn" type="button" class="btn btn-outline-success">Add College</button>
		</div>

		<div class="form-group" id="course-container">
			<label for="select-college">Add Course</label>
			<select id="select-college" class="custom-select">
				<option value="0" selected="">Select College</option>
				<?php
					$sql = "SELECT * FROM college";
					$result = $conn->query($sql);

					while ($row = $result->fetch_assoc()) {
						echo '<option value="'.$row['college_id'].'">'.$row['college_label'].'</option>';
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<input type="text" id="add-course" class="form-control" placeholder="Enter Course name" id="inputDefault">
			<button id="add-course-btn" type="button" class="btn btn-outline-success" style="float: right; margin-top: 5px;">Add Course</button>
		</div>


		<div class="form-group">
			<label for="rm-college">Remove College</label>
			<select id="rm-college" class="custom-select">
				<option value="0" selected="">Select College</option>
				<?php
					$sql = "SELECT * FROM college";
					$result = $conn->query($sql);

					while ($row = $result->fetch_assoc()) {
						echo '<option value="'.$row['college_id'].'">'.$row['college_label'].'</option>';
					}
				?>
			</select>
			<button id="rm-college-btn" type="button" class="btn btn-outline-success">Remove College</button>
		</div>

		<div class="form-group">
			<label for="rm-course">Remove Course</label>
			<select id="rm-college" onchange="change_course(this.value)" class="custom-select">
				<option value="0" selected="">Select College</option>
				<?php
					$sql = "SELECT * FROM college";
					$result = $conn->query($sql);

					while ($row = $result->fetch_assoc()) {
						echo '<option value="'.$row['college_id'].'">'.$row['college_label'].'</option>';
					}
				?>
			</select>
			<select id="course-options" class="custom-select">
				<option value="0" selected="">Please select a college first...</option>
				
			</select>
			<button id="rm-course-btn" type="button" class="btn btn-outline-success">Remove Course</button>
		</div>
	</div>
</div>

<script type="text/javascript" src="js/scripts.js"></script>