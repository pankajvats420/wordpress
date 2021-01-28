<?php

// function findsum($num){

//    $sum = 0;
//    for ($i=0; $i <= $num ; $i++) { 
   	
//    	  $sum = $sum + $i;
//    }

//    echo "The Sum Is:".$sum;


// }

// findsum($num=5);

// $num = 200;
// for ($i=2; $i < $num ; $i++) { 
//           $flag = "ok"; 
// 	for ($j=2; $j < $i ; $j++) { 
// 		if($i%$j == 0){
// 			$flag = "not ok";
// 			break;
// 		}
// 	}

// 	if($flag == "ok"){
		
// 		echo "The Prime Number Is:".$i."<br>";
// 	}
// }



    $num = "";
if(isset($_POST["submit"])){
	$num = $_POST["num"];

    $flag = "ok"; 
	for ($j=2; $j < $num ; $j++) { 
		if($num%$j == 0){
			$flag = "not ok";
			break;
		}
	}

	if($flag == "ok"){
		
		echo "The:&nbsp; ".$num."is &nbsp;Prime Number";
	}
}



?>


<form method="post">
	<input type="text" name="num">
	<input type="submit" name="submit" value="submit">
</form>