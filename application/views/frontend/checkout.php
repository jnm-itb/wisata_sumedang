<?php 
$invoice = $id; 


if(isset($_POST['delete'])){ 
	$row = $this->model->row('invoice'," invoice='$invoice' and (id_user='$id_user' )  ");
	if($row >= 1){
	$this->db->query("DELETE FROM invoice WHERE invoice='$invoice' and (id_user='$id_user' )  ");	
	$this->db->query("DELETE FROM invoice_list WHERE  invoice='$invoice' ");	
	?> 
	<script>  document.location.href="<?php echo($site) ?>page/invoice";   </script>  
	<?php 
	exit();
	}
} 

$table = "invoice_view";
$sql = "invoice='$invoice' and (id_user='$id_user'  ) ";
$row = $this->model->row($table,$sql);
if($row >= 1){
$data = $this->model->get_obj($table,$sql)[0];
$invoice = $data->invoice;

if(isset($_POST['masukkan_bukti'])){
	require_once("isset_image.php");
	if(!empty($image)){
		$this->db->query("UPDATE invoice SET `bukti`='$image' , status='Dalam Pengecekan' WHERE invoice='$invoice' ");
		$alert = "success";
		$respon = "Berhasil Memasukkan Bukti Pembayaran. ";
				
				
		$table = "invoice_view";
		$sql = "invoice='$invoice' and (id_user='$id_user'  ) ";
		$row = $this->model->row($table,$sql);
		if($row >= 1){
		$data = $this->model->get_obj($table,$sql)[0];
		$invoice = $data->invoice;
		}

		
	} 
} 

?>



<div class="padding pt-3 pb-5">
<?php include("alert_form.php"); ?>

<div class="card card-style border-primary">
	<div class="card-body">
		<div class="card-header-style bg-white ">
			<h6 class="m-0 w-100-50"><strong>Invoice : #<?php echo($data->invoice) ;  ?></strong></h6>
		</div>
		<div class="padding pb-3"> 
			<div class="payment-card border-0">
				<div class="w-100-100 fs-14 cart-block"><span>Total Pembayaran</span><strong class="fs-16">Rp. <?php echo(uang($data->total)) ;  ?><br></strong></div> 
			</div>  
			
			<div class="payment-card border-0">
				<div class="w-100-100 fs-14 cart-block">
				<span>Status Invoice </span> 
				<strong class="fs-16"><?php echo($data->status) ;  ?><br></strong>
				</div> 
			</div>
			
			<div class="payment-card border-0">
				<div class="w-100-100 fs-14 cart-block">
				<span>Alamat Pengiriman </span> 
				<strong class="fs-16"><?php echo($data->alamat) ;  ?><br></strong>
				</div> 
			</div>
			 
			  
			
		</div>
	</div>
</div>



<div class="card card-style">
	<div class="card-body">
		<h6 class="card-title padding">Cara Pembayaran</h6>
		<div class="padding pb-3 fs-14">
		<style>
			h4,h5{font-weight : bold; font-size : 16px!important }
		</style>
			Silahkan Lakukan Pembayaran Pada Salah Satu Nomor Rekening Di Bawah Ini, Pastikan anda memiliki bukti struk pembayaran . dan masukkan ke dalam form dibawah ini untuk konfirmasi . Terima kasih 
			<br />
			
			<?php $table = "bank";
			$sql = "`id`<>-1";
			$row = $this->model->row($table,$sql);
			if($row >= 1){
				$dd = $this->model->get_obj($table,$sql);
				foreach($dd as $bank){
					?> 
					<div class="p-3 shadow-sm mb-2">
						<img src="<?php echo($site) ?>image/<?php echo($bank->image) ;  ?>"  style="height: 20px;"  />
						<h4 class="mt-2 mb-0"> Nomor Rekening : <?php echo($bank->bank_rekening) ;  ?></h4> 
						<h4> AN : <?php echo($bank->bank_nama) ;  ?></h4> 
											
					</div> 
					<?php 
				}
			} 
			 ?>
			 <br />
			  
			
			<form method="post" enctype="multipart/form-data"> 
				<?php if(!empty($data->bukti)){?> 
				<div class="bg-light p-3 mb-2" align="center">
					<img src="<?php echo($site) ?>image/<?php echo($data->bukti) ;  ?>"  style="height: 50px; border-radius:5px "  class="" />
				</div> 
				<?php 
				}  ?>
				<span> <b> Bukti Transfer </b> </span> 
				<input type="file" required class="form-control" name="image" value="" placeholder=""    />
				<br />
				<button type="submit" class="btn btn-primary" name="masukkan_bukti" >Masukkan Bukti Transfer</button> 
				<br />
				 
			
			
			</form>
			
		
		</div>
	</div>
</div>



<div class="card card-style border-primary">
	<div class="card-body">
		<div class="card-header-style bg-white ">
			<h6 class="m-0 w-100-50"><strong>Detail Belanjaan</strong></h6>
		</div>
		<div class="padding pb-3"> 
		
			<?php $table = "invoice_detail_view";
			$sql = "`invoice`='$invoice'";
			$row = $this->model->row($table,$sql);
			if($row >= 1){
				$dd = $this->model->get_obj($table,$sql);
				foreach($dd as $d){
					?> 
					
			<div class="payment-card border-0">
				<div class=""  style="width : 100px;" >
					<img src="<?php echo($site) ?>images/crop/100/70/<?php echo($d->image) ;  ?>"  style="width : 80px; border-radius:5px; "  class="" />
				</div>
				<div class="w-100-100 fs-14 cart-block">
				<strong class="fs-16"><?php echo($d->nama_produk) ;  ?><br></strong>
				<span> QTY : <?php echo($d->qty) ;  ?>, Harga : Rp. <?php echo uang($d->harga) ;  ?><br />
				Sub Total : Rp. <?php echo(uang($d->total)) ;  ?></span> 
				</div> 
			</div> 
					<?php 
				}
			} 
			 ?>
			  
			
		</div>
	</div>
</div>



<p class="fs-14 text-center">Butuh Bantuan? <a class="noevent" target="_blank" href="https://wa.me/<?php echo($settings->whatsapp) ;  ?>?text=Permisi CS - <?php echo($settings->nama) ;  ?>">
<strong>Hubungi CS Sekarang</strong></a>
</p>

<?php if($data->status == "Menunggu Pembayaran"){?> 
<a class="btn btn-danger form-control form-control-sm" onclick="$('#batalkan').slideToggle('slow')" >Batalkan Pesanan</a>
<div class=""  style="display:none" id="batalkan" >
<div class="p-3 bg-light">
	<h4> Apakah Anda Yakin Ingin Membatalkan Pesanan Ini </h4> 
	<form method="post" enctype="multipart/form-data"> 
		<button type="submit" class="btn btn-danger" name="delete" >Saya Yakin, Batalkan</button> 
	</form>
</div>

</div>

<?php }  ?>

</div>
 



<input type="text"  style="height: 5px; width : 5px; overflow:hidden; border:0px; padding:0px; font-size : 1px;" id="copy" required   name="name" value="" placeholder=""    />
<script>  
function copyx(numx){
	$('#copy').val(numx);
  var copyText = document.getElementById("copy");
  
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */
  navigator.clipboard.writeText(copyText.value);
  
  alert("Berhasil Menyalin");
  
}
  </script> 
  
<?php } ?>

