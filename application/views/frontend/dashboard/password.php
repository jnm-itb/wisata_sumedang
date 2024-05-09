<?php  
if(!empty($user)){

	if(isset($_POST['new'])){
		
		$new_user_id = in($_POST['new_user_id']);
		$new_password = in($_POST['new_password']);
		$old_password = in($_POST['old_password']);
		
		
		
		if($old_password == $user->password){
		
		
		$table = "user";
		$sql = "`user_id`='$new_user_id' and id <> '$id_user' ";
		$row = $this->model->row($table,$sql);
		if($row >= 1){
			$alert = "danger";
			$respon = "Sorry - This User ID Has Already Exits, Please Change with unique ID ";
		} else {
			
			$this->db->query("UPDATE user SET `user_id`='$new_user_id' , password='$new_password' WHERE id='$id_user'   ");
			
			
			$alert = "success";
			$respon = "Success Update Your Access Login  ";
		}
		
		
		
		} else {
			$alert = "danger";
			$respon = "Sorry - Your Password Has Wrong . Please Check Again ";
			
		}
		
		
		$table = "user";
		$sql = "`id`='$id_user'";
		$row = $this->model->row($table,$sql);
		if($row >= 1){
			$user = $this->model->get_obj($table,$sql)[0];
			$_SESSION['user'] = $user; 
		} 
		
		
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
			<h5 class="m-0"> Update Access Login  </h5> 
			<p class="m-0"> You Can Update Your Access Login Here </p> 
		</div>
		<div class="card-body shadow-sm">
			<form method="post" enctype="multipart/form-data"> 
			<?php include("alert_form.php"); ?>
			
			<div class="" align="center">
				<img src="<?php echo($site) ?>images/crop/100/100/<?php echo($user->image) ;  ?>"  style="width : 100px; border-radius:100%; "  class="" />
							
			</div>
			
			<span> New User ID *</span> 
			<input type="text" required class="form-control" name="new_user_id" value="<?php echo($user->user_id) ;  ?>" placeholder="User ID Login"    />
			
			<span> New Password *</span> 
			<input type="text" required class="form-control" name="new_password" value="" placeholder="New Password"    />
			
			
			<hr>
			<span> Confirm Your Password </span> 
			<input type="text" required class="form-control" name="old_password" value="" placeholder="Your Password"    />
			<br />
			 
			
			
			<button type="submit" name="new" class="btn btn-primary" >Update Access Login</button> 
			</form>
			
		</div>
		</div>
		</div>
		</div>
			


	</div>
	</div>
	
	
</section>

<?php } ?>