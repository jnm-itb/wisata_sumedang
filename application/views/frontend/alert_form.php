<?php  if(!empty($alert)){ ?>
<div  style="margin-left:0px !important; margin-right: 0px!Important; margin-bottom: 1rem!important; margin-top: 0px!Important; ;padding:1rem!important; font-size : 15px;color:#f9f9f9!Important;"  class="alert alert-<?php echo($alert) ;  ?>   text-light border-0 bg-<?php echo($alert) ;  ?> alert-dismissable">
	<a class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<?php echo($respon) ;  ?> 
</div> 
<?php }  ?>			


<style>
	.close{
		position:absolute; 
		right:10px;
		top:0px;
		color:white;
		font-size : 30px;
		border:0px;
		cursor:pointer;
		text-decoration:none!important;
	}
</style>

<script>  $('.close').click(function(){
	$('.alert').remove();
})  </script> 
