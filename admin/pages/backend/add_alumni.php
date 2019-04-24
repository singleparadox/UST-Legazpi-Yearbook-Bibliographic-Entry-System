<?php
  include 'connection.php';

?>

<div class="card border-dark mb-3" style="margin: 0 auto; margin-top: 20px; max-width: 38rem; opacity: 0.95">
  <div class="card-header">Add Alumni</div>
  <div class="card-body">
    <form action="pages/backend/insert_add_alumni.php" method="post">
      <input type="hidden" name="alumni_id">
      <div class="form-group">
        <label class="col-form-label" for="fname">First Name </label>
        <input type="text" class="form-control" placeholder="Enter First Name" name="fname" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="mname">Middle Initial</label>
        <input type="text" class="form-control" maxlength="3" placeholder="Enter Middle Initial" name="mname" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="lname">Last Name</label>
        <input type="text" class="form-control"  placeholder="Enter Last Name" name="lname" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="perm-add">Permanent Address</label>
        <input type="text" class="form-control" placeholder="Enter Permanent Address" name="perm-add" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="suffix" >Suffix</label>
        <input type="text" class="form-control" maxlength="3" placeholder="Enter Suffix" name="suffix">
      </div>
      <div class="form-group">
        <label class="col-form-label" for="email">Email</label>
        <input type="email" class="form-control" placeholder="Enter Email Address" name="email" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="birthday">Birthday</label>
        <input type="date" class="form-control" name="birthday" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="grad">Graduation Year</label>
        <select class="custom-select" name="grad" required>
          <option value="" selected="">Select Graduation Year</option>
          <?php
			$addTen = date("Y") + 10;
            for ($i=1950; $i <= $addTen; $i++) { 
                echo "<option value='".$i."'>".$i."</option>";
               
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="thesis">Thesis (<span style="color: red;">For GS only, leave as is if not GS</span>)</label>
        <input type="text" class="form-control" placeholder="Enter Thesis Name" name="thesis">
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
        <label class="col-form-label" for="rating">Adjectivial Rating (<span style="color: red;">For GS only, leave as is if not GS</span>)</label>
        <select class="custom-select" name="rating">
          <?php
            $sql = "SELECT * FROM rating";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                  echo "<option value='".$row['rating_id']."'>".$row['rating_label']."</option>";  
            }
          ?>
        </select>
      </div>

      <input style="display: inline-block;" type="submit" id="submit-add-record" name="submit-add-record" class="btn btn-outline-success">
    </form>

  </div>
</div>
  <script type="text/javascript" src="js/scripts.js"></script>
