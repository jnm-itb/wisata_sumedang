<?php  
$id_user = -1;
if(!empty($login)){
	$id_user = $user->id;
} 

if(isset($_POST['delete'])){
	$id_del = in($_POST['id_del']);
	$invoice = $id_del;
	$row = $this->model->row('invoice'," invoice='$invoice' and (id_user='$id_user' )  ");
	if($row >= 1){
	$this->db->query("DELETE FROM invoice WHERE invoice='$invoice' and (id_user='$id_user' )  ");	
	$this->db->query("DELETE FROM invoice_list WHERE invoice='$invoice' ");	   
	} 
} 
 

?>
 

<div class="pt-3 pb-4">
<div class="padding ">
	<div class="fs-14">
		<h5 class="m-0"> <b> Pesanan Anda </b></h5> 
		<p class="m-0"> Berikut Riwayat Pesanan Anda - Silahkan Lanjutkan Pembayaran untuk invoice yang belum terbayar </p> 
		<hr class="mb-0">
		
		<?php $table = "invoice";
		$sql = "`id_user`='$id_user' ORDER BY id DESC LIMIT 20 ";
		$row = $this->model->row($table,$sql);
		if($row >= 1){
			$dd = $this->model->get_obj($table,$sql);
			foreach($dd as $data){
				?> 
					
					
		<div class="d-block padding shadow mb-2 bg-white nolink w-100" >
		<div class="pt-3 pb-3">
		<b class="fs-16">Invoice : #<?php echo($data->invoice) ;  ?> </b>
		<p class="fs-14 mb-0"><b> Total </b> : Rp. <?php echo(uang($data->total)) ;  ?> <br /> 
		<b> Status Invoice </b> : <?php echo($data->status) ;  ?> <br />
		<b> Alamat Tujuan : </b> <?php echo($data->alamat) ;  ?> </p>
		
			<div class="pt-2">
			<?php if(($data->status == "Menunggu Pembayaran") or ($data->status == "Dalam Pengecekan")or ($data->status == "Bukti Ditolak")){?> 
				<a class="btn btn-success btn-sm "  style="margin-right:5px; "  href="<?php echo($site) ?>page/checkout/<?php echo($data->invoice) ;  ?>" > Bayar Sekarang / Lihat </a>
			<?php }  ?>
			
		 	</div>
		 
		</div> 
		</div> 
		
		
				<?php 
			}
		} 
		 ?>
		
		
		
		 
			
	</div>
</div>	
</div>



 