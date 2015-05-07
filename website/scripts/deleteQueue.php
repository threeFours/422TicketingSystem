<?php session_start(); 
	
	require_once("requireLogin.php");

	if(!$_SESSION['isAdmin'] == 1){
	    header("Location:/");
	}


	require_once('dbConn.php');

		if (isset($_GET['queue'])) {
			$sql = "DELETE FROM queue WHERE id=".$_GET['queue'];
			$result = mysqli_query($conn, $sql);
		}

	header("Location: /admin.php");

?>