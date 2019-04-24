<?php include 'backend/connection.php'; ?>


<br><br>
<div id="add-record-box" class="card border-dark mb-3" style="max-width: 35rem;">
	<div class="card-header">Add Record</div>
	<div class="card-body">
		<form action="php/backend/add_shs_record.php" method="post">
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
				<label class="col-form-label" for="track">Track</label>
				<select class="custom-select" name="track" onchange="change_strand(this.value)" required>
					<option value="" selected="" >Select Track</option>
					<?php
						$sql_college = "SELECT * FROM track";
						$result = $conn->query($sql_college);


						while ($row = $result->fetch_assoc()) {
							if ($row['track_label'] != 'None') {
								echo "<option value='".$row['track_id']."'>".$row['track_label']."</option>";
							}
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label class="col-form-label" for="strand">Strand</label>
				<select class="custom-select" id="course-options" name="strand" required>
					<option value="" selected="">Please select a Track first...</option>
				</select>
			</div>
			<br>

			<div class="form-group">
				<label class="col-form-label" for="future">Future Career</label>
				<input type="text" class="form-control" id="future" placeholder="Enter Future Career" name="future">
			</div>
			
			<div class="form-group">
				<label for="guiding">Guiding Principles</label>
				<textarea style="resize:none;" class="form-control" name="guiding" id="guiding" rows="4"></textarea>
			</div>

			<div class="form-group">
				<label for="life">Life's Valuable Lesson in High School</label>
				<textarea style="resize:none;" class="form-control" id="life" name="life" rows="4"></textarea>
			</div>




		
			<input type="submit" id="submit-record" name="submit-record" class="btn btn-outline-success">
		</form>
	</div>
</div>
<br><br><br>