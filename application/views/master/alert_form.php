<style>
	.alert{
		position:relative;
	}
	.close{
		position:absolute; right:10px; top:0px;
		font-size : 22px; font-weight : bold; color:white!Important;
	}
</style>
<?php  if(!empty($alert)){ ?>
<div class="alert alert-<?php echo($alert) ;  ?> bg-<?php echo($alert) ;  ?> border-0 shadow-sm text-light alert-dismissable">
	<a class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<?php echo($respon) ;  ?> 
</div> 
<?php }  ?>			

