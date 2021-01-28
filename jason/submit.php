<?php
require("db.php");

 // $id = $_POST["id"];
 // $type = $_POST["type"];

	

	   $sql = "select * from states";



      $res = mysqli_query($conn, $sql);

      $data = array();
      while ($row = mysqli_fetch_assoc($res)) {
      	  $data[] = $row;
      }

       

      //   $data1 = array();
      // foreach ($data as $key => $value) {
      
      //        $data1[] = $value["name"];
      //        $data1[] = $value["id"];
      // }


      // echo "<pre>";
      // print_r($data1);

     $jason =  json_encode($data);

      echo "<pre>";
      print_r($jason);


 ?>