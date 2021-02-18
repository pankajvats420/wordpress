<?php 
session_start();


$param = isset($_REQUEST['param']) ? $_REQUEST['param'] :"";


        if(!empty($param)){
        	global $wpdb;
            if($param == "user_register"){
	             $name = isset($_REQUEST['name']) ? $_REQUEST['name'] :"";
	             $email = isset($_REQUEST['email']) ? $_REQUEST['email'] :"";
	             $password = isset($_REQUEST['password']) ? $_REQUEST['password'] :"";
	             $mobile = isset($_REQUEST['mobile']) ? $_REQUEST['mobile'] :"";
	             $type = isset($_REQUEST['type']) ? $_REQUEST['type'] :"";
	             
	             $find_user = $wpdb->get_row(
	                                $wpdb->prepare(
	                                        "SELECT * from wp_pkj_user WHERE email = %s", $email
	                                )
	                         );

	             if(!empty($find_user )){

	             	json(0,"", array("form_msg" => "***user already exist***"));
	             }elseif(empty($find_user )){

                   $wpdb->insert("wp_pkj_user",array(

                        "name" => $name,
                        "email" => $email,
                        "mobile" => $mobile,
                        "password" => $password
                       
                             ));
 
                       if($wpdb->insert_id > 0){
                          json(1,"", array("form_msg" => "***user created  successfully***"));
                            
                         }
	             }
             
                   
                     
            }elseif($param == "user_login"){

            	$user_email = isset($_REQUEST['user_email']) ? $_REQUEST['user_email'] :"";
	            $user_password = isset($_REQUEST['user_password']) ? $_REQUEST['user_password'] :"";

                if(!empty($user_email && $user_password)){
                	$find_user = $wpdb->get_row(
	                                $wpdb->prepare(
	                                        "SELECT * from wp_pkj_user WHERE email = %s
	                                        AND password = %d", $user_email,$user_password
	                                )
	                         );

                	if(!empty($find_user)){

                		$_SESSION["FOOD_USER_EMAIL"] = $find_user->email;
                    $_SESSION["FOOD_USER_ID"] = $find_user->id;
                    $_SESSION["FOOD_USER_NAME"] = $find_user->name;
                         $productUrl = home_url('/product/');
                	  json(1,"Hello ".$_SESSION["FOOD_USER_NAME"]." Welcome To Our Resturant",array("productUrl" =>$productUrl));
                    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){

                            foreach ($_SESSION['cart'] as $key => $value) {
                                
                               manageUserCart($_SESSION["FOOD_USER_ID"],$value["qty"],$key);
                            
                            }
                        }


                	}elseif(empty($find_user)){

                		json(0,"", array("form_login_msg" => "***fill correct detail***"));
                	}

                }else{
                	json(0,"", array("form_login_msg" => "***fill detail***"));
                }

            }elseif($param == "add_to_cart"){
                    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] :"";

                    if($type == "add"){
                       $qty = isset($_REQUEST['qty']) ? $_REQUEST['qty'] :"";
                       $attr = isset($_REQUEST['attr']) ? $_REQUEST['attr'] :""; 

                       if(isset($_SESSION['FOOD_USER_ID'])){
                          $uid=$_SESSION['FOOD_USER_ID'];
                          manageUserCart($uid,$qty,$attr);
                          
                        }else{
                          $_SESSION['cart'][$attr]['qty']=$qty;
                          if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
                           

                           }

                        }
                        $getUserFullCart=getUserFullCart();
                        $totalPrice=0;
                        foreach($getUserFullCart as $list){
                                $totalPrice=$totalPrice+($list['qty']*$list['price']);
                        }
                        
                        $getDishDetail=getDishDetailById($attr);
                        $price=$getDishDetail[0]['price'];
                        $dish=$getDishDetail[0]['dish'];
                        $image=$getDishDetail[0]['image'];

                        
                        $totaDish=count(getUserFullCart());
                        
                        json(1,"Dish Added successfully",array('totalCartDish'=>$totaDish,'totalPrice'=>$totalPrice,'price'=>$price,'dish'=>$dish,'image'=>$image,'qty' =>$qty));
                    } 

            }elseif($param == "add_to_cart_delete"){
                    $attr = isset($_REQUEST['attr']) ? $_REQUEST['attr'] :"";
                    removeDishFromCartByid($attr);
                    $getDishDetail=getDishDetailById($attr);
                    $dish_id=$getDishDetail[0]['id'];
                    $getUserFullCart=getUserFullCart();
                    $totaDish=count($getUserFullCart);
                    $totalPrice=0;
                    foreach($getUserFullCart as $list){
                      $totalPrice=$totalPrice+($list['qty']*$list['price']);
                    }

                    json(1,"Iteam Removed From Cart successfully",array('totalCartDish'=>$totaDish,'totalPrice'=>$totalPrice,'dish_id' =>$dish_id));  
            }

           




        // if(!empty($param)){
        }


        


 ?>