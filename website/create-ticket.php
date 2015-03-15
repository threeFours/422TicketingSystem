<!--Include the page header -->
<?php require_once('templates/header2.php'); ?>

<!-- Content of page goes here -->

<ol class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li class="active">Create Ticket</li>
</ol>

<form>
<div class="row">
	<div class="col-sm-6">
		<h2>Information</h2>
		<hr><br><br>
		<label>Creator</label>
		<input type="text" class="form-control" name="creator">
		<label>CC</label>
		<input type="text" class="form-control" name="creator">
		<label>Name</label>
		<input type="text" class="form-control" name="creator">
		<br><br>
	</div>
	<div class="col-sm-6">
		<h2>Message</h2>
		<hr><br><br>
		<label>Message</label>
		<textarea name="message" class="form-control" rows="10"></textarea>
		<br><br>
		<label>Attach a File</label>
		<input type="file" name="file" />
		<br><br>
	</div>
</div>
<div class="row">
	<div class="col-xs-12" style="text-align:center">
		<input type="submit" class="btn btn-primary btn-lg" value="Create Ticket">
		<br><br>
	</div>
</div>
</form>



<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>