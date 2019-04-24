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
      <hr>
      <div class="form-group">
        <label class="col-form-label" for="track">Track</label>
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
      </div>
      <div class="form-group">
        <label class="col-form-label" for="strand">Strand</label>
        <select class="custom-select" id="course-options" name="strand" required>
          <option value="" selected="">Please select a Track first...</option>
        </select>
      </div>
      <hr>
      <div class="form-group">
        <label class="col-form-label" for="future">Future Career</label>
        <input type="text" class="form-control" id="future" placeholder="Enter Your Future Career" name="future" required>
      </div>

      <div class="form-group">
        <label for="guiding">Guiding Principles</label>
        <textarea style="resize:none;" class="form-control" id="guiding" name="guiding" rows="4"></textarea>
      </div>

      <div class="form-group">
        <label for="life">Life's Lesson in High School</label>
        <textarea style="resize:none;" class="form-control" name="life" id="life" rows="4"></textarea>
      </div>


      <input style="display: inline-block;" type="submit" id="submit-add-record" name="submit-add-record" class="btn btn-outline-success">
    </form>

  </div>
</div>
  <script type="text/javascript" src="js/scripts.js"></script>
