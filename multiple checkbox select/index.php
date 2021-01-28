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
				<form method="post">
				  <div class="form-check" id="frmid">
				    <p><input type="checkbox" class="form-check-input" name="language[]" value="c++">c++</p>
				    <p><input type="checkbox" class="form-check-input" name="language[]" value="php">php</p>
				    <p><input type="checkbox" class="form-check-input" name="language[]" value="javascript">javascript</p>
				    <p><input type="checkbox" class="form-check-input" name="language[]" value="python">python</p>
				    <p><input type="checkbox" class="form-check-input" name="language[]" value="jquery">jquery</p>
				    <p><input type="checkbox" class="form-check-input" name="language[]" value="ajaxc">ajax</p>


				    
				  </div>
				  <button type="submit" name="submit" id="button" class="btn btn-primary">Submit</button>
				</form>

				
			</div>
		</div>
	</div>
</body>
</html>


 <?php 

if(isset($_POST["submit"])){
	if(!empty($_POST["language"])){

		echo "<h1>You Selected Following Language</h1>";
		foreach ($_POST["language"] as $key => $value) {
			// echo '<script>alert("'.$value.'")</script>';
			// echo '<input type="text" class="form-check-input" name="language" value="ajaxc">';
             echo $value."</br>";
		}
	}else{
		
		echo 'Selected at least one value';
	}  
}


 ?>