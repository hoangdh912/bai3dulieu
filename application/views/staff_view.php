<!DOCTYPE html>
<html lang="en"><head>
	<title>Staff list</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>jqueryUpload/js/vendor/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>jqueryUpload/js/jquery.fileupload.js"></script>
</head>
<body>
 	<div class="container">
 		<div class="text-xs-center">
 			<h3 class="dislay-3">Staff list</h3>
 		</div>
 	</div>

 	<div class="container">
 		<div class="row" id="content">


				<?php foreach ($resultData as $result): ?>
				<div class="col-sm-4">
					<div class="card">
					    <img class="card-img-top img-fluid" src="<?php echo $result['avatar']; ?>" alt="Card image cap">
					    <div class="card-body">
					      <h5 class="card-title name"><?php echo $result['name']; ?></h5>
					      <p class="card-text age">Age: <?php echo $result['age']; ?></p>
					      <p class="card-text phone">Phone: <?php echo $result['phone']; ?></p>
					      <p class="card-text order-number">Completed orders number: <?php echo $result['order_number']; ?></p>
					      <p class="card-text linkfb"><small><a href="<?php echo $result['linkfb']; ?>" class="btn btn-info btn-xs">Facebook</a></small></p>
					      <p class="card-text edit"><small><a href="<?php echo base_url(); ?>index.php/staff/staff_edit/<?php echo $result['id']; ?>" class="btn btn-warning btn-xs">Edit staff</a></small></p>
					      <p class="card-text delete"><small><a href="<?php echo base_url(); ?>index.php/staff/staff_delete/<?php echo $result['id']; ?>" class="btn btn-danger btn-xs">Delete staff</a></small></p>
					    </div>
			    	</div> <!-- End card -->
				</div>
			    

			    <?php endforeach ?>

 		</div>
		
		<div class="container">
	 		<div class="text-xs-center">
	 			<h3 class="dislay-3">Add new staff</h3>
	 		</div>
 		</div>


 			<!-- <form method="post" enctype="multipart/form-data" action="<?php //echo base_url(); ?>index.php/staff/staff_add"> -->
			  <div class="form-group row">
			    <label for="files[]" class="col-sm-4 form-control-label text-xs-right" >Avatar Image</label>
			    <div class="col-sm-8 text-xs-center">
			    	<input type="file" name="files[]" class="form-control" id="avatar" placeholder="Upload image">
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

			  <button type="button" class="btn btn-outline-success ajaxbutton">Add new</button>

			<!-- </form> -->

 	</div>
	
	<script>

		link = '<?php echo base_url(); ?>';

		$('#avatar').fileupload({
        dataType: 'json',
        url: link + 'index.php/staff/uploadFile',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                filename = file.url;
            });
        	}
    	});

		$('.ajaxbutton').click(function(event) {
			$.ajax({
			url: link + 'index.php/staff/ajax_add',
			type: 'POST',
			dataType: 'json',
			data: {
				name: $('#name').val(),
				age: $('#age').val(),
				phone: $('#phone').val(),
				avatar: filename,
				linkfb: $('#linkfb').val(),
				order_number: $('#order_number').val()
			},
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				
				content = '<div class="col-sm-4">';
				content += '<div class="card">';
				content += '<img class="card-img-top img-fluid" src="'+ filename +'" alt="Card image cap">';
				content += '<div class="card-body">';
				content += '<h5 class="card-title name">Name: '+ $('#name').val() + '</h5>';
				content += '<p class="card-text age">Age: '+ $('#age').val() + '</p>';
				content += '<p class="card-text phone">Phone: '+ $('#phone').val() + '</p>';
				content += '<p class="card-text order-number">Completed orders number: '+ $('#order_number').val() + '</p>';
				content += '<p class="card-text linkfb"><small><a href="'+ $('#linkfb').val() + '" class="btn btn-info btn-xs">Facebook</a></small></p>';
				content += '<p class="card-text edit"><small><a href="<?php echo base_url(); ?>index.php/staff/staff_edit/<?php echo $result['id']; ?>" class="btn btn-warning btn-xs">Edit staff</a></small></p>';
				content += '<p class="card-text delete"><small><a href="<?php echo base_url(); ?>index.php/staff/staff_delete/<?php echo $result['id']; ?>" class="btn btn-danger btn-xs">Delete staff</a></small></p>';
				content += '</div>';
				content += '</div> <!-- End card -->';
				content += '</div>';
				
				$('#content').append(content);
				//Reset form
				// name: $('#name').val();
				// age: $('#age').val();
				// phone: $('#phone').val();
				// linkfb: $('#linkfb').val();
				// order_number: $('#order_number').val();
				
			});

		});

		
		
	</script>

</body>
</html>