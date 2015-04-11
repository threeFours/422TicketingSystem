<?php session_start(); 

  // if(!isset($_SESSION["userId"])){
  //   if (basename($_SERVER['PHP_SELF']) != "login.php" || basename($_SERVER['PHP_SELF']) != "signup.php"){
  //     header("Location: /login.php");
  //   }
  // }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticketing System</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- main.css -->
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <img src="img/uicbanner092809.png" width=100%%> -->
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	
  </head>
  <body>

    <!-- Nav Bar -->
    <nav class="navbar navbar-inverse m-page-header">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Ticketing System</a>
        </div>


        <form class="navbar-form navbar-left" role="search">
          <div class="input-group">
            <input type="text" class="form-control m-input-search" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </span>
          </div>
        </form>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <?php if(isset($_SESSION["userId"])): ?>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION["username"]; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings</a></li>
                <li><a href="#">Administration</a></li>
                <li class="divider"></li>
                <li><a href="scripts/logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      <?php else: ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php">Login</a></li>
        <li><a href="signup.php">Signup</a></li>
      </ul>
      <?php endif; ?>
      </div><!-- /.container-fluid -->
    </nav>
    <div class="m-pageContent container">
