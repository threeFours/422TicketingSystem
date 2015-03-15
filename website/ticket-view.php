<!--Include the page header -->
<?php require_once('templates/header2.php'); ?>

<form>
<div class="row">
	<div class="col-sm-6">
		<h2>Information</h2>
		<hr />
		<label>Name: </label>
		TH 216 - Projector Flickering
		<br /><label>Creator: </label>
		aschla4
		<br /><label>CC: </label>
		mcarmi4
		<br /><label>Room: </label>
		TH 216
		<br /><label>Date created: </label>
		3/13/15 04:36 PM
		<br /><label>Last modified: </label>
		3/14/15 12:20 PM
		<br><br>
	</div>
	<div class="col-sm-6">
		<h2>History</h2>
		<hr>
		<div class="list-group" id="list-group-scrollable">
			<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">3/13/15 4:36 PM - Alexander Schlake</h4>
			<p class="list-group-item-text">An instructor reported the projector occasionally flickers when using the built-in PC source.</p>
			</a>
			<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">3/13/15 5:20 PM - John McDermott</h4>
			<p class="list-group-item-text">The flickering also occurs from all other sources.</p>
			</a>
			<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">3/14/15 8:36 AM - Isaias Hernandez</h4>
			<p class="list-group-item-text">The transmitters in the lectern and on the projector were reset. The system ran for 20 minutes on all sources without issue. We will watch this for the time being.</p>
			</a>
			<a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">3/14/15 12:20 PM - Diego Sanchez</h4>
			<p class="list-group-item-text">We received another report of the flickering. Further testing is required.</p>
			</a>
		</div>
		<hr>
		<div id="addMessage">
		<textarea class="form-control" rows="5"></textarea><br />
		<button type="button" class="btn btn-default btn-lg" onClick="addMessage()">Add message</button>
		</div>
		
	</div>
</div>
</div>
</form>



<!-- Include the page footer -->
<?php require_once('templates/footer.php'); ?>