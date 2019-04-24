<?php include 'php/backend/connection.php';
	session_start();
	if (isset($_SESSION['admin_id'])) {
		header("Location: admin/index.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>UST-Legazpi Yearbook Bibliographic Entry System</title>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="css/simplemde.min.css">
</head>
<body>
	<?php include "php/header.php"; ?>


	<main id="main">
		<div id="welcome">
			
		</div>
	</main>


	<?php include "php/footer.php"; ?>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" src="js/simplemde.min.js"></script>
</body>
</html>