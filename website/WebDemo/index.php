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
        <li class="active"><a href="#">Email <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
    </ul>
  </div>
</nav>

<!-- Email Regular Expression HTML -->

    <h1 class="col-lg-offset-2">Example 1 (Email Validation with HTML)</h1>
    <div class="col-lg-offset-3">
      <br><br>
      <h4><strong>Example Valid Email:</strong> email301@uic.edu</h4>
      <br>
      <h4><strong>Regular expression for Email:</strong> (AN._)<sup>+</sup>@(AN.-)<sup>+</sup>.(AA U AAA)</h4>
      <p> A = Letters</p>
      <p> N = Numbers</p>
      <br>
      <h4><strong>HTML RE Pattern:</strong> pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"</h4>
    </div>

    <div class="row">
      <form method="post" action="">
        <br><br><br>
        <div class="col-lg-6 col-lg-offset-3">
          <div class="input-group">
            <input type="text" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Enter a valid email address..." >
            <span class="input-group-btn">
              <input class="btn btn-default" type="submit" value="Test">
            </span>
          </div><!-- /input-group -->
        </div>
      </form>
    </div>
    <br/><br/><hr/><br/><br/>

<!-- Email Regular Expression JS -->

    <h1 class="col-lg-offset-2">Example 2 (Email Validation with JavaScript)</h1>
    <div class="col-lg-offset-3">
      <br><br>
      <h4><strong>Example Valid Email:</strong> email301@uic.edu</h4>
      <br>
      <h4><strong>Regular expression for Email:</strong> (AN._)<sup>+</sup>@(AN.-)<sup>+</sup>.(AA U AAA)</h4>
      <p> A = Letters</p>
      <p> N = Numbers</p>
      <br>
      <h4><strong>JavaScript RE Pattern:</strong> pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"</h4>
    </div>
    <!-- Input group -->
    <div class="row">
      <form id="jsForm" method="post" action="">
        <br><br><br>
        <div class="col-lg-6 col-lg-offset-3">
          <div class="input-group">
            <input type="text" class="form-control" name="emailJS" placeholder="Enter a valid email address..." >
            <span class="input-group-btn">
              <input class="btn btn-default" type="submit" value="Test">
            </span>
          </div><!-- /input-group -->
        </div>
      </form>
    </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $('document').ready(function(){
      $('#jsForm').submit(function(e){
        alert('holup');
        e.preventDefault();
      });
    });
  </script>
  </body>
</html>