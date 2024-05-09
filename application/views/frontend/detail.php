<?php 
if(!empty($id)){
	$idx = explode('-',$id);
	$id = $idx[count($idx) -1]; 
	
	
	$table = "produk_view";
	$sql = "`id`='$id'";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$produk = $this->model->get_obj($table,$sql)[0];
		
		if(isset($_POST['masukkan'])){
			$qty = in($_POST['qty']);
			
			if(!empty($login)){
				$id_user = $user->id;
					
				if($qty >= 1){
					
					
					$row = $this->model->row("cart","id_produk='$id' and id_user='$id_user'  ");
					if($row >= 1){
						
						$total = $qty * $produk->harga ; 
						$this->db->query("UPDATE cart SET `qty`='$qty' , `total`='$total' WHERE id_produk='$id' and id_user='$id_user'    ");
						
						
					
					$alert = "success";
					$respon = "Berhasil Memasukkan Produk Ke Keranjang ";
						
						
					}else {
					
					$data = array();
					$data['id_user'] = $id_user ;
					$data['id_produk'] = $produk->id;
					$data['qty'] = $qty ;
					$data['harga'] = $produk->harga ;
					$data['total'] = $produk->harga * $qty;
					
					$this->db->insert('cart',$data);
					$return  = $this->db->insert_id(); 
					
					$alert = "success";
					$respon = "Berhasil Memasukkan Produk Ke Keranjang ";
					
					
					
					}
					
					
				} else {
					$alert = "danger";
					$respon = "Maaf. Anda harus memasukkan jumlah QTY Untuk membeli produk ";
					
				}
				
				
			} else {
				$alert = "danger";
				$respon = "Maaf. Anda Harus Login Sebelum Membeli ";
			}
			
		} 
		
		
	} 
}
?>
 

<div class="padding pt-3">
<?php include("alert_form.php"); ?> 
<div class="card-product-detail">
<img src="<?php echo($site) ?>images/crop/400/300/<?php echo($produk->image) ;  ?>"  style="border-radius:5px "  class="w-100" />

   

<div class="card-product-body-lg">
	<strong  style="font-size : 22px!Important;margin:0px !important; "  class="card-product-title"><?php echo($produk->nama) ;  ?></strong>
	<strong  style="font-size : 18px!Important; margin-bottom: 10px"  class="card-product-title"><?php echo($produk->kategori) ;  ?> , Harga : Rp. <?php echo uang($produk->harga, 0) ;  ?></strong>
</div>
	
	
</div>

 
 

<div class="">
		<?php echo html_entity_decode(htmlspecialchars_decode($produk->text)) ;  ?>	
</div>
<div class="">
	
	<form method="post" enctype="multipart/form-data"> 
	<div class="d-flex align-items-center justify-content-space-between w-100">
		<div class="input-group input-group-cart m-0"  style="width : 200px!important;
		height: 35px!Important;
		overflow:hidden; border:1px solid var(--bs-success);  border-radius:5px!Important; " >
		  <div class="input-group-prepend">
			<a class="btn btn-success bg-success"  onclick="minus();">-</a>
		  </div>
		  <input type="text"  value="1" id="qty" name="qty"  style="text-align:center;"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" placeholder="QTY" aria-label="Amount (to the nearest dollar)">
		  <div class="input-group-append">
			<a class="btn btn-success bg-success" onclick="plus();">+</a>
		  </div>
		</div>

		<button type="submit"  style="margin-left: 10px"  class="btn btn-success" name="masukkan" >Tambah Keranjang</button> 
	</div>
	</form>
	

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