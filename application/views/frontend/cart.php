<?php  
$id_user = -1;
$alamat = "";
if(!empty($login)){
	$id_user = $user->id;
	$alamat = $user->alamat;
} 


$row_cart = $this->model->row('cart_view'," id_user='$id_user'  ");
if($row_cart >= 1){ 

if(isset($_POST['checkout'])){
	
	$invoice = date('Ymdhis').$user->id;
	$alamat = in($_POST['alamat']); 
	 
	
	$total = 0;
	
	$table = "cart";
	$sql = "`id_user`='$id_user'";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$dd = $this->model->get_obj($table,$sql);
		foreach($dd as $data){
			
			$id_produk = $data->id_produk; 
			$qty= $data->qty;
			$harga = $data->harga;
			$sub_total = $data->total;
			
			$total += $data->total;
			
			$this->db->query("INSERT INTO `invoice_detail`
			(`invoice`, `id_produk`, `qty`, `harga`, `total`) VALUES 
			('$invoice','$id_produk','$qty','$harga','$sub_total') ");
			
		}
	}
	
	
	$this->db->query("INSERT INTO `invoice`
	( `invoice`, `id_user`, `sub_total`, `unik`, `total`, `status`, `alamat`) VALUES 
	('$invoice','$id_user','$total','0','$total','Menunggu Pembayaran','$alamat')");
	
	
	?> 
	<script>  document.location.href="<?php echo($site) ?>page/checkout/<?php echo($invoice) ;  ?>";   </script>  
	<?php 
	exit();
	
	
} 

?>


<form method="post" enctype="multipart/form-data"> 
<div class="padding pt-3">

<div class="card card-style">
	<div class="card-body">
		<h6 class="card-title padding">Produk</h6>  
		<div class="padding pb-3" id="cart_product_all">
		<?php 
		$total = 0 ;
		
			$table = "cart_view";
			$sql = "`id_user`='$id_user'";
			$row = $this->model->row($table,$sql);
			if($row >= 1){
				$dd = $this->model->get_obj($table,$sql);
				foreach($dd as $cart){
					$total += $cart->total;
					?> 
						 
	<div class="cart-item" >
	
	
			<div class="payment-card border-0">
				<div class=""  style="width : 100px;" >
					<img src="<?php echo($site) ?>images/crop/100/70/<?php echo($cart->image) ;  ?>"  style="width : 80px; border-radius:5px; "  class="" />
				</div>
				<div class="w-100-100 fs-14 cart-block">			
					<div class="cart-block"  style="padding:0px;font-size : 16px; margin:0px !important; " ><strong><?php echo($cart->nama_produk) ;  ?></strong> 
					<span  style="font-size : 14px" >	Harga  : <strong><?php echo(uang($cart->harga)) ;  ?> </strong> ,  Qty : <?php echo($cart->qty) ;  ?> Pcs <br></span>
					</div>
				</div>
			</div>
		
		 
		<div class="cart-item-flex "> 
		<div class="w-100-100"><small class="d-block">Sub Total&nbsp;</small>
		<span class="fs-14"><strong><?php echo uang($cart->total) ;  ?></strong></span></div>			
		</div>
	<hr>
	</div>
	
	

						
					<?php 
				}
			} 
			
		?>
		
						 
	<div class="cart-item" >
		<div class="cart-block"  style="font-size : 16px; margin:0px !important; " ><strong>Total Pesanan</strong> 
		<span  style="font-size : 18px; color:red;" >Rp.	<strong><?php echo(uang($total)) ;  ?></strong><br></span>
		</div> 
	</div>
		
	</div>
	</div>
</div>
 
 
<div class="card card-style">
	<div class="card-body">
		<h6 class="card-title padding">Alamat Pengiriman</h6>
		<div class="padding fs-14 pb-3">  
			<p> Alamat Pengiriman Produk Hanya Di Sekitar Area Kota Sumedang . Pastikan Alamat yang anda masukkan valid </p> 
			
			<span> Alamat Lengkap</span> 
			<textarea type="text" required class="form-control" name="alamat" value="" placeholder="Alamat Anda Di Kota Sumedang"    ><?php echo($alamat) ;  ?></textarea>
			
			
		</div>
		 
	</div>
</div>
  

	<button class="btn btn-success form-control fs-14" name="checkout" type="submit" ><strong>LANJUT KE PEMBAYARAN</strong></button>
 
  
</div>
</form>


<?php } else {?> 
<div class="padding pt-4 pb-4">
	
	<div class="card-flex align-items-center justify-content-center">
		<div class="w-70p">
			<img src="<?php echo($site) ?>image/empty.png"  style="border-radius:100%; "  class="w-100" />
		</div>	 
		<div class="w-100-70">
		<div class="ps-3">
			
			<p class="m-0"> <b> Keranjang Masih Kosong </b> <br /> <small class="fs-12"> Silahkan Mengisi keranjang untuk melanjutkan pembayaran . </small> </p> 
		</div>
		</div>
	</div>  
<div class="pt-2" align="center">
	<a class="btn bg-style border" href="<?php echo($site) ?>" > Ke Halaman Utama </a> 
	</div>
	
</div> 
<?php } ?>