<?php 
$q = "";
if(!empty($_GET['q'])){ 
$q = in($_GET['q']); 
}
 

?>
<header class="header-main padding"  style=" border-bottom:1px solid lightblue;" >
	<div class="header-logo-main"  style="height:55px;" >
		<div class="header-logo-width w-140p" onclick="document.location.href='<?php echo($site) ?>#'; ">
		<img  style="height: 40px;width : auto!important;"  src="<?php echo($site) ?>image/<?php echo($settings->logo) ;  ?>"></div>
		<div class="header-search-width w-100-140 ps-3 " align="right">
			<?php if(empty($login)){?> 
			<a class="btn btn-light border" href="<?php echo($site) ?>page/daftar" > Daftar </a> 
			<a class="btn btn-success" href="<?php echo($site) ?>page/login" > Masuk </a> 
			<?php } else {?> 
			<a class="btn btn-light border" href="<?php echo($site) ?>page/invoice"> Pesanan</a> 
			<a class="btn btn-success" href="<?php echo($site) ?>page/akun" > Akun </a> 
		 
			<?php }  ?>
			
		</div>
	</div>
</header> 


