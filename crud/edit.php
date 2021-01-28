<?php 
include('config.php');
$name="";
$email="";
$phone="";
$image="";
$password="";

if(isset($_GET["id"]) && $_GET["id"] > 0){
	$id = $_GET["id"];
	$sql = "select * from users where id = '$id'";

	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
    
    $name=$row['name'];
    $email=$row['email'];
    $phone=$row['phone'];
    $image=$row['image'];
    $password=$row['password'];
	
}
 
if(isset($_POST["update"])){

	$name = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$image = $_FILES["image"]["name"];
	$temp = $_FILES["image"]["tmp_name"];
	$password = $_POST["password"];

move_uploaded_file($temp, "upload/".$image);

	$sql = "update users set name='$name', email='$email', phone = '$phone', image='$image' , password= '$password'";

	$result = mysqli_query($conn, $sql);

	if($result = true){
        echo "updated";
	}else{
		echo "not updated";
	}
}






?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
           <h1>Edit Users</h1>
         <form class="forms-sample" method="post" enctype="multipart/form-data">
			
              <label for="exampleInputName1">Name</label>
              <input type="text"  name="name" value="<?php echo $name; ?>">

              <label for="exampleInputName1">Email</label>
              <input type="email"  name="email" value="<?php echo $email; ?>">

              <label for="exampleInputName1">Phone</label>
              <input type="text"  name="phone" value="<?php echo $phone; ?>">

              <label for="exampleInputName1">Image</label>
              <input type="file"  name="image" value="<?php echo $image; ?>">
              <p><img src="upload/<?php echo $image;?>" width="20%"></p>

              <label for="exampleInputName1">Password</label>
              <input type="text"  name="password" value="<?php echo $password; ?>">

 	            
 	           <button type="submit" name="update">Submit</button>

         </form>

 <br><br><br>
<button><a href="index.php" style="text-decoration: none">Back To Home Page</a></button>

</body>
</html>