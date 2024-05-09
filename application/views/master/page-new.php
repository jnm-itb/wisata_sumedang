<?php if(isset($_POST['new'])){
	$title = in($_POST['title']);
	$text = in($_POST['text']);
	$row = $this->model->row("page","title='$title' ");
	if($row >= 1){
		$alert = "danger";
		$respon = "Maaf. Data ini sudah ada sebelumnya ";
	}  else {
		$this->db->query("INSERT INTO page (`title`,`text`) VALUES ('$title','$text') ");
		$alert = "success";
		$respon = "Berhasil Menambahkan Data Page Baru ";
		
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
<div class="row justify-content-center">
	<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-12 ">
		
		<div class="card">
			<div class="card-header">
				<h4>Page Baru </h4>
			</div>
			<div class="card-body">
				<form method="post" enctype="multipart/form-data"> 
				<?php include("alert_form.php"); ?>
					<span> Title </span> 
					<input type="text" required class="form-control" name="title" value="" placeholder="Page Name"    />
					<br /> 
					<span> Content </span> 
					<textarea type="text" required class="form-control summernote" name="text" value="" placeholder=""    ></textarea>
					<br />
					
					<button name="new" type="submit" class="btn btn-primary" > <i class="la la-ticket">  </i> Tambah Data Page</button>
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