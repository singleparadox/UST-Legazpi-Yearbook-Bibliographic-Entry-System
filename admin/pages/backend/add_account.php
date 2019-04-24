<div id="add-account" class="card border-dark mb-3" style="max-width: 20rem; margin-top: 20px;">
	<div class="card-header">Add Account</div>
	<div class="card-body">
		<form action="pages/backend/add_account_backend.php" method="post">
			<div class="form-group">
				<label class="col-form-label" for="username">Username</label>
				<input type="text" class="form-control" placeholder="Enter Username" name="username" id="username" required>
			</div>		
			<div class="form-group">
				<label class="col-form-label" for="fname">First Name</label>
				<input type="text" class="form-control" placeholder="Enter First Name" name="fname" id="fname" required>
			</div>		
			<div class="form-group">
				<label class="col-form-label" for="m_initial">Middle Initial</label>
				<input type="text" class="form-control" maxlength="3" placeholder="Enter Middle Initial" name="m_initial" id="m_initial" >
			</div>		
			<div class="form-group">
				<label class="col-form-label" for="lname">Last Name</label>
				<input type="text" class="form-control" placeholder="Enter Last Name" name="lname" id="lname" required>
			</div>		
			<div class="form-group">
				<label class="col-form-label" for="pass">Password</label>
				<input type="password" class="form-control" placeholder="Enter Password" name="pass" id="pass" required>
			</div>
			<a href="#" onclick="cancel_add_account()">Cancel</a>&nbsp&nbsp
      		<input style="display: inline-block;" type="submit" id="submit-add-account" name="submit-add-account" class="btn btn-outline-success">
		</form>
	</div>
</div>

