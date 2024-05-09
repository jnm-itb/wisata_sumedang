<?php 
$table = "produk";
$sql = "`id`='$id'";
$row = $this->model->row($table,$sql);
if($row >= 1){
	$data = $this->model->get_obj($table,$sql)[0];
	


if(isset($_POST['new'])){
	$nama = in($_POST['nama']);
	$harga = in($_POST['harga']);
	$text = in($_POST['text']);
	$id_kategori = in($_POST['id_kategori']);
	
	$row = $this->model->row("produk","nama='$nama' and id_kategori='$id_kategori' and id<>'$id'  ");
	if($row >= 1){
		$alert = "danger";
		$respon = "Maaf. Data Ini sudah ada sebelumnya";
	} else { 
		
		require_once("isset_image.php"); 
		
		
			$data = array();
			$data['nama'] = $nama ;
			$data['harga'] = $harga ;
			$data['id_kategori'] = $id_kategori ;
			$data['text'] = $text ;
			if(!empty($image)){
				$data['image'] = $image ;
			} 
			$this->db->where('id',$id);
			$this->db->update('produk',$data);
			
			
			$alert = "success";
			$respon = "Berhasil Memperbaharui Data ";
			
			?> 
			<script>  document.location.href="<?php echo($site) ?>master/produk";   </script>  
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
		
		<span> Nama Produk </span> 
		<input type="text" required class="form-control" name="nama" value="<?php echo($data->nama) ;  ?>" placeholder="Nama Produk"    />
		<br />
		<span> Harga Satuan </span> 
		<input type="number" required class="form-control" name="harga" value="<?php echo($data->harga) ;  ?>" placeholder="Harga Satuan"    />
		<br />
		<span> Image </span> 
		<input type="file"   class="form-control" name="image" value="" placeholder=""    />
		<br />
		 
		
		<span> Kategori </span> 
		<select type="text" required class="form-control" name="id_kategori" value="" placeholder=""   >
		<?php $table = "kategori";
		$sql = "`id`<>-1";
		$row = $this->model->row($table,$sql);
		if($row >= 1){
			$dd = $this->model->get_obj($table,$sql);
			foreach($dd as $d){
				?> 
				<option <?php if($d->id == $data->id_kategori){echo(" selected ") ; }  ?> value="<?php echo($d->id) ;  ?>"  > <?php echo($d->nama) ;  ?> </option> 
				<?php 
			}
		} 
		 ?>
		</select>
		<br />
		 
		
		
		<span> Deskripsi Produk </span> 
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