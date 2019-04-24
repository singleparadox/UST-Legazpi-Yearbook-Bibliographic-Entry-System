<?php
	include 'connection.php';
	session_start();
	if (!isset($_SESSION['admin_id'])) {
		header("Location:../../index.php");
	}
	$alum_id = $_GET['alumni_id'];
	$sql = "SELECT * FROM shs_alumni, shs_details, strand, track WHERE shs_alumni.shs_alum_details_id=shs_details.shs_alum_details_id AND shs_alumni.track_id=track.track_id AND strand.strand_id=shs_alumni.strand_id AND shs_alumni.shs_alum_id=".$alum_id;
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
			.sm {
				font-size: 12px;
				text-align: left;
				text-indent: 5px;
			}
		</style>
	</head>
	<body>
		<center>
			<div style="margin-top: 65px;">
				<table border="0">
					<tbody>	
						<tr style="font-weight: bold;"><td width="250" style="border:1px solid black; border-right: none; text-align: right;">SENIOR HIGH SCHOOL</td><td style="border:1px solid black; border-left: none; text-align: left;">YEARBOOK 2018 BIBLIOGRAPHIC ENTRY</td></tr>
						<tr><td style="border:1px solid black; border-right: none; text-align: right;">Please provide the following</td><td style="border:1px solid black; border-left: none; text-align: left;"> information by writing in this form legibly.</td></tr>
						<tr><td style="border:1px solid black;" height="30" width="200">Name</td><td style="border:1px solid black;"><?php echo $fetch['shs_lname'].", ".$fetch['shs_fname']." ".$fetch['shs_suffix']." ".$fetch['shs_m_initial']; ?></td></tr>
						<tr><td style="border:1px solid black;" height="30" width="200">Permanent Address</td><td style="border:1px solid black;"><?php echo $fetch['shs_perm_address'];?></td></tr>
						<tr><td style="border:1px solid black;" height="30" width="200">Birthday</td><td style="border:1px solid black;"><?php echo date("m/d/Y", strtotime($fetch['shs_bdate'])); ?></td></tr>
						<tr><td style="border:1px solid black;" height="30" width="200">Future Career</td><td style="border:1px solid black;"><?php echo $fetch['future_career'];?></td></tr>
						<tr><td style="border:1px solid black;" height="120" width="200">Guiding Principles</td><td class="sm" style="border:1px solid black;"><?php echo $fetch['guiding_principle'];?></td></tr>
						<tr><td style="border:1px solid black;" height="120" width="200">Life's Valuable Lesson in High School</td><td class="sm" style="border:1px solid black;"><?php echo $fetch['guiding_principle'];?></td></tr>
						<tr><td style="border:1px solid black; border-bottom: none;" height="50" width="200"></td>
							<td style="border:1px solid black; border-bottom: none; align-content: left; text-align: left !important;"  class="sm">
								Certified true and correct by:<br><br><br>
								<div style=" margin-left: 2px;width: 350px; border-top: 1px solid black; border-top-width: 1px;">
									Signature above printed name of the Senior High School graduating student
								</div><br>
								&nbsp&nbspVerified By:<br><br><br>
								<div style=" margin-left: 2px;width: 350px; border-top: 1px solid black; border-top-width: 1px;">
									Signature above printed name of the class adviser
								</div><br>
								

							</td>
						</tr>
						<tr ><td style="border:1px solid black; border-top: none;" id="bod" height="50" width="200"></td>
							<td style="border:1px solid black;border-top: none;" class="sm">
								Endorsed By:<br><br><br>
								<div style=" margin-left: 2px;width: 350px; border-top: 1px solid black; border-top-width: 1px;">
									Signature above printed name of the class adviser
								</div><br>


							</td>
						</tr>
					</tbody>
					
				</table>
				<button class="noprint" onclick="window.print();">Print</button>
		</center>
	</body>
</html>