<?php
include 'connection.php';
?>
<div id="setting-container" class="card border-dark mb-3" style="max-width: 20rem;">
	<div class="card-header">Fix All</div>
	<div class="card-body">
		<div class="form-group">
			<form action="pages/backend/fix_backend.php" method="post">
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
		        <select class="custom-select" id="course-options" name="course" required>
		          <option value="" selected="">Please select a College first...</option>
		          
		        </select>
		        <input style="display: inline-block; float: right;" type="submit" id="submit-archive" name="submit-archive" class="btn btn-outline-success">
		    </form>
	    </div>
	</div>
</div>

<script type="text/javascript" src="js/scripts.js"></script>