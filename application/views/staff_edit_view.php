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
 		
		<div class="container">
	 		<div class="text-xs-center">
	 			<h3 class="dislay-3">Edit staff</h3>
	 		</div>
 		</div>


 			<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/staff/staff_update/">

			  <?php foreach ($resultData as $result): ?>
			  	
			  <div class="form-group row">
			    <label for="avatar" class="col-sm-4 form-control-label text-xs-right" >Avatar Image</label>
			    <div class="col-sm-8 text-xs-center">
			    	<div class="row">
			    		<div class="col-sm-6">
			    			<img src="<?php echo $result['avatar']; ?>" alt="" class="img-fluid">
			    		</div>
			    	</div>

			    	<!-- Get id of staff -->
			    	<input type="hidden" name="id" value="<?php echo $result['id']; ?>">
					<!-- Get new avatar link-->
					<input type="hidden" name="avatar2" value="<?php echo $result['avatar']; ?>">

			    	<input type="file" name="avatar" class="form-control" id="avatar" placeholder="Upload image">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="name" class="col-sm-4 form-control-label text-xs-right" >Staff name</label>
			    <div class="col-sm-8 text-xs-center">
			    	<input type="text" name="name" class="form-control" id="name" placeholder="Add staff name" value="<?php echo $result['name']; ?>">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="age" class="col-sm-4 form-control-label text-xs-right" >Staff age</label>
			    <div class="col-sm-8 text-xs-center">
			    	<input type="number" name="age" class="form-control" id="age" placeholder="Add staff age" value="<?php echo $result['age']; ?>">
			    </div>
			  </div>
				
			  <div class="form-group row">
			    <label for="phone" class="col-sm-4 form-control-label text-xs-right" >Staff phone</label>
			    <div class="col-sm-8 text-xs-center">
			    	<input type="number" name="phone" class="form-control" id="phone" placeholder="Add staff phone" value="<?php echo $result['phone']; ?>">
			    </div>
			  </div>
			  
			  <div class="form-group row">
			    <label for="order_number" class="col-sm-4 form-control-label text-xs-right" >Done orders number</label>
			    <div class="col-sm-8 text-xs-center">
			    	<input type="number" name="order_number" class="form-control" id="order_number" placeholder="Add staff done orders number" value="<?php echo $result['order_number']; ?>">
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="linkfb" class="col-sm-4 form-control-label text-xs-right" >Link FB</label>
			    <div class="col-sm-8 text-xs-center">
			    	<input type="text" name="linkfb" class="form-control" id="linkfb" placeholder="Add staff done orders number" value="<?php echo $result['linkfb']; ?>">
			    </div>
			  </div>	
			
			  <div class="form-group row text-xs-center">
			  	<div class="col-sm-offset-2 col-sm-10">
			  		<button type="submit" class="btn btn-outline-success">Save</button>
			  	</div>
			  </div>	
			  

			  <?php endforeach ?>

			</form>


 		

 	</div>

</body>
</html>