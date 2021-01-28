<?php
session_start();
$conn = mysqli_connect("localhost","root","","test");

if(isset($_POST['login'])){
	$sql = "SELECT * FROM test WHERE name='".$_POST['name']."' and password = '".$_POST['password']."'";
	$result = mysqli_query($conn,$sql);
	$user = mysqli_fetch_array($result);

	if($user){
          if(!empty($_POST['checkbox'])){
              setcookie("name",$_POST['name'],time()+ (10 * 365 * 24 * 60 * 60));
              setcookie("password",$_POST['password'],time()+ (10 * 365 * 24 * 60 * 60));
          }else{
          	if(isset($_COOKIE['name'])){
          		setcookie("name","");
          	}
          	if(isset($_COOKIE['name'])){
          		setcookie("password","");
          	}
              
             
          }
          header("location:logout.php");
	}else{
		$message = 'Invalied Login Detail';
	}
     
}

 ?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../file/bootstrap.min.css">
		<script type="text/javascript" src="../file/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="../file/bootstrap.bundle.min.js"></script>

</head>
<body>
	<div class="container mt-5" >
		<div class="row">
			<div class="col-md-8">
				<div class="alert alert-danger"><?php if(isset($message)){ echo $message;} ?></div>
			    <form method="post" id="frmLogin">
					  <div class="form-group">
					    <label for="Name">Name</label>
					    <input type="text" class="form-control" name="name"  placeholder="Enter name" id="name" value="<?php if(isset($_COOKIE['name'])){ echo $_COOKIE['name'];} ?>">
					  </div>
					  <div class="form-group">
					    <label for="Password">Password</label>
					    <input type="text" class="form-control" name="password"  placeholder="Enter password" id="password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];} ?>">
					  </div>
					 
					  <div class="form-group form-check">
					    <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox" <?php if(isset($_COOKIE['name'])){ ?> checked   <?php } ?>>
					    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
					  </div>
				      <button type="submit"  name="login" id="login" class="btn btn-success">Submit</button>
			    </form>

				
			</div>
		</div>
	</div>
</body>
</html>



