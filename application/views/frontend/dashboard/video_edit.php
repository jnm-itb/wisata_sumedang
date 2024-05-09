<?php 
$table = "video";
$sql = "`id`='$id' and id_user='$id_user' ";
$row = $this->model->row($table,$sql);
if($row >= 1){
	$data = $this->model->get_obj($table,$sql)[0];
	
	
	if(isset($_POST['new'])){
		$title = in($_POST['title']);
		$this->db->query("UPDATE video SET `title`='$title' WHERE id='$id' and id_user='$id_user'   ");
		 
		
				
		$target_dir = "image/";
		if(!empty($_FILES['image'])){
		$r = rand(0,9999);
		$u = date('ymdhis').$r;

		$img_name  = str_replace("?","",$_FILES["image"]["name"]) ;
		$img_name  = str_replace("&","",$img_name) ;
		$tmp = $_FILES["image"]["tmp_name"];
		$ex = strtolower(pathinfo($img_name ,PATHINFO_EXTENSION));
		$file_name = $target_dir .$u.".".$ex;
		$new_image = $u.".".$ex;
		if(($ex == "png") or($ex == "jpeg") or($ex == "jpg") or($ex == "bmp")){
			if (move_uploaded_file($tmp, $file_name)) {
				$image = $new_image;
				$this->db->query("UPDATE video SET image='$image' WHERE id='$id'  ");
				
			}  
		}
		}
		
		
		$alert = "success";
		$respon = "Success Update Video Data ";
		
	} 
	

?>




<section class="h-100 w-100 section_home d-flex align-items-center justify-content-center text-light"   >
	<div class=""  style="height: 100vh; padding-top:100px; overflow:auto; width : 100%; padding-bottom:100px" >
	<div class="container"> 
	
		 <div class="row">
		 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 ">
		<div class="card ">
		<div class="card-header">
			<h5 class="m-0"> Update Video  </h5> 
			<p class="m-0"> You Can Update Title And Thumbnail Video </p> 
		</div>
		<div class="card-body shadow-sm">
			<form method="post" enctype="multipart/form-data"> 
			<?php include("alert_form.php"); ?>
			<span> Title *</span> 
			<input type="text" required class="form-control" name="title" value="<?php echo($data->title) ;  ?>" placeholder="Video Title"    />
			 
			<span> Thumbnail </span> 
			<input type="file" class="form-control" name="image"  placeholder=""    />
			 
			
			<button type="submit" name="new" class="btn btn-primary" >Update Video</button> 
			</form>
			
		</div>
		</div>
		</div>
		</div>
			


	</div>
	</div>
	
	
</section>

<?php } ?>