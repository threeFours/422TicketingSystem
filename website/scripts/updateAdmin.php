<?php session_start(); 
	
	require_once("requireLogin.php");

	if(!$_SESSION['isAdmin'] == 1){
	    header("Location:/");
	}


	require_once('dbConn.php');

		if (isset($_GET['id']) && isset($_GET['status'])) {
			
			$admin = ($_GET['status']+1)%2;

			$sql = "UPDATE user SET isAdmin=".$admin." WHERE id=".$_GET['id'];
			$result = mysqli_query($conn, $sql);
		}

	header("Location: /admin.php");

?>