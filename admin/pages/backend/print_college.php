<?php
	include 'connection.php';
	session_start();
	if (!isset($_SESSION['admin_id'])) {
		header("Location:../../index.php");
	}
	$alum_id = $_GET['alumni_id'];
	$sql = "SELECT * FROM alumni, alumni_details, course, college, rating WHERE alumni.alum_detail_id=alumni_details.alum_detail_id AND course.course_id=alumni.course_id AND alumni.college_id=college.college_id AND alumni_details.rating_id=rating.rating_id AND alumni.alum_id=".$alum_id;
	$result = $conn->query($sql);
	$fetch = $result->fetch_assoc();
?>



<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<style type="text/css">
			* {
				font-family: Arial Narrow;
			}
			@page {
				size: auto;
				margin: 0mm;
			}
			@media print {
			/* style sheet for print goes here */
		    	.noprint {
		    	visibility: hidden;
		    	}
			}
			table {
				width: 600px;
				font-size: 15px;
				border-collapse: collapse;
			}
			#bod {
				border-top: none;
			}
			th,td {
				text-align: center;
				/*border: 1px solid black;
				border-bottom: none;*/
			}
			tr {
				
			}
		</style>
	</head>
	<body>
		<center>
			<div style="width:230px; margin-top: 30px;">
				<img width="100" height="100" src="../../img/seal.png" style=";display: inline-block;">
				<h5 style="font-size: 15px; display: inline-block; float: right;">University of<br>Santo Tomas-Legazpi</h5>
				<h5 style="font-size: 15px;display: inline-block;">Yearbook Bibliographic Entry System</h5>
			</div>
			<center><h1>Bibliographic Entry Template (Colleges and Law)</h1></center>
			<div>
				<table border="0">
					<tbody>	
						<tr><td style="border:1px solid black;" height="50" width="200">Name</td><td style="border:1px solid black;"><?php echo $fetch['last_name'].", ".$fetch['first_name']." ".$fetch['suffix']." ".$fetch['middle_initial']; ?></td></tr>
						<tr><td style="border:1px solid black;" height="50" width="225">Birthday</td><td style="border:1px solid black;"><?php echo date("m/d/Y", strtotime($fetch['bdate'])); ?></td></tr>
						<tr><td style="border:1px solid black;" height="50" width="225">Permanent Address</td><td style="border:1px solid black;"><?php echo $fetch['perm_address'];?></td></tr>
						<tr><td style="border:1px solid black;" height="50" width="225">Email Address</td><td style="border:1px solid black;"><?php echo $fetch['email']; ?></td></tr>
						<tr><td style="border:1px solid black;" height="50" width="225">College</td><td style="border:1px solid black;"><?php echo $fetch['college_label'];?></td></tr>
						<tr><td style="border:1px solid black;" height="50" width="225">Course</td><td style="border:1px solid black;"><?php echo $fetch['course_label'];?></td></tr>
						<tr><td style="border:1px solid black; border-bottom: none;" height="50" width="225"></td>
							<td style="border:1px solid black;"><span style="font-weight: bold;">Note:</span> The graduating student will bring the hard copy of the template on his/her schedule of yearbook pictorial. A Yearbook Committee Member/Yearbook Pictorial Facilitator will verify the information, and the graduating student will affix his/her signature below to indicate that the provided details are certified true and correct.</td>
						</tr>
						<tr ><td style="border:1px solid black; border-top: none;" id="bod" height="50" width="225"></td>
							<td style="border:1px solid black;">I hereby certify that the above details are true and correct to the best of my knowledge. I understand that these details will become public record.<br><br><br><br><br><br>
								<div style="border-top: 1px solid black; width: 200px; margin: 0 auto;">
									Signature over printed name
								</div><br><br>
							</td>
						</tr>
					</tbody>
					
				</table>
				<button class="noprint" onclick="window.print();">Print</button>
		</center>
	</body>
</html>