<?php 
require("functions.php");
 if(isset($_GET["id"]) && $_GET['id'] > 0){

   	    $obj = new database();
   	    $obj->delete($_GET['id']);
   }




?>