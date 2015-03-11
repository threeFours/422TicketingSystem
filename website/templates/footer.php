</div>
<div class="m-pageFooter">Copyright 2015</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	$('document').ready(function(){
	        var height = ($(window).height() - $('.m-pageFooter').height() - $('.m-page-header').height() - 20) + "px";
	        $(".m-pageContent").css("min-height", height);

	        $(window).resize(function(){
	        	var height = ($(window).height() - $('.m-pageFooter').height() - $('.m-page-header').height() - 20) + "px";
	        	$(".m-pageContent").css("min-height", height);
	        });
	    });
    </script>
  </body>
</html>