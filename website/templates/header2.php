<?php session_start(); 

  // if(!isset($_SESSION["userId"])){
  //   if (basename($_SERVER['PHP_SELF']) != "login.php" || basename($_SERVER['PHP_SELF']) != "signup.php"){
  //     header("Location: /login.php");
  //   }
  // }

  if($_SESSION['isAdmin'] == 1){
    $dis = "";
  }else{
    $dis = "disabled";
  }

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
          <a class="navbar-brand" href="/">Ticketing System</a>
        </div>

        <ul class="nav navbar-nav">
          <li><a href="/tickets-and-queues.php"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Tickets & Queues</a></li>
          <li><a href="/create-ticket.php"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Create Ticket</a></li>
        </ul>


       <form class="navbar-form navbar-left" action="/search-results.php" method="GET" role="search">
          <div class="input-group">
            <input type="text" class="form-control m-input-search" name="search" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </span>
          </div>
        </form>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <?php if(isset($_SESSION["userId"])): ?>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  <?php echo $_SESSION["username"]; ?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/settings.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings</a></li>
                <li class="<?php echo $dis; ?>"><a href="admin.php"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Administration</a></li>
                <li><a href="/bookmarked-tickets.php"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> Bookmarked Tickets</a></li>
                <li class="divider"></li>
                <li><a href="scripts/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
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
