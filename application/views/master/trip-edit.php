<?php 
$table = "trip";
$sql = "`id`='$id'";
$row = $this->model->row($table,$sql);
if($row >= 1){
	$data = $this->model->get_obj($table,$sql)[0];
	


if(isset($_POST['new'])){
	
$judul = in($_POST['judul']);
$whatsapp = in($_POST['whatsapp']);
$text = in($_POST['text']);


	
	$row = $this->model->row("trip","judul='$judul' and whatsapp='$whatsapp' and id<>'$id'  ");
	if($row >= 1){
		$alert = "danger";
		$respon = "Maaf. Data Ini sudah ada sebelumnya";
	} else { 
		require_once("isset_image.php"); 
		$data = array();
		$data['judul'] = $judul;
		$data['whatsapp'] = $whatsapp ;
		$data['text'] = $text;
		
		if(!empty($image)){ $data['image'] = $image ; } 
		if(!empty($file)){ $data['brosur'] = $file; } 
		
		$this->db->where('id',$id);
		$this->db->update('trip',$data);
		
		$alert = "success";
		$respon = "Berhasil Memperbaharui Data ";
		 
		?> 
		<script>  document.location.href="<?php echo($site) ?>master/trip";   </script>  
		<?php 
		exit();
	}
}  
?>



<link rel="stylesheet" href="<?php echo($site) ?>/assets/modules/summernote/summernote-bs4.css">
<link rel="stylesheet" href="<?php echo($site) ?>/assets/modules/codemirror/lib/codemirror.css">
<link rel="stylesheet" href="<?php echo($site) ?>/assets/modules/codemirror/theme/duotone-dark.css">
<link rel="stylesheet" href="<?php echo($site) ?>/assets/modules/jquery-selectric/selectric.css">  

<script src="<?php echo($site) ?>/assets/modules/summernote/summernote-bs4.js"></script>
<script src="<?php echo($site) ?>/assets/modules/codemirror/lib/codemirror.js"></script>
<script src="<?php echo($site) ?>/assets/modules/codemirror/mode/javascript/javascript.js"></script>
<script src="<?php echo($site) ?>/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>   


<div class="container-fluid">
<a class="btn btn-primary mb-2" href="<?php echo($site) ?>master/produk" > Kembali </a> 
<?php include("alert_form.php"); ?>
<div class="row">
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-12   ">
	
<div class="card ">
<div class="card-header bg-primary">
	<h5 class="m-0  text-light"> Edit Data </h5>  
</div>
<div class="card-body shadow-sm">
	<form method="post" enctype="multipart/form-data"> 
		
		<span> Judul Trip </span> 
		<input type="text" required class="form-control" name="judul" value="<?php echo($data->judul) ;  ?>" placeholder="Judul Trip"    />
		<br />
		<span> Image </span> 
		<input type="file"   class="form-control" name="image" value="" placeholder=""    />
		<br />
		 
		<span> Whatsapp </span> 
		<input type="number" required class="form-control" name="whatsapp" value="<?php echo($data->whatsapp) ;  ?>" placeholder="Whatsapp"    />
		<br />
		
		<span> File Brosur Jika Ada </span> 
		<input type="file"   class="form-control" name="file" value="" placeholder=""    />
		<br />
		  
		
		<span> Deskripsi Trip </span> 
		<textarea type="text" required class="form-control summernote" name="text" value="" placeholder=""    ><?php echo html_entity_decode(htmlspecialchars_decode($data->text)) ;  ?></textarea>
		<br />
		  
		  
		
		
		<button type="submit" name="new" class="btn btn-primary" >Masukkan Data</button> 
		
	
	</form>
</div>
</div>
</div>



</div>
</div>




<script>  

$(document).ready(function() {
$('.summernote').summernote({
	height: 300
});
});
  </script> 
  
<?php } ?>