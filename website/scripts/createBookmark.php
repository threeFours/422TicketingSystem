<?php session_start(); 
	
	require_once("requireLogin.php");


	require_once('dbConn.php');

		if (isset($_GET['tid'])) {
			$sql = "INSERT INTO bookmark(user, ticket) VALUES (".$_SESSION['userId'].", ".$_GET['tid'].")";
			$result = mysqli_query($conn, $sql);
		}

	header("Location: /ticket-view.php?ticket=".$_GET['tid']);

?>