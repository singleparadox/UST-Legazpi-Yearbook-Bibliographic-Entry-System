<?php
  include 'connection.php';

  $alumni_id = $_POST['vals'];
  $sql = "SELECT * FROM shs_alumni, track, strand, shs_details WHERE shs_alumni.strand_id NOT IN (SELECT strand.strand_id FROM strand) OR shs_alumni.track_id NOT IN (SELECT track.track_id FROM track) AND shs_details.shs_alum_details_id=shs_alumni.shs_alum_details_id AND shs_alumni.shs_alum_id='".$alumni_id."' GROUP BY shs_alumni.shs_alum_id";
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
        <input type="text" class="form-control" value=<?php echo "\"".$fetch_data['shs_fname']."\"";?> placeholder="Enter First Name" name="fname" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="mname">Middle Initial</label>
        <input type="text" class="form-control" maxlength="3" value=<?php echo "\"".$fetch_data['shs_m_initial']."\"";?> placeholder="Enter Middle Initial" name="mname" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="lname">Last Name</label>
        <input type="text" class="form-control" value=<?php echo "\"".$fetch_data['shs_lname']."\"";?> placeholder="Enter Last Name" name="lname" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="perm-add">Permanent Address</label>
        <input type="text" class="form-control" value=<?php echo "\"".$fetch_data['shs_perm_address']."\"";?> placeholder="Enter Permanent Address" name="perm-add" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="suffix" >Suffix</label>
        <input type="text" class="form-control" maxlength="3" value=<?php echo "\"".$fetch_data['shs_suffix']."\"";?> placeholder="Enter Suffix" name="suffix">
      </div>
      <div class="form-group">
        <label class="col-form-label" for="birthday">Birthday</label>
        <input type="date" class="form-control" value=<?php echo "\"".$fetch_data['shs_bdate']."\"";?> name="birthday" required>
      </div>
      <div class="form-group">
        <label class="col-form-label" for="grad">Graduation Year</label>
        <select class="custom-select" name="grad" required>
          <?php
			if ($fetch_data['grad_year'] == 0) {
				echo "<option value='0'  selected='' >none</option>";
			} else {
				echo "<option value='".$fetch_data['shs_grad_year']."' selected='' >".$fetch_data['shs_grad_year']."</option>";
				echo "<option value='0' >none</option>";
			}           
			$addTen = date("Y") + 10;
			
            for ($i=1950; $i <= $addTen; $i++) { 
              if ($i != $fetch_data['shs_grad_year']) {
                echo "<option value='".$i."'>".$i."</option>";
              }
               
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
        <input type="text" class="form-control" value=<?php echo "\"".$fetch_data['future_career']."\"";?> id="future" placeholder="Enter Your Future Career" name="future" required>
      </div>

      <div class="form-group">
        <label for="guiding">Guiding Principles</label>
        <textarea style="resize:none;" class="form-control" id="guiding" name="guiding" rows="4"><?php echo $fetch_data['guiding_principle']; ?></textarea>
      </div>

      <div class="form-group">
        <label for="life">Life's Lesson in High School</label>
        <textarea style="resize:none;" class="form-control" name="life" id="life" rows="4"><?php echo $fetch_data['lesson']; ?></textarea>
      </div>

    

      <span><a style="display: inline-block;" class="nav-link active" id="view-link" onclick="cancel_edit()" href="#">Cancel</a>
      <input style="display: inline-block;" type="submit" id="submit-edit-record" name="submit-edit-record" class="btn btn-outline-success"></span>
    </form>

  </div>
</div>
  <script type="text/javascript" src="js/scripts.js"></script>

  <script>
  var simplemde = new SimpleMDE({ element: document.getElementById("guiding") });
  var simplemde2 = new SimpleMDE({ element: document.getElementById("life") });
</script>
