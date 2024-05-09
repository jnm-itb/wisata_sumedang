<?php  
$row = $this->model->row('settings'," id<>-1 ");
if($row >= 1){
	$settings = $this->model->get_obj('settings'," id<>-1 ")[0];
} else {
	echo("Terjadi Kesalahan Website ") ; 
	exit();
}

if(isset($_POST['edit'])){
	$nama = in($_POST['nama']);
	$deskrispi = in($_POST['deskrispi']);
	$whatsapp = in($_POST['whatsapp']);
	require_once("isset_image.php");
	
	$this->db->query("UDPATE settings SET `nama`='$nama' , `deskripsi`='$deskripsi',
	`whatsapp`='$whatsapp' ");
	
	if(!empty($image)){ $this->db->query("UPDATE settings SET `logo`='$image' "); } 
	if(!empty($image2)){ $this->db->query("UPDATE settings SET `favicon`='$image2' "); } 
	
	$alert = "success";
	$respon = "Berhasil Memperbaharui Website ";
	
	$table = "settings";
	$sql = "`id`<>-1";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$settings = $this->model->get_obj($table,$sql)[0];
	} 
} 

?>

<div class="container-fluid">
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 ">
		
		<div class="card">
			<div class="card-header">
				<h4>Pengtaturan Aplikasi/ Website</h4>
			</div>
			<div class="card-body">
				<form method="post"  enctype="multipart/form-data"> 
					 <?php include("alert_form.php"); ?>
					<span> Nama Website </span> 
					<input type="text" required class="form-control" name="nama" value="<?php echo($settings->nama) ;  ?>" placeholder=""    />
					<br />
					<span> Description </span> 
					<textarea type="text" required class="form-control" name="deskripsi"  placeholder=""    /><?php echo html_entity_decode(htmlspecialchars_decode($settings->deskripsi)) ;  ?></textarea>
					<br /> 
					<span> Whatsapp </span> 
					<input type="number" required class="form-control" name="whatsapp" value="<?php echo($settings->whatsapp) ;  ?>" placeholder=""    />
					<br />
					
					<span> Ubah Logo</span>  
					<input type="file"  class="form-control" name="image" placeholder=""    />
					<br />
					<span> Ubah Favicon</span> 
					<input type="file"  class="form-control" name="image2" placeholder=""    />
					<br />
					 
					
					 
					
					 
					<button name="edit" type="submit" class="btn btn-primary" >Edit Website</button> 
				</form>
			</div>
		</div>
</div> 
</div> 


 
			 