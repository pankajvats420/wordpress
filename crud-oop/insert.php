<?php 
  require("functions.php");

  if(isset($_POST["submit"])){
  	$name = $_POST["name"];
  	$email = $_POST["email"];
  	$phone = $_POST["phone"];
    $image = $_FILES["image"]["name"];
	$tmp_name = $_FILES["image"]["tmp_name"];
  	$password = $_POST["password"];
  
  	if($name !=""){
  		 $obj = new database();
  		 $obj->insert($name,$email,$phone,$image,$password,$tmp_name);
  	}

  

  }

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="file/bootstrap.min.css">
		<script type="text/javascript" src="file/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="file/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="file/sweetalert2.all.min.js"></script>
	
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			
			<div class="col-md-12">
				<div class="card">
				  <div class="card-header">
				    <h5 class="card-title" style="margin-bottom: -24px;">Insert Record</h5>
				    <a href="index.php" class="btn btn-success float-right">Back To Home Page</a>
				  </div>
				  <div class="card-body">
					    <form method="post" enctype="multipart/form-data">
						  <div class="form-group row">
						    <label for="name" class="col-md-2 col-form-label">Name</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="name" name="name">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="email" class="col-sm-2 col-form-label">Email</label>
						    <div class="col-sm-10">
						      <input type="email" class="form-control" id="email" name="email">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
						    <div class="col-sm-10">
						      <input type="number" class="form-control" id="phone" name="phone">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="image" class="col-sm-2 col-form-label">Image</label>
						    <div class="col-sm-2">
						      <input type="file" class="form-control" id="image" name="image">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="password" class="col-sm-2 col-form-label">Password</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="password" name="password">
						    </div>
						  </div>

						  <div class="form-group row">
						    <div class="col-sm-10">
						      <button type="submit" name="submit" class="btn btn-primary">Insert Record</button>
						    </div>
						  </div>
                        </form>
				 </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>



