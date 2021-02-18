<?php



   $param = isset($_REQUEST["param"]) ? $_REQUEST["param"] :"";

     if(!empty($param)){

	     	if($param = "contact"){

	     		 $name = isset($_REQUEST["name"]) ? $_REQUEST["name"] :"";
	     		 $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] :"";
	     		 $subject = isset($_REQUEST["subject"]) ? $_REQUEST["subject"] :"";
	     		 $image = isset($_REQUEST["image"]) ? $_REQUEST["image"] :"";
	     		 $message = isset($_REQUEST["message"]) ? $_REQUEST["message"] :"";


	     		 global $wpdb;

	     		 $sql = $wpdb->insert("wp_form",array(
                                     "name" => $name,
                                     "email" => $email,
                                     "subject" => $subject,
                                     "image" => $image,
                                     "message" => $message         
	     		 ));

	     		 if($wpdb->insert_id > 0){

                           $arr = array("status" =>1,"msg" => "Data Inserted Succesfully");
	     		 }else{

                      $arr = array("status" =>0 ,"msg" => "Something Went Wrong");
	     		 }


	     		 echo json_encode($arr);

	     	}

    }






 ?>