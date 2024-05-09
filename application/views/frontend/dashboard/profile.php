<?php  
if(!empty($user)){

	if(isset($_POST['new'])){
		
		$name = in($_POST['name']);
		$bio = in($_POST['bio']);
		  
		$this->db->query("UPDATE user SET `name`='$name' ,`bio`='$bio' WHERE id='$id_user' ");
		
		
				
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
				$this->db->query("UPDATE user SET image='$image' WHERE id='$id_user'  ");
				
			}  
		}
		}
		
		$table = "user";
		$sql = "`id`='$id_user'";
		$row = $this->model->row($table,$sql);
		if($row >= 1){
			$user = $this->model->get_obj($table,$sql)[0];
		} 
		
		
		
		$alert = "success";
		$respon = "Success Update Your Profile  ";
		
	} 
	

?>




<section class="h-100 w-100 section_home d-flex align-items-center justify-content-center text-light"   >
	<div class=""  style="height: 100vh; padding-top:80px; overflow:auto; width : 100%; padding-bottom:100px" >
	<div class="container"> 
	
		 <div class="row justify-content-center">
		 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 ">
		 <a class="text-light d-block p-1 w-100 pb-3  " href="<?php echo($site) ?>dashboard" > &lt;&lt; Back To Dashboard </a> 
		<div class="card ">
		<div class="card-header">
			<h5 class="m-0"> Update Profile  </h5> 
			<p class="m-0"> You Can Update Your Profile Here </p> 
		</div>
		<div class="card-body shadow-sm">
			<form method="post" enctype="multipart/form-data"> 
			<?php include("alert_form.php"); ?>
			
			<div class="" align="center">
				<img src="<?php echo($site) ?>images/crop/100/100/<?php echo($user->image) ;  ?>"  style="width : 100px; border-radius:100%; "  class="" />
							
			</div>
			
			<span> Name *</span> 
			<input type="text" required class="form-control" name="name" value="<?php echo($user->name) ;  ?>" placeholder="Your Name"    />
			
			
			<span> Profile Image </span> 
			<input type="file"   class="form-control" name="image" value="" placeholder=""    />
			
			<span> BIO </span> 
			<textarea type="text"  style="border:1px solid black"  required class="form-control" name="bio" value="" placeholder="BIO Profile"  ><?php echo($user->bio) ;  ?></textarea>
			
			<br />
			  
			
			<button type="submit" name="new" class="btn btn-primary" >Update Profile</button> 
			</form>
			
		</div>
		</div>
		</div>
		</div>
			


	</div>
	</div>
	
	
</section>

<?php } ?>