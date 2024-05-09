<?php $q = "";
if(!empty($_GET['q'])){ 
$q = in($_GET['q']); 
}
?>

<div class="p-3">
<h5  style="font-weight : bold;margin:0px !important; " > Destinasi / Wisata </h5>
<p  style="font-weight : 500; font-size : 14px; margin:0px !important; " > Lihat Destinasi / Wisata Yang berada disekitar sumedang </p> 


<form method="get" autocomplete="off" action="<?php echo($site) ?>page/hotel/" enctype="multipart/form-data" class="input-group mt-2 shadow-sm"> 
<span class="input-group-text"><button type="submit"  style="padding:0px!Important; margin:0px !important; border:0px;"  name="search" ><i class="fas fa-search"></i></button> </span>
<input name="q"  value="<?php echo($q) ;  ?>" autocomplete="off" class="form-control" type="text" placeholder="Cari Tempat Tinggal">
</form>
</div>



<div class="padding">
<?php 
	$table = "trip";
	if(!empty($q)){
		$q = "%".str_replace(' ','%',$q)."%";
		$sql = "`judul` LIKE '$q' ORDER BY id DESC LIMIT 100";	
	 
	} else {
	$sql = "`id`<>-1 ORDER BY id DESC LIMIT 100";
	}
	
	$row = $this->model->row($table,$sql);
	if($row >= 1){ ?>
	<div class="row-product" id="row_product">
<?php 

		$dd = $this->model->get_obj($table,$sql);
		foreach($dd as $product){ ?> 
			
<div class="div-product">
<div class="card-product">
	<a href="<?php echo($site) ?>page/destinasi-detail/<?php echo (title($product->judul)."-".$product->id) ;  ?>">
	<img src="<?php echo($site) ?>images/crop/300/200/<?php echo($product->image) ;  ?>">
	</a>
	<div class="card-product-body"  style="min-height:unset!important" >
		<a href="<?php echo($site) ?>page/destinasi-detail/<?php echo (title($product->judul)."-".$product->id) ;  ?>">
		<strong  style="font-size : 14px;"  class="card-product-title"><?php echo($product->judul) ;  ?></strong> 
		</a>
	</div> 
	 
</div>
</div>
		<?php 
		}
	
?>
</div>

	<?php } else { ?>
<div class="padding bg-light pt-2 pb-2">
	
	<div class="card-flex align-items-center justify-content-center">
		<div class="w-70p">
			<img src="<?php echo($site) ?>image/empty.png"  style="border-radius:100%; "  class="w-100" />
		</div>	 
		<div class="w-100-70">
		<div class="ps-3">
			
			<p class="m-0"> <b> Tidak Ditemukan </b> <br /> <small class="fs-12"> Destinasi / Wisata yang anda cari tidak ditemukan </small> </p> 
		</div>
		</div>
	</div>  
<div class="pt-2" align="center">
	<a class="btn bg-style border" href="<?php echo($site) ?>" > Ke Halaman Utama </a> 
	</div>
	
</div>  
	<?php } ?>


</div>


