<?php include 'backend/connection.php'; ?>


<br><br>
<div id="add-record-box" class="card border-dark mb-3" style="max-width: 35rem;">
	<div class="card-header">Add Record</div>
	<div class="card-body">
		<form action="php/backend/add_record.php" method="post">
			<div class="form-group">
				<label class="col-form-label" for="fname">First Name</label>
				<input type="text" class="form-control" placeholder="Enter First Name" name="fname" required>
			</div>
			<div class="form-group">
				<label class="col-form-label" for="middleinitial">Middle Initial</label>
				<input type="text" class="form-control" placeholder="Enter Middle Initial" name="middleinitial" maxlength="3" required>
			</div>
			<div class="form-group">
				<label class="col-form-label" for="lname">Last Name</label>
				<input type="text" class="form-control" placeholder="Enter Last Name" name="lname" required>
			</div>
			<div class="form-group">
				<label class="col-form-label" for="suffix">Suffix (If any)</label>
				<input type="text" class="form-control" placeholder="Jr./Sr./III" name="suffix" maxlength="3">
			</div>
			<div class="form-group">
				<label class="col-form-label" for="birthday">Birthday</label>
				<input type="date" class="form-control" name="birthday" required>
			</div>
			<div class="form-group">
				<label class="col-form-label" for="perm-address">Permanent Address</label>
				<input type="text" class="form-control" placeholder="Street Address, Subdivision, Barangay, Province" name="perm-address" required>
			</div>
			<div class="form-group">
				<label class="col-form-label" for="email">Email Address</label>
				<input type="email" class="form-control" placeholder="example@example.com" name="email" required>
			</div>
			<div class="form-group">
				<label class="col-form-label" for="college">College</label>
				<select class="custom-select" name="college" onchange="change_course(this.value)" required>
					<option value="" selected="" >Select College</option>
					<?php
						$sql_college = "SELECT * FROM college";
						$result = $conn->query($sql_college);


						while ($row = $result->fetch_assoc()) {
							echo "<option value='".$row['college_id']."'>".$row['college_label']."</option>";
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label class="col-form-label" for="college">Course</label>
				<select class="custom-select" id="course-options" name="course" required>
					<option value="" selected="">Please select a College first...</option>
					
				</select>
			</div>
			<span id="if_gs"></span><br>

		
			<input type="submit" id="submit-record" name="submit-record" class="btn btn-outline-success">
		</form>
	</div>
</div>
<br><br><br>