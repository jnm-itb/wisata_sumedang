<?php 
if(!empty($id)){
	$idx = explode('-',$id);
	$id = $idx[count($idx) -1]; 
	
	
	$table = "hotel";
	$sql = "`id`='$id'";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$data = $this->model->get_obj($table,$sql)[0];
		$whatsapp = "#".$data->whatsapp;
		$whatsapp = str_replace('#0','62',$whatsapp);
		$whatsapp = str_replace('#','',$whatsapp);
	} 
}
?>

<div class="padding pt-3">
<div class="card-product-detail">
<img src="<?php echo($site) ?>images/crop/400/300/<?php echo($data->image) ;  ?>"  style="border-radius:5px "  class="w-100" />

   

<div class="card-product-body-lg">
	<strong  style="font-size : 22px!Important; margin-bottom: 0px;"  class="card-product-title"><?php echo($data->judul) ;  ?></strong> 
	<strong  style="font-size : 18px!Important; margin-bottom: 20px"  class="card-product-title">Harga Rp. <?php echo uang($data->harga) ;  ?> / Malam</strong> 
</div>
	
	
</div>

 
 

<div class="">
		<?php echo html_entity_decode(htmlspecialchars_decode($data->text)) ;  ?>	
</div>
<div class="">
<a class="btn btn-success w-100 pt-2 pb-2" target="_blank" href="https://wa.me/<?php echo($whatsapp) ;  ?>/?text=Saya Ingin Reservasi Di <?php echo($data->judul) ;  ?>" > Reservasi Via Whatsapp</a> 
<?php if(!empty($data->brosur)){?> 
<a class="btn btn-success w-100 pt-2 pb-2 mt-2" target="_blank" href="<?php echo($site) ?>image/<?php echo($data->brosur) ;  ?>" >  Lihat Brosur </a> 
<?php }  ?>
</div> 
	
	
</div> 
 
 
 <style> 
	 .input-group-cart input,
	 .input-group-cart a{
		 display:flex!important;
		 padding:0px!important;
		 height: 100%!important;
		 align-items:center; justify-content:center;
		 z-index:0!important;
	 }
	 
	 
	 .input-group-cart a{
		 width : 40px!important; 
		 height: 100%!important; 
		 border-radius:0px!Important;
		 display:flex;
		 padding:0px!important;
		 align-items:center; justify-content:center;
	 }
 </style>
 
<script>  
var qty = 1;
function minus(){
	qty = Number($('#qty').val());
	if(qty >= 2){
		qty--;
	} 	
	$('#qty').val(String(qty));
}

function plus(){
	qty = Number($('#qty').val());
	if(qty <= 1000){
		qty++;
	} 	
	$('#qty').val(String(qty));
}


</script> 