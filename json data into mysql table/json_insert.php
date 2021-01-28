<?php 
$conn = mysqli_connect("localhost","root","","json_data");

if($conn !=""){
	echo "connected";
}

$filename = "employe_data.json";

$data = file_get_contents($filename);



$array = json_decode($data,true);   //convert json data into php array by json_decode

foreach ($array as $key => $value) {
	
	  $sql ="INSERT INTO json_table(name,gender,designation
              ) VALUES('".$value['name']."','".$value['gender']."','".$value['designation']."')";
       $insert = mysqli_query($conn,$sql);
}

if($insert > 0){
	echo "data inseted succesfully";
}


// echo "<pre>";
//    print_r($array);
//     echo "</pre>";

?>