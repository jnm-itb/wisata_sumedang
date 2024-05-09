<?php 
if(isset($_POST['new'])){
	$bank_nama = in($_POST['bank_nama']);
	$bank_rekening = in($_POST['bank_rekening']);
	$bank_jenis = in($_POST['bank_jenis']);
	
	$table = "bank";
	$sql = "bank_rekening='$bank_rekening' ";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$alert = "danger";
		$respon = "Maaf. Data ini sudah ada sebelumnya ";
} else {
	
	require_once("isset_image.php");
	if(!empty($image)){
	
	$data = array();
	$data['bank_jenis'] = $bank_jenis ;
	$data['bank_rekening'] = $bank_rekening ;
	$data['bank_nama'] = $bank_nama ;
	$data['image'] = $image ;   
	$this->db->insert('bank',$data);
	$return  = $this->db->insert_id(); 
	
	$alert = "success";
	$respon = "Berhasil Memasukkan Data Baru ";
	} else {
		$alert = "danger";
		$respon = "Maaf. Data Image yang anda masukkan tidak valid ";
		
	}
	
}
	
	
} 




if(isset($_POST['delete'])){
	$id = in($_POST['id']);
	$row = $this->model->row("bank","id='$id'");
	if($row >= 1){
			
		$this->db->query("DELETE FROM bank WHERE id='$id' ");
		$alert = "success";
		$respon = "Berhasil Menghapus Data Bank ";
		
		
	} 
}  ?>

 

<div class="container-fluid">
<?php include("alert_form.php"); ?>
<div class="row"> 
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12  ">
		
		<div class="card">
			<div class="card-header">
				<h4>Tambah Data Bank</h4>
			</div>
			<div class="card-body">
				<form method="post"  enctype="multipart/form-data"> 
					<span> Image </span> 
					<input type="file" required class="form-control" name="image" value="" placeholder="Jenis Bank"    />
					<br />
					
					<span> Jenis Bank </span> 
					<input type="text" required class="form-control" name="bank_jenis" value="" placeholder="Jenis Bank"    />
					<br />
					
					<span> Nomor Rekening </span> 
					<input type="text" required class="form-control" name="bank_rekening" value="" placeholder="Nomor rekening "    />
					<br />
					<span> Atas Nama</span> 
					<input type="text" required class="form-control" name="bank_nama" value="" placeholder="Atas Nama"    />
					<br />
					
					<button name="new" type="submit" class="btn btn-primary" > <i class="la la-ticket">  </i> Masukkan Data</button>
				</form>
			</div>
		</div>
	</div>
	
	
	
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-12 ">
		<div class="card">
			<div class="card-header">
				<h4>Data Bank  </h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="tables" class="table table-striped">
						<thead>
						<tr> 
							<th>Image</th>					
							<th>Jenis Bank</th>					
							<th>AN </th>					
							<th>Nomor Rekening</th>				
							<th>#</th>
						</tr>
						</thead>
						<tbody>
							<?php $table = "bank";
							$sql = "`id`<> -1";
							$row = $this->model->row($table,$sql);
							if($row >= 1){
								$dd = $this->model->get_obj($table,$sql);
								foreach($dd as $data){
									?> 
									<tr> 
										<td> <img src="<?php echo($site) ?>image/<?php echo($data->image) ;  ?>"  style="width : 40px;"  class="none" />
										
										 </td>
										<td> <?php echo($data->bank_jenis) ;  ?> </td>
										<td> <?php echo($data->bank_nama) ;  ?> </td>
										<td> <?php echo($data->bank_rekening) ;  ?> </td>
										<td>  <a class="btn btn-danger btn-sm" onclick="showdel('<?php echo($data->id) ;  ?>','<?php 	echo($data->bank_jenis) ;  ?>')" > Delete </a> 
						<a class="btn btn-primary btn-sm" href="<?php echo($site) ?>master/bank-edit/<?php echo($data->id) ;  ?>" > Edit </a> 
						</td>
									</tr> 
									<?php 
								}
							} 
							 ?>
						</tbody> 
					</table> 
				</div>
					
			</div>
		</div>	
	</div>
</div>

 

	



</div>
