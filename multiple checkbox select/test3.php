<?php 

// echo date('d-m-Y h:i:s');

function show($string){

	echo "<pre>";
    print_r($string);
	echo "</pre>";
}



$cars=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");


$a = array(
  array(
    'id' => 5698,
    'first_name' => 'Peter',
    'last_name' => 'Griffin',
  ),
  array(
    'id' => 4767,
    'first_name' => 'Ben',
    'last_name' => 'Smith',
  ),
  array(
    'id' => 3809,
    'first_name' => 'Joe',
    'last_name' => 'Doe',
  )
);


$fname=array("Peter","Joe","Ben");
$age=array("35","37","43");


// $string = array_change_key_case($cars,CASE_UPPER);
//Array ( [PETER] => 35 [BEN] => 37 [JOE] => 43 )


 //$string = array_chunk($cars,1);

// Array
// (
//     [0] => Array
//         (
//             [0] => 35
//         )

//     [1] => Array
//         (
//             [0] => 37
//         )

//     [2] => Array
//         (
//             [0] => 43
//         )

// )

//$string = array_column($a, "last_name");

// Array
// (
//     [0] => Griffin
//     [1] => Smith
//     [2] => Doe
// )

// $string = array_column($a, "first_name","last_name","id");

// Warning: array_column() expects at most 3 parameters, 4 given in C:\xampp\htdocs\pankaj\weblesson\multiple checkbox select\test3.php on line 70



 // $string = array_combine($fname,$age);
// Array
// (
//     [Peter] => 35
//     [Ben] => 37
//     [Joe] => 43
// )

//   $string = array_combine($cars,$a);

// Array
// (
//     [35] => Array
//         (
//             [id] => 5698
//             [first_name] => Peter
//             [last_name] => Griffin
//         )

//     [37] => Array
//         (
//             [id] => 4767
//             [first_name] => Ben
//             [last_name] => Smith
//         )

//     [43] => Array
//         (
//             [id] => 3809
//             [first_name] => Joe
//             [last_name] => Doe
//         )

// )

// $a = array("A","Cat","Dog","A","Dog");
// $string = array_count_values($a );
// Array
// (
//     [A] => 2
//     [Cat] => 1
//     [Dog] => 2
// )

// $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
// $a2=array("e"=>"red","f"=>"green","g"=>"blue");

//  $string = array_diff($a1,$a2);
// Array
// (
//     [d] => yellow
// )

// $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
// $a2=array("e"=>"red","f"=>"green","g"=>"blue","h" =>"futgfjvfg");

//  $string = array_diff($a1,$a2);
// Array
// (
//     [d] => yellow
// )

// $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
// $a2=array("e"=>"red","f"=>"black","g"=>"purple");
// $a3=array("a"=>"red","b"=>"black","h"=>"yellow");

// $string = array_diff($a1,$a2,$a3);
// Array
// (
//     [b] => green
//     [c] => blue
// )


// Compare the keys and values of two arrays, and return the differences:
// $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
// $a2=array("a"=>"red","b"=>"green","c"=>"blue");


// $string = array_diff_assoc($a1,$a2);

// Array
// (
//     [d] => yellow
// )

// Compare the keys of two arrays, and return the differences:
// $a1=array("a"=>"red","b"=>"green","c"=>"blue");
// $a2=array("a"=>"red","c"=>"blue","d"=>"pink");

// $string = array_diff_assoc($a1,$a2);
// Array
// (
//     [b] => green
// )

// Compare the keys and values of two arrays (use a user-defined function to compare the keys), and return the differences:
function myfunction($a,$b)
{
if ($a===$b)
  {
  return 0;
  }
  return ($a>$b)?1:-1;
}

$a1=array("a"=>"red","b"=>"green","c"=>"blue");
$a2=array("d"=>"red","b"=>"green","e"=>"blue");

$string = array_diff_uassoc($a1,$a2,"myfunction");






































show($string);

?>