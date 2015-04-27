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
        <li><a href="password.php">Password</a></li>
        <li class="active"><a href="#">Replacement<span class="sr-only">(current)</span></a></li>
    </ul>
  </div>
</nav>

<!-- Email Regular Expression HTML -->
<h1 class="col-lg-offset-2">Example 3 (Replacing Text Within a String)</h1>
<div class="col-lg-offset-3">
      <br><br>
      
    </div>
    

<!-- Email Regular Expression JS -->

    <!-- Input group -->
    <div class="row">
      <form id="jsForm" method="post" action="">
        <br><br><br>
        <div class="col-lg-6 col-lg-offset-3">
          <h4><strong>JavaScript RE Pattern:</strong>&nbsp;</h4>
          <h4>var pattern = /[ ( ].*[ ) ]/</h4>
          <div class="input-group">
            <input type="text" class="form-control" id="inputTextJS" placeholder="Enter a string ..." >
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
          <h4>$pattern ="/[ ( ].*[ ) ]/"</h4>
          <div class="input-group">
            <input type="text" class="form-control" name="inputText" placeholder="Enter a string ..." >
            <span class="input-group-btn">
            <input name="submitted" value="1" hidden />
              <input class="btn btn-default" type="submit" value="Test">
            </span>
          </div><!-- /input-group -->
        </div>
      </form>
    </div>
    <?php 
		
		// Set the Regular Expression and remove it from message. 		
		if(isset($_POST['submitted'])){
			
			$pattern = "/[(].*[)]/";
		
			$message = preg_replace($pattern, "", $_POST['inputText']);
	
			echo "<script> alert('(PHP) ".$message."'); </script>";
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
		var patt = /[(].*[)]/;
		
		var str = $('#inputTextJS').val();
		
		var newStr = str.replace(patt, "");
		
		alert('(JavaScript) '+newStr);
		
		
        e.preventDefault();
      });
    });
  </script>
  </body>
</html>