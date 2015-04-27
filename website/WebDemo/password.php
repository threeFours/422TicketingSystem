<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>

<!-- NAV MENU -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <h4>301 Presentation</h4>
      </a>
    </div>
    <ul class="nav navbar-nav">
    	<li><a href="/">Email</a></li>
        <li class="active"><a href="#">Password<span class="sr-only">(current)</span></a></li>
        <li><a href="replacing-text.php">Email</a></li>
    </ul>
  </div>
</nav>

<!-- Email Regular Expression HTML -->
<h1 class="col-lg-offset-2">Example 2 (Password Validation with HTML)</h1>
<div class="col-lg-offset-3">
      <br><br>
      <h4><strong>Example Valid Password:</strong> PassWord2015</h4>
      <p> • At least one capital letter</p>
      <p> • At least one lower-case letter</p>
      <p> • At least one number letter</p>
      <p> •&nbsp;At least 8 characters long</p>
      <br>
      <h4><strong>Regular expression for Email:</strong> (AN._)<sup>+</sup>@(AN.-)<sup>+</sup>.(AA U AAA)</h4>
      <p> A = Letters</p>
      <p> N = Numbers</p>
      <br>
      
    </div>

    <div class="row">
      <form method="post" action="">
        
        <div class="col-lg-6 col-lg-offset-3">
          <h4><strong>HTML RE Pattern:</strong>&nbsp;</h4>
          <h4>pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"</h4>
          <div class="input-group">
            <input type="text" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Enter a valid password ..." >
            <span class="input-group-btn">
              <input class="btn btn-default" type="submit" value="Test">
            </span>
          </div><!-- /input-group -->
        </div>
      </form>
    </div>
    

<!-- Email Regular Expression JS -->

    <!-- Input group -->
    <div class="row">
      <form id="jsForm" method="post" action="">
        <br><br><br>
        <div class="col-lg-6 col-lg-offset-3">
          <h4><strong>JavaScript RE Pattern:</strong>&nbsp;</h4>
          <h4>var pattern = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/"</h4>
          <div class="input-group">
            <input type="text" class="form-control" id="passwordJS" placeholder="Enter a valid password ..." >
            <span class="input-group-btn">
              <input class="btn btn-default" type="submit" value="Test">
            </span>
          </div><!-- /input-group -->
        </div>
      </form>
    </div>
    
<!-- Email Regular Expression PHP -->

    <!-- Input group -->
    <div class="row">
      <form id="phpForm" method="post" action="">
        <br><br><br>
        <div class="col-lg-6 col-lg-offset-3">
          <h4><strong>PHP RE Pattern:</strong>&nbsp;</h4>
          <h4>$pattern ="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/"</h4>
          <div class="input-group">
            <input type="text" class="form-control" name="passwordPHP" placeholder="Enter a valid password ..." >
            <span class="input-group-btn">
            <input name="submitted" value="1" hidden />
              <input class="btn btn-default" type="submit" value="Test">
            </span>
          </div><!-- /input-group -->
        </div>
      </form>
    </div>
    <?php 
		
		// Set the Regular Expression and test the input to see if it matches. 
		$pattern = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/";
		
		if(isset($_POST['submitted'])){
			$message = "(PHP) You entered a invalid pass!";
			echo "here";
			if (preg_match($pattern, $_POST['passwordPHP'])) {
				$message = "(PHP) You entered a valid password!";
			}
			echo "<script> alert('".$message."'); </script>";
			//echo $message;
		}
	
	?>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $('document').ready(function(){
      $('#jsForm').submit(function(e){
		
		// Set the Regular Expression and test the input to see if it matches. 
		var patt = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
		
		if(patt.test($('#passwordJS').val())){
			alert("(JavaScript) You entered a valid password!");	
		}else{
			alert("(JavaScript) You entered a invalid password!");
		}
		
        e.preventDefault();
      });
    });
  </script>
  </body>
</html>