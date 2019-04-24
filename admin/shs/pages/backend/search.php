<div id="search" class="card border-dark mb-3" style="max-width: 20rem;">
	<div class="card-header">Search</div>
	<div class="card-body">
		<div class="form-group">
			<label for="search-type">Search by</label>
			<select id="search-type" class="custom-select">
				<option value="" selected="">Select Search Type</option>
				<option value="1">Last Name</option>
				<option value="2">First Name</option>
				<option value="3">Track</option>
				<option value="4">Strand</option>
			</select>
		</div>
		<div class="form-group">
			<input type="text" id="search-query" class="form-control" placeholder="Enter Search Query" id="inputDefault">
		</div>
		<span id="alert-error"><small>Please fill in all needed info</small></span>
		<button id="search-btn" type="button" class="btn btn-outline-success">Search</button>
	</div>
</div>
<script type="text/javascript" src="js/scripts.js"></script>