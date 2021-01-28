<?php 
$conn = mysqli_connect("localhost","root","","test");



    $res  = mysqli_query($conn,"select id from test");

    while ($row = mysqli_fetch_assoc($res)) {
    	echo "<pre>";
    	print_r($row);
    	// echo $row;
    	echo "</pre>";
    }

?>