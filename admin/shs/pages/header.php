<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="index.php"><span >SHS</span> Admin</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation" style="">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarColor03">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item ">
				<a class="nav-link" id="view-link" href="#!">View <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" id="add-link" href="#!">Add Alumni <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" id="search-link" href="#!">Search <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" id="archive-link" href="#!">Archive <span class="sr-only">(current)</span></a>
			</li>
			<?php 
				if (isset($_SESSION['admin_id'])) {
					if ($_SESSION['admin_id'] == 1) {
						echo '
						<li class="nav-item ">
							<a class="nav-link" id="add-course-college-link" href="#!">Manage Tracks/Strands <span class="sr-only">(current)</span></a>
						</li>
						'; // For Managing Tracks/Strands
					}
				}


			?>
			<li class="nav-item ">
				<a class="nav-link" id="highschool-mode-link" href="../">College Mode<span class="sr-only">(current)</span></a>
			</li>
		</ul>
	</div>
</nav>