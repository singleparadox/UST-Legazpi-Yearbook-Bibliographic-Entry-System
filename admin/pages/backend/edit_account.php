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

	$acc_id = $_POST['vals'];

	$sql = "SELECT * FROM admin, admin_details WHERE admin.ad_detail_id=admin_details.ad_detail_id AND admin.admin_id=".$acc_id;
	$res = $conn->query($sql);
	$fetch = $res->fetch_assoc();

?>

<div id="add-account" class="card border-dark mb-3" style="max-width: 20rem; margin-top: 20px;">
	<div class="card-header">Edit Account</div>
	<div class="card-body">
		<form action="pages/backend/edit_account_backend.php" method="post">
			<div class="form-group">
				<label class="col-form-label" for="username">Username</label>
				<input type="text" class="form-control" placeholder="Enter Username" value=<?php echo "'".$fetch['username']."'";?> name="username" id="username" required>
			</div>		
			<div class="form-group">
				<label class="col-form-label" for="fname">First Name</label>
				<input type="text" class="form-control" value=<?php echo "'".$fetch['first_name']."'";?> placeholder="Enter First Name" name="fname" id="fname" required>
			</div>		
			<div class="form-group">
				<label class="col-form-label" for="m_initial">Middle Initial</label>
				<input type="text" class="form-control" maxlength="3" value=<?php echo "'".$fetch['middle_initial']."'";?> placeholder="Enter Middle Initial" name="m_initial" id="m_initial" >
			</div>		
			<div class="form-group">
				<label class="col-form-label" for="lname">Last Name</label>
				<input type="text" class="form-control" placeholder="Enter Last Name" value=<?php echo "'".$fetch['last_name']."'";?> name="lname" id="lname" required>
			</div>		
			<div class="form-group">
				<label class="col-form-label" for="pass">Password</label>
				<input type="password" class="form-control" placeholder="Enter New Password" name="pass" id="pass" required>
			</div>
			<input type="hidden" name="hidden-id" value=<?php echo "'".$acc_id."'"; ?>>
			<a href="#" onclick="cancel_add_account()">Cancel</a>&nbsp&nbsp
      		<input style="display: inline-block;" type="submit" id="submit-add-account" name="submit-add-account" class="btn btn-outline-success">
		</form>
	</div>
</div>

<script type="text/javascript" src="js/scripts.js"></script>