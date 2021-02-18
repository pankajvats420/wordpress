<?php 
  
$totalPrice=getcartTotalPrice();
$cartArr = getUserFullCart();


$totalCartDish=count($cartArr);



 ?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Billy - Food & Drink eCommerce Bootstrap4 Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
        
    </head>
    <body>
        <!-- header start -->
<header class="header-area">
    <div class="header-top black-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 col-sm-4">
                    <div class="welcome-area">
                        <p>Default welcome msg! </p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-12 col-sm-8">
                    <div class="account-curr-lang-wrap f-right">
                        <ul>
                            
                            
                            <li class="top-hover"><a href="#"><?php if(!empty($_SESSION["FOOD_USER_NAME"])){
                                echo "Welcome&nbsp;".$_SESSION["FOOD_USER_NAME"];
                            }else{
                                echo "Setting";
                            } ?><i class="ion-chevron-down"></i></a>
                                <ul>
                                    <li><a href="#">Wishlist  </a></li>
                                    <li><a href="<?php echo site_url('/login/'); ?>">Login</a></li>
                                    <li><a href="<?php echo site_url('/login/'); ?>">Register</a></li>
                                    <li><a href="<?php echo site_url('/logout/'); ?>">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12 col-sm-4">
                    <div class="logo">
                        <a href="index.html">
                            <img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo.png">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12 col-sm-8">
                    <div class="header-middle-right f-right">
                        <div class="header-login">
                            <?php if(empty($_SESSION["FOOD_USER_EMAIL"])){
                                ?>
                                <a href="<?php echo site_url('/login/'); ?>">
                                <div class="header-icon-style">
                                    <i class="icon-user icons"></i>
                                </div>
                                <div class="login-text-content">
                                    <p>Register <br> or <span>Sign in</span></p>
                                </div>
                            </a>
                            <?php
                            } ?>
                            
                        </div>
                        <div class="header-wishlist">
                           &nbsp;
                        </div>
                        <div class="header-cart">
                            <a href="#">
                                <div class="header-icon-style">
                                    <i class="icon-handbag icons"></i>
                                    <span class="count-style" id="totalCartDish"> 
                                        <?php
                                     if(!empty($totalCartDish)){
                                        echo $totalCartDish; 
                                     }else{
                                        echo "0";
                                     }?>
                                    </span>
                                </div>
                                <div class="cart-text">
                                    <span class="digit">My Cart</span>
                                    <span class="cart-digit-bold" id="totalPrice"><?php
                                     if(!empty($totalPrice)){
                                        echo $totalPrice." Rs"; 
                                     }
                                        ?>
                                            
                                        </span>
                                </div>
                            </a>
                            <?php if($totalPrice!=0){?>
                            <div class="shopping-cart-content">
                                <ul id="cart_ul">
                                    <?php foreach($cartArr as $key=>$list){ 
    
                                        ?>
                                        
                                        <li class="single-shopping-cart" id="attr_<?php echo $key?>">
                                            <div class="shopping-cart-img">
                                                <a href="javascript:void(0)"><img alt="" src="<?php echo $list['image']?>"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="javascript:void(0)">
                                                <?php echo $list['dish']?>
                                                </a></h4>
                                                <h6><span class="qty_<?php echo $key; ; ?>">Qty: <?php echo $list['qty']?></span></h6>
                                                <span><?php echo 
                                                $list['qty']*$list['price'];?> Rs</span>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="javascript:void(0)" onclick="delete_cart('<?php echo $key?>')"><i class="ion ion-close"></i></a>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <div class="shopping-cart-total">
                                    <h4>Total : <span class="shop-total" id="shopTotal">
                                    <?php echo $totalPrice?> Rs
                                    </span></h4>
                                </div>
                                <div class="shopping-cart-btn">
                                    <a href="javascript:void(0)" onclick="redirect('<?php echo home_url("/cart/");?>');">View Cart</a>
                                    <a href="javascript:void(0)" onclick="redirect('<?php echo home_url("/checkout/");?>');">checkout</a>
                                    
                                    
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom transparent-bar black-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="main-menu">
                        <nav>
                            <!-- <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about-us.html">about</a></li>
                                <li><a href="contact.html">contact us</a></li>
                            </ul> -->
                            <?php 
wp_nav_menu( array(
    'menu'   => 'primary_menu'
   
) );       ?>





                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu-area-start -->
	<div class="mobile-menu-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="mobile-menu">
						<nav id="mobile-menu-active">
							<ul class="menu-overflow" id="nav">
								<li><a href="index.html">Home</a></li>
								<li><a href="index.html">Home</a></li>
								<li><a href="index.html">Home</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- mobile-menu-area-end -->
</header>

<!-- <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <div style="float: right;">
    <ul id="sidebar">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </ul>
    </div>
<?php endif; ?> -->
		