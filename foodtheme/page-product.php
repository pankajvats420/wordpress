<?php get_header(); 


function category(){
    global $wpdb;
    
     $helloworld_id =$wpdb->get_results( 
    $wpdb->prepare("SELECT * FROM wp_pkj_category  WHERE status=%d", 1),ARRAY_A 
 );

    return $helloworld_id;
}


$cat_dish='';
$cat_dish_arr=array();
$type='';
$search_str='';
if(isset($_GET['cat_dish'])){
    $cat_dish = $_GET['cat_dish'];
    $cat_dish_arr =array_filter(explode(':',$cat_dish));
    $cat_dish_str=implode(",",$cat_dish_arr);

}

function dish(){
     global $wpdb;
     
       if(isset($_GET['cat_dish'])){
            $cat_dish = $_GET['cat_dish'];
            $cat_dish_arr =array_filter(explode(':',$cat_dish));
            $cat_dish_str=implode(",",$cat_dish_arr);

        }    
              
        $product_sql="select * from wp_pkj_dish where status=1";
        if($cat_dish!=''){      
          $product_sql.=" and category_id in ($cat_dish_str) ";
        }
        if($type!='' && $type!='both'){     
            $product_sql.=" and type ='$type' ";
        }
        
        if($search_str!=''){        
            $product_sql.=" and (dish like '%$search_str%' or dish_detail like '%$search_str%') ";
        }

     $helloworld_id =$wpdb->get_results( 
    $wpdb->prepare($product_sql),ARRAY_A 
 );

    return $helloworld_id;
}

$category= category();

function DishDetailByDishID($id){
          
     global $wpdb;
    
     $DishDetailByDishID = $wpdb->get_results( 
    $wpdb->prepare("SELECT * FROM wp_pkj_dish_details  WHERE status=%d AND dish_id=%d" , 1, $id),ARRAY_A 
 );

    return $DishDetailByDishID;
}

$arrType=array("veg","non-veg","both");
?>


 
        <div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Shop Grid Style </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="shop-page-area pt-100 pb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="banner-area pb-30">
                            <!-- <a href="product-details.html"><img alt="" src="assets/img/banner/banner-49.jp"></a> -->
                        </div>
                        
                        <div class="grid-list-product-wrapper">
                            <div class="product-grid product-view pb-20">
                                <div class="row">
                <?php 
                if(!empty($dishs= dish())){

                
                    $dishs= dish();
                    foreach ($dishs as $key => $dish ) {
                            
                      $DishDetail = DishDetailByDishID($dish["id"]);
                    
                ?>
            <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.html">
                        <img src="<?php echo $dish["image"]?>" alt="">
                    </a>
                </div>
                <div class="product-content">
                    <h4>
                        <a href="product-details.html"><?php echo $dish["dish"]?> </a>
                    </h4>
                    <div class="product-price-wrapper">
                        <?php if(!empty($DishDetail)){

                               echo "{".strtoupper($dish["type"])."}";
                               echo "&nbsp;";
                               echo "&nbsp;";
                               echo "&nbsp;";echo "&nbsp;";
                              foreach ($DishDetail as $key => $DishDetails) {
                                
                               
                                 echo "<input type='radio' class='dish_radio' name='radio_".$dish['id']."' id='radio_".$dish['id']."' value='".$DishDetails['id']."'/>";
                                 echo "&nbsp;";
                                 echo $DishDetails['attribute'];
                                 echo "<span class='price'>(".$DishDetails['price'].")</span>";
                                
                                  $cartArr = getUserFullCart();
                                    $added_msg="";
                                  if(array_key_exists($DishDetails['id'],$cartArr)){
                                    $added_qty=$cartArr[$DishDetails['id']]["qty"];
                                    $added_msg="(Added qty = ".$added_qty.")";
                                  }
                                  echo " <span class='cart_already_added' id='shop_added_msg_".$DishDetails['id']."'>".$added_msg."</span>";
                                             
                                
                                
                                 echo "&nbsp;&nbsp;&nbsp;";


                              }
                        } ?>
                    </div>

                    <div class="product-price-wrapper">
                    <select class="select" id="qty<?php echo $dish['id']?>">
                    <option value="0">Qty</option>
                    <?php
                    for($i=1;$i<=5;$i++){
                      echo "<option>$i</option>";
                    }
                    ?>
                   </select>
                  <i class="fa fa-cart-plus   cart_icon" aria-hidden="true" onclick="add_to_cart('<?php echo $dish['id']?>','add')"></i>
                </div>
                </div>
            </div>
        </div>
                              <?php }}else{
                                echo "No dish found";
                              } ?>

									
								</div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                            <div class="shop-widget">
                                <h4 class="shop-sidebar-title">Shop By Categories</h4>
                                <div class="shop-catigory">
                                    <ul id="faq" class="category_list">
                                        <li><a href="<?php echo FRONT_SITE_PATH?>/product/"><u>clear</u></a></li>
                                        <?php 
                                          if(!empty($category)){

                                          foreach ($category as $key => $cat_row) {
                                            
                                              $class="selected";
                                            if($cat_id==$cat_row['id']){
                                                $class="active";
                                            }
                                            $is_checked='';

                                            if(in_array($cat_row['id'],$cat_dish_arr)){
                                                $is_checked="checked='checked'";
                                            }
                                            
                                            echo "<li> <input $is_checked onclick=set_checkbox('".$cat_row['id']."') type='checkbox' class='cat_checkbox' name='cat_arr[]' value='".$cat_row['id']."'/>".$cat_row['category']."</li>";                                     
                                         ?>

                                        <?php  }} ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="get" id="frmCatDish">
            <input type="hidden" name="cat_dish" id="cat_dish" value='<?php echo $cat_dish?>'/>
            
            
        </form>

        <?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
            <ul id="sidebar">
                <?php dynamic_sidebar('sidebar-1'); ?>
            </ul>
        <?php } ?>
        <?php get_footer(); ?>  