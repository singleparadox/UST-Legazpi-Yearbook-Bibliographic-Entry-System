<?php 
	if (isset($_GET['s'])) {
		echo "<script>alert('Success!');window.location.href = 'index.php';</script>";
	}
?>


<div id="logo"></div>

<div id="logo-desc">
	<h5>Yearbook <br>Bibliographic<br>Entry System</h5>

</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<!--<a class="navbar-brand" href="#">Almuni Records System</a>-->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation" style="">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarColor03">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item ">
				<a class="nav-link" id="home-link" href="#!">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" id="add-shs-link" href="#!">Add SHS Record <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" id="add-link" href="#!">Add College Record <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" id="login-link" href="#!">Login <span class="sr-only">(current)</span></a>
			</li>
		</ul>
	</div>
</nav>

