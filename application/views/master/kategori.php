<?php if(isset($_POST['new'])){
	$nama = in($_POST['nama']);
	$table = "kategori";
	$sql = "`nama`='$nama'";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$alert = "danger";
		$respon = "Maaf. Data ini sudah ada sebelumnya ";
	} else {
		
		$this->db->query("INSERT INTO kategori (nama) VALUES ('$nama') ");
		
		$alert = "success";
		$respon = "Berhasil Memasukkan Data Baru ";
	}
}  


if(isset($_POST['delete'])){
$id = in($_POST['id']);
$this->db->query("DELETE FROM kategori WHERE id='$id' ");
$alert = "danger";
$respon = "Berhasil Menghapus Data ";	 
} 



?>


<div class="container-fluid bg-light min-vh-100">
<?php include("alert_form.php"); ?>

<div class="row">
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 ">
	
<div class="card ">
<div class="card-header bg-primary">
	<h5 class="m-0  text-light"> Kategori Produk </h5>  
</div>
<div class="card-body shadow-sm">
	<form method="post" enctype="multipart/form-data"> 
		
		<span> Nama Kategori </span> 
		<input type="text" required class="form-control" name="nama" value="" placeholder="Nama Kategori"    />
		<br />
		<button type="submit" name="new" class="btn btn-primary" >Masukkan Data</button> 
		
	
	</form>
</div>
</div>
</div>






<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-12 ">
 
<div class="card ">
<div class="card-header bg-primary">
	<h5 class="m-0  text-light"> Kategori Produk </h5>  
</div>
<div class="card-body shadow-sm">

	
	<table class="table table-striped table-bordered">
		<thead>
		<tr>
			<th> Nama Kategori </th> 
			<th> # </th>
		</tr>
		</thead>
		<tbody>
			<?php $table = "kategori";
			$sql = "`id`<>-1";
			$row = $this->model->row($table,$sql);
			if($row >= 1){
				$dd = $this->model->get_obj($table,$sql);
				foreach($dd as $data){
					?> 
					<tr> 
						<td> <?php echo($data->nama) ;  ?> </td>
						<td> 
						<a class="btn btn-danger btn-sm" onclick="showdel('<?php echo($data->id) ;  ?>','<?php 	echo($data->nama) ;  ?>')" > Delete </a> 
						<a class="btn btn-primary btn-sm" href="<?php echo($site) ?>master/kategori-edit/<?php echo($data->id) ;  ?>" > Edit </a> 
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
