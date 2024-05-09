<?php 
$row = $this->model->row('bank'," `id`='$id' ");
if($row >= 1){
$data = $this->model->get_obj('bank'," `id`='$id' ")[0];


if(isset($_POST['edit_bank'])){
	 
	$bank_nama = in($_POST['bank_nama']);
	$bank_rekening = in($_POST['bank_rekening']);
	$bank_jenis = in($_POST['bank_jenis']);
	 
	
	$table = "bank";
	$sql = "bank_rekening='$bank_rekening' and id <> '$id' ";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$alert = "danger";
		$respon = "Maaf. Data ini sudah ada sebelumnya ";
	} else {
		
		require_once("isset_image.php");
			
		$datax = array();
		$datax['bank_jenis'] = $bank_jenis ;
		$datax['bank_rekening'] = $bank_rekening ;
		$datax['bank_nama'] = $bank_nama ;
		if(!empty($image)){
		$datax['image'] = $image ;   
		}
		$this->db->where('id',$id);
		$this->db->update('bank',$datax);
		 
		
		$alert = "success";
		$respon = "Berhasil Memperbaharui Data ";
		?> 
		<script>  document.location.href="<?php echo($site) ?>master/bank";   </script>  
		<?php
		exit();
	
		
	}
		
		
} 


?>
 <div class="container-fluid">
<div class="row"> 
	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-12   ">
		 
		<div class="card">
			<div class="card-header">
				<h4>Edit Data Bank </h4>
			</div>
			<div class="card-body">
				<form method="post" enctype="multipart/form-data"> 
					<?php include("alert_form.php"); ?>
					<span> Image </span> 
					<input type="file" class="form-control" name="image" value="" placeholder="Jenis Bank"    />
					<br />
					
					<span> Jenis Bank </span> 
					<input type="text" required class="form-control" name="bank_jenis" value="<?php echo($data->bank_jenis) ;  ?>" placeholder="Jenis Bank"    />
					<br />
					<span> Nomor Rekening</span> 
					<input type="text" required class="form-control" name="bank_rekening" value="<?php echo($data->bank_rekening) ;  ?>" placeholder="Nomor Rekening "    />
					<br />
					<span> Atas Nama </span> 
					<input type="text" required class="form-control" name="bank_nama" value="<?php echo($data->bank_nama) ;  ?>" placeholder="Atas Nama"    />
					<br />
					
					<button name="edit_bank" type="submit" class="btn btn-primary" > <i class="la la-ticket">  </i> Edit Data</button>
				</form>
			</div>
		</div>
	</div> 
	
	
	 
</div>
</div>

 
<?php } else {?> 
<script>  document.location.href="<?php echo($site) ?>master/bank";   </script>  
<?php
exit();
 } ?>

