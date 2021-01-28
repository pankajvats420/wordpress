<?php 
  require("functions.php");
  
  $fetchdata = new database();
  $users = $fetchdata->fetchdata();


    if(isset($_GET["id"]) && $_GET['id'] > 0){

   	    $obj = new database();
   	    $obj->delete($_GET['id']);
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
	

</header>


<?php
   echo '<script type="text/javascript">
       myFn();
      </script>';
?>

</head>
<body>
	<div class="container">
		<div class="row mt-5">
			
			<div class="col-md-12">
				<div class="card">
				  <div class="card-header">
				    <h5 class="card-title" style="margin-bottom: -24px;">All User List</h5>
				    <a href="insert.php" class="btn btn-primary float-right">Add New User</a>
				  </div>
				  <div class="card-body">
					    <table class="table table-bordered">
						  <thead>
						    <tr>
						      <th scope="col">Name</th>
						      <th scope="col">Email</th>
						      <th scope="col">Phone</th>
						      <th scope="col">Image</th>
						      <th scope="col">Password</th>
						      <th scope="col" class="text-center">Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php if(count($users) >0){
                                foreach ($users as $key => $user) {
						  	 ?>
						    <tr>
						      <td><?php echo  $user["name"]; ?></td>
						      <td><?php echo  $user["email"]; ?></td>
						      <td>@<?php echo $user["phone"]; ?></td>
						      <td style="width: 280px;" class="text-center"><img  src="upload/<?php echo $user["image"]; ?>" style="width: 30%"></td>
						      <td><?php echo $user["password"]; ?></td>
						      <td>
						      	<a href="update.php?id=<?php echo  $user["id"]; ?>" class="btn btn-success mr-3" >Edit</a>
						      	<a href="index.php?id=<?php echo  $user["id"]; ?>"  class="btn btn-danger">Delete</a>
						      </td>
						    </tr>
						<?php } }else{ ?>
                              <tr>No Data Found</tr>
						<?php  } ?>
						  </tbody>
						</table>
				 </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>



