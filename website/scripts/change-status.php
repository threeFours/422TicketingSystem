<?php
	
	require_once("dbConn.php");

	$sql = "UPDATE ticket SET status='".$_GET['status']."' WHERE id=".$_GET['ticket'];

	mysqli_query($conn, $sql);

	header("Location: /ticket-view.php?ticket=".$_GET['ticket']);

?>