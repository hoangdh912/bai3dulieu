<!DOCTYPE html>
<html lang="en"><head>
	<title>Staff list</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 	<script type="text/javascript" src="1.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="1.css">
</head>
<body >
 	<div class="container">
 		<div class="text-xs-center">
 			<h3 class="dislay-3">Staff list</h3>
 		</div>
 	</div>

 	<div class="container">
 		<div class="row">
 			<div class="card-columns">
			    <div class="card">
				    <img class="card-img-top img-fluid" src="http://placehold.it/400x400" alt="Card image cap">
				    <div class="card-body">
				      <h5 class="card-title name">Hoang</h5>
				      <p class="card-text age">Age:30</p>
				      <p class="card-text phone">Phone:123456789</p>
				      <p class="card-text order-number">Completed orders number</p>
				      <p class="card-text linkfb"><small><a href="#linkfb" class="btn btn-info btn-xs">Facebook</a></small></p>
				      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				    </div>
			    </div>
			</div> <!-- End card columns -->
 		</div>
		
		<div class="container">
	 		<div class="text-xs-center">
	 			<h3 class="dislay-3">Add new staff</h3>
	 		</div>
 		</div>


 			<form method="post" enctype="multipart/form-data" action="<?php base_url() ?>staff/staff_add">
			  <div class="form-group row">
			    <label for="avatar" class="col-sm-4 form-control-label text-xs-right" >Avatar Image</label>
			    <div class="col-sm-8 text-xs-center">
			    	<input type="file" name="avatar" class="form-control" id="avatar" placeholder="Upload image">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="name" class="col-sm-4 form-control-label text-xs-right" >Staff name</label>
			    <div class="col-sm-8 text-xs-center">
			    	<input type="text" name="name" class="form-control" id="name" placeholder="Add staff name">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="age" class="col-sm-4 form-control-label text-xs-right" >Staff age</label>
			    <div class="col-sm-8 text-xs-center">
			    	<input type="number" name="age" class="form-control" id="age" placeholder="Add staff age">
			    </div>
			  </div>
				
			  <div class="form-group row">
			    <label for="phone" class="col-sm-4 form-control-label text-xs-right" >Staff phone</label>
			    <div class="col-sm-8 text-xs-center">
			    	<input type="number" name="phone" class="form-control" id="phone" placeholder="Add staff phone">
			    </div>
			  </div>
			  
			  <div class="form-group row">
			    <label for="order_number" class="col-sm-4 form-control-label text-xs-right" >Done orders number</label>
			    <div class="col-sm-8 text-xs-center">
			    	<input type="number" name="order_number" class="form-control" id="order_number" placeholder="Add staff done orders number">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="linkfb" class="col-sm-4 form-control-label text-xs-right" >Link FB</label>
			    <div class="col-sm-8 text-xs-center">
			    	<input type="text" name="linkfb" class="form-control" id="linkfb" placeholder="Add staff done orders number">
			    </div>
			  </div>	

			  <button type="submit" class="btn btn-outline-success">Add new</button>

			</form>


 		

 	</div>

</body>
</html>