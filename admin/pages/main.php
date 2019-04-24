<?php
	include "backend/connection.php";
	if (isset($_GET['s'])) {
		echo "<script>alert('Success'); window.location.href='index.php'</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin - Colleges</title>
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
				<h1>Alumni per College</h1>
			</div>

			<div class="chart-num-of-alumni-rating">
				<h2>Number of Alumni Ratings per category</h2>
			</div>

		</div>
		<center><small>Local IP:<a href=<?php echo "'http://".gethostbyname(gethostname())."'"; ?>> <?php echo gethostbyname(gethostname()); ?></a></small></center>
	</main>

	<?php include "footer.php"; ?>

	<script type="text/javascript">
			new Chartist.Line('.chart-num-of-alumni', {
			  labels: [<?php 
					$sql = "SELECT * FROM college";
					$result = $conn->query($sql);
					$data = '';
					$i=1;
					while ($row = $result->fetch_assoc()) {
						if ($i == $result->num_rows) {
							$data .= '\''.$row['college_label'].'\'';
						} else {
							$data .= '\''.$row['college_label'].'\',';
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
							$sql_get_series = "SELECT COUNT(*) as num FROM alumni, alumni_details, course, college, rating WHERE alumni.alum_detail_id=alumni_details.alum_detail_id AND course.course_id=alumni.course_id AND alumni.college_id=college.college_id AND alumni_details.rating_id=rating.rating_id AND college.college_label=".$exp[$i];
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

			new Chartist.Line('.chart-num-of-alumni-rating', {
			  labels: [<?php 
					$sql = "SELECT * FROM rating";
					$result = $conn->query($sql);
					$data = '';
					$i=1;
					while ($row = $result->fetch_assoc()) {
						if ($i == $result->num_rows) {
							$data .= '\''.$row['rating_label'].'\'';
						} elseif ($row['rating_id'] == 0) {
							// do nothing
						} else {
							$data .= '\''.$row['rating_label'].'\',';
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
							$sql_get_series = "SELECT COUNT(*) as num FROM alumni, alumni_details, course, college, rating WHERE alumni.alum_detail_id=alumni_details.alum_detail_id AND course.course_id=alumni.course_id AND alumni.college_id=college.college_id AND alumni_details.rating_id=rating.rating_id AND rating.rating_label=".$exp[$i];
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