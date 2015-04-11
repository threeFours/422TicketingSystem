<?php

	if(!isset($_SESSION["userId"])){
	    if (basename($_SERVER['PHP_SELF']) != "login.php" || basename($_SERVER['PHP_SELF']) != "signup.php"){
	    	header("Location: /login.php");
	    }
	 }

?>