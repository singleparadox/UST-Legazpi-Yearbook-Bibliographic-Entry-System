<?php
include 'connection.php';
?>
<div id="setting-container" class="card border-dark mb-3" style="max-width: 20rem;">
	<div class="card-header">Fix All</div>
	<div class="card-body">
		<div class="form-group">
			<form action="pages/backend/fix_backend.php" method="post">
		        <select class="custom-select" name="track" onchange="change_strand(this.value)" required>
		          <option value="" selected="" >Select Track</option>
		          <?php
		            $sql_college = "SELECT * FROM track";
		            $result = $conn->query($sql_college);


		            while ($row = $result->fetch_assoc()) {
		              echo "<option value='".$row['track_id']."'>".$row['track_label']."</option>";
		            }
		          ?>
		        </select>
		        <select class="custom-select" id="course-options" name="strand" required>
		          <option value="" selected="">Please select a Track first...</option>
		        </select>
		        <input style="display: inline-block; float: right;" type="submit" id="submit-archive" name="submit-archive" class="btn btn-outline-success">
		    </form>
	    </div>
	</div>
</div>

<script type="text/javascript" src="js/scripts.js"></script>