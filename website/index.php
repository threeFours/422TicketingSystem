<?php session_start(); ?>

<!--Include the page header -->
<?php require_once('templates/header2.php'); ?>


<div class="jumbotron">
  <h1>LETS Ticketing</h1>
  <h2>Track and resolve issues all over campus.</h2>
  <br>
  <h4>
  	LETS Ticketing System is a ACCC web application for tracking and resolving issues all over campus.
  	By centralizing all issues in this simple interface, this proccess is simplified and streamlined.
  </h4>
  <br>
  <p>
  	<a class="btn btn-primary btn-lg" href="/signup.php" role="button">Sign Up Now!</a>
  	or
  	<a class="btn btn-primary btn-lg" href="/login.php" role="button">Login</a>
  </p>
</div>


<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>
