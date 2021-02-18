<?php get_header(); ?>
<?php 
$cartArr = getUserFullCart();

if(count($cartArr)>0){
       
}else{
    $url =home_url('/product/');
    echo "<script>window.location.href='".$url."'</script>";
}

if(isset($_SESSION['FOOD_USER_ID'])){
    $is_show='';
    $box_id='';
    $final_show='show';
    $final_box_id='payment-2';
}else{
    $is_show='show';
    $box_id='payment-1';
    $final_show='';
    $final_box_id='';
}

$userArr = getUserDetailsByid();

$totalPrice=getcartTotalPrice();


if(isset($_POST["place_order"])){
     global $wpdb;
  
     $checkout_name = isset($_REQUEST['checkout_name']) ? $_REQUEST['checkout_name'] :"";
     $checkout_email = isset($_REQUEST['checkout_email']) ? $_REQUEST['checkout_email'] :"";
     $checkout_mobile = isset($_REQUEST['checkout_mobile']) ? $_REQUEST['checkout_mobile'] :"";
     $checkout_zip = isset($_REQUEST['checkout_zip']) ? $_REQUEST['checkout_zip'] :"";
     $checkout_address = isset($_REQUEST['checkout_address']) ? $_REQUEST['checkout_address'] :"";
     $payment_type = isset($_REQUEST['payment_type']) ? $_REQUEST['payment_type'] :"";
     $checkout_zip = isset($_REQUEST['checkout_zip']) ? $_REQUEST['checkout_zip'] :"";


     $wpdb->insert("wp_pkj_order_master",array(

                        "user_id" => $userArr[0]["id"],
                        "name" => $checkout_name,
                        "email" => $checkout_email,
                        "mobile" => $checkout_mobile,
                        "address" => $checkout_address,
                        "total_price" => $totalPrice,
                        // "coupon_code" => $,
                        // "final_price" => $,
                        "zipcode" => $checkout_zip,
                        // "delivery_boy_id" => $,
                        "payment_status" => "Pending",
                        "payment_type" => $payment_type,
                        // "payment_id" => $,
                        "order_status" => 1,
                        // "cancel_by" => $,
                        // "cancel_at" => $,
                        // "delivered_on" => $
                     
                        
                ));
     

 }
                    $insertid = $wpdb->insert_id;
                    foreach ($cartArr as $key => $cartDetail) {
                            
                           $wpdb->insert("wp_pkj_order_detail",array(

                            "order_id" =>  $insertid,
                            "dish_details_id" => $key,
                            "price" => $cartDetail["price"],
                            "qty" =>  $cartDetail["qty"]
                               ));
                }
                if($insertid  > 0){
                  echo '<script>alert("Order Place Successfully")</script>';
                  echo '<script>window.location.href=window.location.href</script>';
                  emptyCart();
                }
                

            

?>
            <div class="breadcrumb-area gray-bg">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active"> Checkout </li>
                        </ul>
                    </div>
                </div>
            </div>
        <!-- checkout-area start -->
<div class="checkout-area pb-80 pt-100">
<div class="container"><div class="row">
<div class="col-lg-9">
    <div class="checkout-wrapper">
        <div id="faq" class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title"><span>1.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-1">Checkout method</a></h5>
                </div>
                <div id="<?php echo $box_id?>" class="panel-collapse collapse <?php echo $is_show?>">
                    <div class="panel-body">
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="checkout-login">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-white">LOGIN</h4>
                                    </div>
                                    <p>&nbsp;</p>
                                    <form method="post" id="frmLogin">
                                        <div class="login-form">
                                            <label>Email Address * </label>
                                            <input name="user_email" placeholder="Email" required>
                                        </div>
                                        <div class="login-form">
                                            <label>Password *</label>
                                            <input type="password" name="user_password" placeholder="Password" required>
                                            <input type="hidden" name="type" value="login"/>
                                            <input type="hidden" name="is_checkout" value="yes" id="is_checkout"/>
                                        </div>
                                    
                                     <div class="checkout-login-btn">
                                        <button type="submit" id="login_submit" class="my_btn">Login</button>
                                        <a href="<?php echo FRONT_SITE_PATH?>/login/" style="background-color: #e02c2b;color:#fff;">Register Now</a>
                                    </div>
                                    <div id="form_login_msg"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title"><span>2.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-2">Other information</a></h5>
                </div>
                <div id="<?php echo $final_box_id?>" class="panel-collapse collapse <?php echo $final_show?>">
                    <div class="panel-body">
                        <form method="post">
                            <div class="billing-information-wrapper">
                                <div class="row">
                                   
                                    <div class="col-lg-3 col-md-6">
                                        <div class="billing-info">
                                            <label>First Name</label>
                                            <input type="text" name="checkout_name" required value="<?php echo $userArr[0]['name']?>">
                                             <input type="hidden" name="user_id" required value="<?php echo $userArr[0]['id']?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="billing-info">
                                            <label>Email Address</label>
                                            <input type="email"  name="checkout_email" required value="<?php echo $userArr[0]['email']?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="billing-info">
                                            <label>Mobile</label>
                                            <input type="text"  name="checkout_mobile" required value="<?php echo $userArr[0]['mobile']?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="billing-info">
                                            <label>Zip/Postal Code</label>
                                            <input type="text"  name="checkout_zip" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info">
                                            <label>Address</label>
                                            <input type="text"  name="checkout_address" required>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-3 col-md-12"> -->
                                       <!--  <div class="billing-info">
                                            <label>Coupon Code</label>
                                            <input type="text"  name="coupon_code" id="coupon_code" >
                                        </div> -->
                                       <!--  <div id="coupon_code_msg"></div>
                                    </div> -->
                                    <!-- <div class="col-lg-5 col-md-12">
                                        <div class="billing-back-btn">
                                            <div class="billing-btn">
                                                <button type="button" name="place_order" onclick="apply_coupon()" >Apply Coupon</button>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                
                                <div class="ship-wrapper">
                                    <div class="single-ship">
                                        <input type="radio" name="payment_type" value="cod">
                                        <label>Cash on Delivery(COD)</label>
                                    </div>
                                   <!--  <div class="single-ship">
                                        <input type="radio" name="payment_type" value="paytm"   checked="checked">
                                        <label>PayTm</label>
                                    </div> -->
                                   <!--  <?php
                                    $is_dis='';
                                    $low_msg='';
                                    if($getWalletAmt>=$totalPrice){
                                        
                                    }else{
                                        $is_dis="disabled='disabled'";
                                        $low_msg="(Low Wallet Money)";
                                    }
                                    ?> -->
                                    <!-- <div class="single-ship">
                                        <input type="radio" name="payment_type" value="wallet" <?php echo $is_dis?>>
                                        <label>Wallet</label>
                                        <span style="color:red;font-size:12px;">
                                        <?php
                                        echo $low_msg;
                                        ?>
                                        </span>
                                    </div> -->
                                    
                                    <!--<div class="single-ship">
                                        <input type="radio" name="address" value="dadress">
                                        <label>Ship to different address</label>
                                    </div>-->
                              <!--   </div> -->
                                <div class="billing-back-btn">
                                    <div class="billing-btn">
                                        <button type="submit" name="place_order">Place Your Order</button>
                                    </div>
                                    
                                </div>
                                <!-- <?php
                                if($is_error=='yes'){
                                    echo "<div style='color:red;'>$cart_min_price_msg</div>";
                                }
                                ?> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
       </div>
    </div>
</div>
<div class="col-lg-3">
    <div class="checkout-progress">
        <div class="shopping-cart-content-box" style="z-index: 1">
            <h4 class="checkout_title">Cart Details</h4>
            <ul>
                <?php foreach($cartArr as $key=>$list){ ?>
                <li class="single-shopping-cart">
                    <div class="shopping-cart-img">
                        <a href="#"><img alt="" src="<?php echo$list['image']?>" style="width: 92px;" ></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a href="#">Phantom Remote </a></h4>
                        <h6>Qty: <?php echo $list['qty']?></h6>
                        <span><?php echo 
                                    $list['qty']*$list['price'];?> Rs</span>
                    </div>
                    
                </li>
                <?php } ?>
            </ul>
            <div class="shopping-cart-total">
                <h4>Total : <span class="shop-total"><?php echo $totalPrice?> Rs</span></h4>
            </div>
            
            <div class="shopping-cart-total coupon_price_box">
                <h4>Coupon Code : <span class="shop-total coupon_code_str"></span></h4>
            </div>
            <div class="shopping-cart-total coupon_price_box">
                <h4>Final Price : <span class="shop-total final_price"></span></h4>
            </div>
            
        </div>
    </div>
</div>
</div>
</div>
</div>

 <?php get_footer(); ?>  