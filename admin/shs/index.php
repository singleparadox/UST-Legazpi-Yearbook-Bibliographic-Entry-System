<?php 
	session_start();
	//echo $_SESSION['admin_id'];

	if (isset($_SESSION['admin_id'])) {
		include "pages/main.php";
	} else {
		include "pages/static/static.html";
	}


?>