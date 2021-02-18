jQuery(function(){



	var ajaxurl = themeajax.ajax_url;
	
  

jQuery("#frmRegister").submit(function(){

       var formdata = jQuery("#frmRegister").serialize();


       var postdata ="action=theme_request&param=user_register&" +formdata;

       jQuery.post(ajaxurl, postdata, function (response) {  
            
              var data = jQuery.parseJSON(response);
              
              if(data.status == 1){
                 jQuery("#form_msg").text(data.array["form_msg"]);
                 
              }else{ 
                jQuery("#form_msg").text(data.array["form_msg"]);
                
              }                 
      });

});

jQuery("#frmLogin").submit(function(e){

       e.preventDefault();
      
       var formdata = jQuery("#frmLogin").serialize();

       var postdata ="action=theme_request&param=user_login&" +formdata;


       jQuery.post(ajaxurl, postdata, function (response) {  
            
           
              var data = jQuery.parseJSON(response);
              var is_checkout = jQuery("#is_checkout").val();
              if(is_checkout == "yes") {
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true, 
                })
                 setTimeout(function(){ window.location.href= window.location.href }, 2000);

              }else if(data.status == 1){
                 Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,
                })
                  setTimeout(function(){ window.location.href= data.array['productUrl']; }, 2000);
                  
              }else{ 
                jQuery("#form_login_msg").text(data.array["form_login_msg"]);
                
              }                 
      });

});








});

function set_checkbox(id,e){

     var cat_dish = jQuery("#cat_dish").val();
         
     var check = cat_dish.search(":"+id);    
     if(check!='-1'){
        cat_dish=cat_dish.replace(":"+id,'');
     }else{
         cat_dish = cat_dish+":"+id;
     }
      
     jQuery('#cat_dish').val(cat_dish);
    
     jQuery('#frmCatDish')[0].submit();
}

function add_to_cart(id,type){

   var qty = jQuery("#qty"+id).val();
   var attr = jQuery('input[name="radio_'+id+'"]:checked').val();

  
  var is_attr_checked='';
  if(typeof attr=== 'undefined'){
    is_attr_checked='no';
     Swal.fire({
          position: 'middle',
          icon: 'error',
          title: 'Please Select (Half Plate OR Full Plate)',
          showConfirmButton: true,
                  
    })
  }
  if(qty>0 && is_attr_checked!='no'){
    var ajaxurl = themeajax.ajax_url;
    var postdata ='action=theme_request&param=add_to_cart&qty='+qty+'&attr='+attr+'&type='+type;

    jQuery.post(ajaxurl, postdata, function (response) {  
              var data = jQuery.parseJSON(response);

              if(data.status == 1){
                  Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,   
                });  
                jQuery("#totalPrice").html(data.array["totalPrice"]);
                jQuery("#totalCartDish").html(data.array["totalCartDish"]);
                jQuery('#shop_added_msg_'+attr).html('(Added qty ='+qty+')'); 
                
                  var tp1=data.array["totalPrice"];
                  if(data.array["totalCartDish"]==1){
                    
                    jQuery(".qty_"+attr).html(":"+data.array["qty"]);
                    jQuery("#tp").html(data.array["totalPrice"]);

                    jQuery("#shopTotal").html(' '+data.array["totalPrice"]+'Rs');
                    
                    var tp=qty*data.array["price"];
                    var html='<div class="shopping-cart-content"><ul id="cart_ul"><li class="single-shopping-cart" id="attr_'+attr+'"> <div class="shopping-cart-img"><a href="javascript:void(0)"><img alt="" src="'+data.array["image"]+'"></a></div><div class="shopping-cart-title"><h4><a href="javascript:void(0)">'+data.array["dish"]+'</a></h4><h6><span class="qty_'+attr+'">Qty: '+qty+'</span></h6><span id="tp">'+tp+' Rs</span></div><div class="shopping-cart-delete"><a href="javascript:void(0)" onclick=delete_cart("'+attr+'")><i class="ion ion-close"></i></a></div></li></ul><div class="shopping-cart-total"><h4>Total : <span class="shop-total" id="shopTotal">'+tp+' Rs</span></h4></div><div class="shopping-cart-btn"><a href="cart">view cart</a><a href="checkout">checkout</a></div></div>';  
                    jQuery('.header-cart').append(html);
                  }else{
                    var tp=qty*data.array["price"];
                    jQuery('#attr_'+attr).remove();
                    var html='<li class="single-shopping-cart" id="attr_'+attr+'"><div class="shopping-cart-img"><a href="#"><img alt="" src="'+data.array["image"]+'"></a></div><div class="shopping-cart-title"><h4><a href="javascript:void(0)">'+data.array["dish"]+'</a></h4><h6><span class="qty_'+attr+'">Qty: '+qty+'</span></h6><span id="tp">'+tp+' Rs</span></div><div class="shopping-cart-delete"><a href="javascript:void(0)" onclick=delete_cart("'+attr+'")><i class="ion ion-close"></i></a></div></li>';
                    jQuery('#cart_ul').append(html);
                    jQuery('#shopTotal').html(tp1+ 'Rs');
                  }   
              }
              
              
                            
      });
}
}



function delete_cart(attr,type){
    var type = type;
    var ajaxurl = themeajax.ajax_url;
    var postdata ='action=theme_request&param=add_to_cart_delete&attr='+attr;
     
    jQuery.post(ajaxurl, postdata, function (response) {  
              var data = jQuery.parseJSON(response);

              if(data.status == 1){
                 if(type = "load"){
                    Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,   
                });  
                  setTimeout(function(){ window.location.href= window.location.href}, 2000);   
                 }else{
                  Swal.fire({
                  position: 'middle',
                  icon: 'success',
                  title: data.message,
                  showConfirmButton: true,   
                });    

                if(data.array["totalCartDish"]==0){
                  jQuery('.shopping-cart-content').remove();
                  jQuery('#totalPrice').html('');
                  jQuery('#totalCartDish').html('0');
                  jQuery('#shop_added_msg_'+attr).html('');
                  jQuery('#radio_'+attr).html('');
                  jQuery('input[name="radio_'+data.array["dish_id"]+'"]:checked').removeAttr("checked");
                  jQuery('#qty'+data.array["dish_id"]).prop('selectedIndex',0);
                  

            
                }
                else{
                  var tp1=data.array["totalPrice"];
                  jQuery("#totalPrice").html(data.array["totalPrice"]);
                  jQuery("#totalCartDish").html(data.array["totalCartDish"]);
                  jQuery('#shop_added_msg_'+attr).html('');
                  jQuery('#attr_'+attr).remove();
                  jQuery('#shopTotal').html(data.array["totalPrice"]);
                  jQuery('input[name="radio_'+data.array["dish_id"]+'"]:checked').removeAttr("checked");
                  jQuery('#qty'+data.array["dish_id"]).prop('selectedIndex',0);
                  
                  
                }
              }
                      
            }
              
              
                            
      });
}

function redirect(path){

  window.location.href= path;
}