jQuery(document).ready(function(){

	var ajaxurl = news.ajax_url;


      jQuery("#file").on("click", function(){


          var image = wp.media({

            title: "upload that",
            multiple: false
          }).open().on("select",function(){

              var uploaded_image = image.state().get('selection').first();  

              var image_url =    uploaded_image.toJSON().url; 
              var wxt =  image_url.split('.').pop().toLowerCase();

              if(jQuery.inArray(wxt, ['gif', 'png', 'jpg', 'jpeg']) == -1){
                jQuery(".img-error").html("plese select valid image type");
              }else{
                jQuery("#img-prev").attr('src', image_url);
                jQuery("#image-val").val(image_url);
              }

          });

     });


     jQuery("#file2").on("click", function(){

	      var data = jQuery("#frmid").serialize();

	      var postdata = "action=news_front_request&param=contact&"+data;

		      jQuery.post(ajaxurl, postdata, function (response) {  
            
                      var data1 = jQuery.parseJSON(response);


                      if(data1.status == 1){
                          
                          jQuery(".error-message").html(data1.msg);
                      }else{
                      	   jQuery(".error-message").html(data1.msg);
                      }
              
                             
             });


     });


    

});
