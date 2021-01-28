<?php

require("db.php");


$res = mysqli_query($conn,"select * from countries");




 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../file/bootstrap.min.css">
	<script type="text/javascript" src="../file/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../file/jquery-1.12.0.min.js"></script>
	<title></title>
</head>
<body>



<div class="container" style="margin-top: 150px;">
	<div class="card">
		<div class="card-header">
			<h3>Country Dropdown</h3>
		</div>
		<div class="card-body">
			<div class="row ">
				<div class="col-md-4">
					<select id="country">
							<option value="-1">Choose Country</option>
						<?php 
                         while ($row = mysqli_fetch_assoc($res)) {                 
						?>
					
						<option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
						<?php
						  }
						?>
					</select>
				</div>
				<div class="col-md-4">
					<select id="state">
						<option value="-1">Choose State</option>
					</select>
				</div>
				<div class="col-md-4">
					<select id="city">
						<option value="-1">Choose City</option>
					</select>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#country").change(function(){
                 var id = jQuery(this).val();
                 data = 'id='+id+'&type=country';
                 if(id == "-1"){
                      jQuery("#state").html('<option value="-1">Choose State</option>');
                      jQuery("#city").html('<option value="-1">Choose City</option>');
                 }else{
                 	jQuery("#state").html('<option value="-1">Choose State</option>');
	                 jQuery.post("submit.php",data, function(response){
	                 	    jQuery("#state").append(response);
	                 });
                 }
		});


		jQuery("#state").change(function(){
                 var id = jQuery(this).val();
                 data = 'id='+id+'&type=state';
                 if(id == "-1"){
                      jQuery("#city").html('<option value="-1">Choose City</option>');
                 }else{
                 	jQuery("#city").html('<option value="-1">Choose City</option>');
	                 jQuery.post("submit.php",data, function(response){
	                 	    jQuery("#city").append(response);
	                 });
	                 
                 }
		});
	});

</script>

</body>
</html>