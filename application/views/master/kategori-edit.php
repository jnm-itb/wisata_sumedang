<?php 
$table = "kategori";
$sql = "`id`='$id'";
$row = $this->model->row($table,$sql);
if($row >= 1){
	$data = $this->model->get_obj($table,$sql)[0];
	



if(isset($_POST['new'])){
	$nama = in($_POST['nama']);
	$table = "kategori";
	$sql = "`nama`='$nama' and id<>'$id'";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$alert = "danger";
		$respon = "Maaf. Data ini sudah ada sebelumnya ";
	} else {
		
		$this->db->query("UPDATE kategori SET `nama`='$nama' WHERE id='$id'  ");
		$alert = "success";
		$respon = "Berhasil Memperbaharui Data Baru ";
		
		?> 
		<script>  document.location.href="<?php echo($site) ?>master/kategori";   </script>  
		<?php 
		exit();
		
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
		<input type="text" required class="form-control" name="nama" value="<?php echo($data->nama) ;  ?>" placeholder="Nama Kategori"    />
		<br />
		<button type="submit" name="new" class="btn btn-primary" >Masukkan Data</button> 
		
	
	</form>
</div>
</div>
</div>




 
</div>
</div>

<?php } ?>