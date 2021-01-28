<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="../file/sweetalert2@10.js">
		
	</script>
</head>
<body>

	<input type="button" onclick="hitme();"  value="hitme">

	<?php

    function yes($yes){

      
    	    ?>

<script type="text/javascript">
	      Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: '<?php echo $yes ?>',
			  footer: '<a href>Why do I have this issue?</a>'
			})
</script>

    	    <?php
    }


    yes("YES ITS ME");
   
	 ?>



<script type="text/javascript">
	
 
  function hitme(){
  	Swal.fire('Any fool can use a computer');
  }


</script>

</body>
</html>