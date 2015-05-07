<?php session_start(); 
	
	require_once("requireLogin.php");


	require_once('dbConn.php');

		if (isset($_GET['tid'])) {
			$sql = "DELETE FROM bookmark WHERE user=".$_SESSION['userId']." AND ticket=".$_GET['tid'];
			$result = mysqli_query($conn, $sql);
		}

	header("Location: /ticket-view.php?ticket=".$_GET['tid']);

?>