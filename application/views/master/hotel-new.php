<?php 	
if(isset($_POST['new'])){
$judul = in($_POST['judul']);
$whatsapp = in($_POST['whatsapp']);
$text = in($_POST['text']);
$harga = in($_POST['harga']);
 
	
	$row = $this->model->row("hotel","judul='$judul' and whatsapp='$whatsapp'  ");
	if($row >= 1){
		$alert = "danger";
		$respon = "Maaf. Data Ini sudah ada sebelumnya";
	} else {
		
		$alert = "success";
		$respon = "Berhasil Memasukkan Data Baru ";
		
		require_once("isset_image.php");
		
		
		if(!empty($image)){
			
			$data = array();
			$data['judul'] = $judul ;
			$data['image'] = $image;
			$data['text'] = $text;
			$data['harga'] = $harga;
			$data['whatsapp'] = $whatsapp;  
			$data['image'] = $image ;  
			$this->db->insert('hotel',$data);
			$return  = $this->db->insert_id();  
			
			
			$alert = "success";
			$respon = "Berhasil Memasukkan Data Baru ";
		
		} else {
			$alert = "danger";
			$respon = "Maaf. Image yang anda masukkan tidak valid ";
			
		}
		
		
	}
    
}  ?>

<link rel="stylesheet" href="<?php echo($site) ?>/assets/modules/summernote/summernote-bs4.css">
<link rel="stylesheet" href="<?php echo($site) ?>/assets/modules/codemirror/lib/codemirror.css">
<link rel="stylesheet" href="<?php echo($site) ?>/assets/modules/codemirror/theme/duotone-dark.css">
<link rel="stylesheet" href="<?php echo($site) ?>/assets/modules/jquery-selectric/selectric.css">  

<script src="<?php echo($site) ?>/assets/modules/summernote/summernote-bs4.js"></script>
<script src="<?php echo($site) ?>/assets/modules/codemirror/lib/codemirror.js"></script>
<script src="<?php echo($site) ?>/assets/modules/codemirror/mode/javascript/javascript.js"></script>
<script src="<?php echo($site) ?>/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>   


<div class="container-fluid">
<a class="btn btn-primary mb-2" href="<?php echo($site) ?>master/hotel" > Kembali </a> 
<?php include("alert_form.php"); ?>
<div class="row">
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-12   ">
	
<div class="card ">
<div class="card-header bg-primary">
	<h5 class="m-0  text-light"> Tambah Data </h5>  
</div>
<div class="card-body shadow-sm">
	<form method="post" enctype="multipart/form-data"> 
		
		<span> Judul Trip </span> 
		<input type="text" required class="form-control" name="judul" value="" placeholder="Nama Hotel"    />
		<br />
		<span> Image </span> 
		<input type="file" required class="form-control" name="image" value="" placeholder=""    />
		<br />
		 
		<span> Whatsapp </span> 
		<input type="number" required class="form-control" name="whatsapp" value="" placeholder="Whatsapp"    />
		<br />
		
		 
		<span> Harga Permalam </span> 
		<input type="number" required class="form-control" name="harga" value="" placeholder="Harga Permalam "    />
		<br />
		
		
		  
		
		<span> Deskripsi Trip </span> 
		<textarea type="text" required class="form-control summernote" name="text" value="" placeholder=""    ></textarea>
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