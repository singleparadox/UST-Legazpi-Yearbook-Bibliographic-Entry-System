<?php
  include 'connection.php';

  $alumni_id = $_POST['vals'];
  $sql = "SELECT * FROM alumni, college, course, alumni_details WHERE alumni.course_id NOT IN (SELECT course.course_id FROM course) OR alumni.college_id NOT IN (SELECT college.college_id FROM college) AND alumni_details.alum_detail_id=alumni.alum_detail_id AND alumni.alum_id='".$alumni_id."' GROUP BY alumni.alum_id";
  $result = $conn->query($sql);
  $fetch_data = $result->fetch_assoc(); 

?>

<div class="card border-dark mb-3" style="margin: 0 auto; margin-top: 20px; max-width: 38rem; opacity: 0.95">
  <div class="card-header">Edit</div>
  <div class="card-body">
    <form action="pages/backend/update_edit_alumni.php" method="post">
      <input type="hidden" name="alumni_id" value=<?php echo "\"".$alumni_id."\""; ?>>
      <div class="form-group">
        <label class="col-form-label" for="fname">First Name </label>
        <input type="text" class="form-control" value=<?php echo "\"".$fetch_data['first_name']."\"";?> placeholder="Enter First Name" name="fname" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="mname">Middle Initial</label>
        <input type="text" class="form-control" maxlength="3" value=<?php echo "\"".$fetch_data['middle_initial']."\"";?> placeholder="Enter Middle Initial" name="mname" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="lname">Last Name</label>
        <input type="text" class="form-control" value=<?php echo "\"".$fetch_data['last_name']."\"";?> placeholder="Enter Last Name" name="lname" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="perm-add">Permanent Address</label>
        <input type="text" class="form-control" value=<?php echo "\"".$fetch_data['perm_address']."\"";?> placeholder="Enter Permanent Address" name="perm-add" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="suffix" >Suffix</label>
        <input type="text" class="form-control" maxlength="3" value=<?php echo "\"".$fetch_data['suffix']."\"";?> placeholder="Enter Suffix" name="suffix">
      </div>
      <div class="form-group">
        <label class="col-form-label" for="email">Email</label>
        <input type="email" class="form-control" value=<?php echo "\"".$fetch_data['email']."\"";?> placeholder="Enter Email Address" name="email" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="birthday">Birthday</label>
        <input type="date" class="form-control" value=<?php echo "\"".$fetch_data['bdate']."\"";?> name="birthday" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="grad">Graduation Year</label>
        <select class="custom-select" name="grad" required>
          <?php
			if ($fetch_data['grad_year'] == 0) {
				echo "<option value='0'  selected='' >none</option>";
			} else {
				echo "<option value='".$fetch_data['grad_year']."' selected='' >".$fetch_data['grad_year']."</option>";
				echo "<option value='0' >none</option>";
			}           
			$addTen = date("Y") + 10;
			
            for ($i=1950; $i <= $addTen; $i++) { 
              if ($i != $fetch_data['grad_year']) {
                echo "<option value='".$i."'>".$i."</option>";
              }
               
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="thesis">Thesis</label>
        <input type="text" class="form-control" value=<?php echo "\"".$fetch_data['thesis']."\"";?> placeholder="Enter Thesis Name" name="thesis">
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
        <label class="col-form-label" for="course">Course</label>
        <select class="custom-select" id="course-options" name="course" required>
          <option value="" selected="">Please select a College first...</option>
          
        </select>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="rating">Adjectivial Rating</label>
        <select class="custom-select" name="rating">
          <?php
            $sql = "SELECT * FROM rating";
            $result = $conn->query($sql);
            echo '<option value="'.$fetch_data['rating_id'].'" selected="" >'.$fetch_data['rating_label'].'</option>';
            while ($row = $result->fetch_assoc()) {
                if ($fetch_data['rating_id'] != $row['rating_id']) {
                  echo "<option value='".$row['rating_id']."'>".$row['rating_label']."</option>";
                }      
            }
          ?>
        </select>
      </div>

      <span><a style="display: inline-block;" class="nav-link active" id="view-link" onclick="cancel_edit()" href="#">Cancel</a>
      <input style="display: inline-block;" type="submit" id="submit-edit-record" name="submit-edit-record" class="btn btn-outline-success"></span>
    </form>

  </div>
</div>
  <script type="text/javascript" src="js/scripts.js"></script>
