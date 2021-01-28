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
      $html = '';  
      while ($row = mysqli_fetch_assoc($res)) {
      	
      	   $html .='<option value="'.$row["id"].'">'.$row["name"].'</option>';
      
      }

      echo $html;

// print_r($arr);

 ?>