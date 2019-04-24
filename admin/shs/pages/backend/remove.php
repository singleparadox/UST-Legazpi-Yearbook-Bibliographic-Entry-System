<?php
	include 'connection.php';

	if (isset($_GET['id']) && isset($_GET['detail_id'])) {
		$alum_id = $_GET['id'];
		$detail_id = $_GET['detail_id'];

		$sql_delete_alumni = "DELETE FROM shs_alumni WHERE shs_alum_id = ".$alum_id;
		$sql_delete_detail = "DELETE FROM shs_details WHERE shs_alum_details_id = ".$detail_id;

		$conn->query($sql_delete_alumni);
		$conn->query($sql_delete_detail);

		header("Location: ../../index.php?s=1");

	} else {
		echo "Forbidden";
	}


?>