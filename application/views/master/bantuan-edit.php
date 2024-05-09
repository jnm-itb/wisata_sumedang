<?php 
if(!empty($id)){

$row = $this->model->row('bantuan'," `id`='$id'  ");
if($row >= 1){
$data = $this->model->get_obj('bantuan'," `id`='$id'  ")[0];

 ?>
<link rel="stylesheet" href="<?php echo($site) ?>/assets/modules/summernote/summernote-bs4.css">
<link rel="stylesheet" href="<?php echo($site) ?>/assets/modules/codemirror/lib/codemirror.css">
<link rel="stylesheet" href="<?php echo($site) ?>/assets/modules/codemirror/theme/duotone-dark.css">
<link rel="stylesheet" href="<?php echo($site) ?>/assets/modules/jquery-selectric/selectric.css">  

<script src="<?php echo($site) ?>/assets/modules/summernote/summernote-bs4.js"></script>
<script src="<?php echo($site) ?>/assets/modules/codemirror/lib/codemirror.js"></script>
<script src="<?php echo($site) ?>/assets/modules/codemirror/mode/javascript/javascript.js"></script>
<script src="<?php echo($site) ?>/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>   



<div class="row justify-content-center">
	<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-12 ">
		
		<div class="card">
			<div class="card-header">
				<h4>Edit Bantuan</h4>
			</div>
			<div class="card-body">
				<form method="post" id="formdata" 
				redirect="<?php echo($site) ?>master/bantuan-list/" 
				action="<?php echo($site) ?>post_master/bantuan_edit/?id=<?php echo($id) ;  ?>" enctype="multipart/form-data"> 
					<span> Title </span> 
					<input type="text" required class="form-control" name="title" value="<?php echo($data->title) ;  ?>" placeholder="Page Name"    />
					<br /> 
					<span> Content </span> 
					<textarea type="text" required class="form-control summernote" name="text" value="" placeholder=""    ><?php echo html_entity_decode(htmlspecialchars_decode($data->text)) ;  ?></textarea>
					<br />
					
					<button name="new" type="submit" class="btn btn-primary" > <i class="la la-ticket">  </i> Perbaharui</button>
				</form>
			</div>
		</div>
	</div> 		
</div>



<?php } ?>
<?php } ?>

