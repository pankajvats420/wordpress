<?php

if(isset($_POST['submit'])){


	echo $_POST['name'];
}





?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



<form method="POST">
	
	<label>Name</label>
	<input type="text" name="name">
	<input type="submit" name="submit">
</form>

</body>
</html>