<?php 
include('config.php');
 
if(isset($_POST["submit"])){

	$name = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$image = $_FILES["image"]["name"];
	$temp = $_FILES["image"]["tmp_name"];
	$password = $_POST["password"];
    
    move_uploaded_file($temp, "upload/".$image);

	$sql = "insert into users (name,email,phone,image,password) values('$name','$email','$phone','$image','$password')";

	$result = mysqli_query($conn, $sql);

	if($result = true){
        echo "inserted";
	}else{
		echo "not inserted";
	}
}






?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
                 <h1>Add Users</h1>
         <form class="forms-sample" method="post" enctype="multipart/form-data">
			
              <label for="exampleInputName1">Name</label>
              <input type="text"  name="name" >

              <label for="exampleInputName1">Email</label>
              <input type="email"  name="email" >

              <label for="exampleInputName1">Phone</label>
              <input type="text"  name="phone" >

              <label for="exampleInputName1">Image</label>
              <input type="file"  name="image" >

              <label for="exampleInputName1">Password</label>
              <input type="text"  name="password">
 	            <br><br><br><br>
 	           <button type="submit" name="submit">Submit</button>

         </form>

 <br><br><br>
<button><a href="index.php" style="text-decoration: none">Back To Home Page</a></button>

</body>
</html>