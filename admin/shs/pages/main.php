<?php
	include "backend/connection.php";
	if (isset($_GET['s'])) {
		echo "<script>alert('Success'); window.location.href='index.php'</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin - SHS</title>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/chartist/chartist.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/custom-admin.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="js/chartist/chartist.min.css">
</head>
<body>
	<?php include "header.php"; ?>

	<main id="main">
		<div id="charts">

			<div class="chart-num-of-alumni">
				<h1>Alumni per Track</h1>
			</div>

		</div>
		<br><br><br>
		<center><small>Local IP:<a href=<?php echo "'http://".gethostbyname(gethostname())."'"; ?>> <?php echo gethostbyname(gethostname()); ?></a></small></center>
	</main>

	<?php include "footer.php"; ?>

	<script type="text/javascript">
			new Chartist.Line('.chart-num-of-alumni', {
			  labels: [<?php 
					$sql = "SELECT * FROM track";
					$result = $conn->query($sql);
					$data = '';
					$i=1;
					while ($row = $result->fetch_assoc()) {
						if ($i == $result->num_rows) {
							$data .= '\''.$row['track_label'].'\'';
						} else {
							$data .= '\''.$row['track_label'].'\',';
						}
						$i++;
					}
					echo $data;

			   ?>],
			  series: [
			    [
			    	<?php
			    		$exp = explode(",", $data);
			    		$i = 0;
			    		foreach ($exp as $key) {
							$sql_get_series = "SELECT COUNT(*) as num FROM shs_alumni, track WHERE shs_alumni.track_id=track.track_id AND track.track_label=".$exp[$i];
							$result_cnt = $conn->query($sql_get_series);
							$fetch_series =  $result_cnt->fetch_assoc();
							echo $fetch_series['num'].',';
							$i++;
			    		}

			    	?>


			    ]
			  ]
			}, {
			  low: 0,
			  showArea: true
			});


	</script>
	<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>