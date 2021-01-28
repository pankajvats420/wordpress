<?php
require("db.php");

 $id = $_POST["id"];
 $type = $_POST["type"];

	 if($type == "country"){

	 	  $sql = "select * from states where country_id ='$id'";
	 }else{
	 	
	      $sql = "select * from cities where state_id ='$id'";
	 }

      $res = mysqli_query($conn, $sql);

      $data = array();
      while ($row = mysqli_fetch_assoc($res)) {
      	  $data[] = $row;
      }

      echo json_encode($data);
 ?>