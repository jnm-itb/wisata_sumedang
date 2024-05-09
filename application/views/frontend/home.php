<div class="p-3">
	<h5  style="font-weight : bold;" > Sumedang <br />
	City Of Knowledge </h5> 
	<div class="row"  style="margin-left: -.5rem!important;margin-right: -.5rem!important;" >
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 "  style="padding:.5rem!important;" >
			<a class="" href="<?php echo($site) ?>page/destinasi" style="position:relative; display:block!Important; color:white; border-radius:5px; overflow:hidden " >
				<img src="<?php echo($site) ?>images/crop/300/200/destinasi.jpg"  style="width : 100%; border-radius:5px"  />
				<span  style="position:absolute; bottom:0px;padding:.5rem; border-radius:5px; left:0px; width : 100%; background: rgba(0,0,0,0.5)" > Destinasi </span> 
			</a>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 "  style="padding:.5rem!important;" >
			<a class="" href="<?php echo($site) ?>page/hotel" style="position:relative; display:block!Important; color:white; border-radius:5px; overflow:hidden " >
				<img src="<?php echo($site) ?>images/crop/300/200/hotel.jpg"  style="width : 100%; border-radius:5px"  />
				<span  style="position:absolute; bottom:0px;padding:.5rem; border-radius:5px; left:0px; width : 100%; background: rgba(0,0,0,0.5)" > Home Stay </span> 
			</a>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 "  style="padding:.5rem!important;" >
			<a class="" href="<?php echo($site) ?>page/produk" style="position:relative; display:block!Important; color:white; border-radius:5px; overflow:hidden " >
				<img src="<?php echo($site) ?>images/crop/300/200/produk.jpg"  style="width : 100%; border-radius:5px"  />
				<span  style="position:absolute; bottom:0px;padding:.5rem; border-radius:5px; left:0px; width : 100%; background: rgba(0,0,0,0.5)" > Produk Lokal </span> 
			</a>
		</div> 
		
	</div>

</div>



<div class="p-3">
<h5  style="font-weight : bold;margin:0px !important; " > Produk Lokal Terbaru </h5>
<p  style="font-weight : 500; font-size : 14px; margin:0px !important; " > Dapatkan Produk Lokal Sumedang , Pembelian bisa melalui rumah anda </p> 
</div>

<div class="padding">
	<div class="row-product" id="row_product">
<?php 
	$table = "produk_view";
	$sql = "`id`<>-1 ORDER BY id DESC LIMIT 8";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$dd = $this->model->get_obj($table,$sql);
		foreach($dd as $product){ ?> 
			<div class="div-product">
			<div class="card-product">
				<a href="<?php echo($site) ?>page/detail/<?php echo (title($product->nama)."-".$product->id) ;  ?>">
				<img src="<?php echo($site) ?>images/crop/300/200/<?php echo($product->image) ;  ?>">
				</a>
				<div class="card-product-body"  style="min-height:60px!important" >
					<a href="<?php echo($site) ?>page/detail/<?php echo (title($product->nama)."-".$product->id) ;  ?>">
					<strong  style="font-size : 16px;margin:0px !important; "  class="card-product-title"><?php echo($product->nama) ;  ?></strong>
					<strong class="d-block"><?php echo ($product->kategori ) ;  ?></strong> 
					<strong class="d-block">Hanya Rp. <?php echo uang($product->harga,0) ;  ?></strong> 
					</a>
				</div> 
				 
				<div class="card-product-button">   
					<button id="add_<?php echo($product->id) ;  ?>" class="btn btn-success btn-sm form-control" 
					onclick="addtocart('<?php echo($product->id) ;  ?>')" type="button">BELI</button>
					 
				</div>
			</div>
			</div>
		<?php 
		}
	} 
	
?>
</div>
</div>




<div class="p-3">
<h5  style="font-weight : bold;margin:0px !important; " > Destinasi Wisata </h5>
<p  style="font-weight : 500; font-size : 14px; margin:0px !important; " > Lihat Destinasi Wisata terbaru yang tersedia di sumedang </p> 
</div>

<div class="padding">
	<div class="row-product" id="row_product">
<?php 
	$table = "trip";
	$sql = "`id`<>-1 ORDER BY id DESC LIMIT 4";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$dd = $this->model->get_obj($table,$sql);
		foreach($dd as $product){
			?> 
			
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
	} 
	
?>
</div>
</div>



<div class="p-3">
<h5  style="font-weight : bold;margin:0px !important; " > Home Stay </h5>
<p  style="font-weight : 500; font-size : 14px; margin:0px !important; " > Lihat Tempat Tinggal / Hotel yang ada di Sumedang  </p> 
</div>

<div class="padding">
	<div class="row-product" id="row_product">
<?php 
	$table = "hotel";
	$sql = "`id`<>-1 ORDER BY id DESC LIMIT 4";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$dd = $this->model->get_obj($table,$sql);
		foreach($dd as $product){
			?> 
			
<div class="div-product">
<div class="card-product">
	<a href="<?php echo($site) ?>page/hotel-detail/<?php echo (title($product->judul)."-".$product->id) ;  ?>">
	<img src="<?php echo($site) ?>images/crop/300/200/<?php echo($product->image) ;  ?>">
	</a>
	<div class="card-product-body"  style="min-height:unset!important" >
		<a href="<?php echo($site) ?>page/hotel-detail/<?php echo (title($product->judul)."-".$product->id) ;  ?>">
		<strong  style="font-size : 14px;"  class="card-product-title"><?php echo($product->judul) ;  ?></strong> 
		<strong  style="font-size : 14px;"  class="card-product-title">Rp. <?php echo uang($product->harga, 0) ;  ?> / Malam</strong> 
		</a>
	</div> 
	 
</div>
</div>


			
			<?php 
		}
	} 
	
?>
</div>
</div>


