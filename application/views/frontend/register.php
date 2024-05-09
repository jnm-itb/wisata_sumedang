<?php 
	$name = "";
	$password = "";
	$user_id = "";
	$email = "";
	
	
	if(isset($_POST['register'])){
		
		$name = in($_POST['name']);
		$password = in($_POST['password']);
		$user_id = in($_POST['user_id']);
		$email = in($_POST['email']);
		  
		
		$table = "user";
		$sql = "`user_id`='$user_id'";
		$row = $this->model->row($table,$sql);
		if($row >= 1){
			$alert = "danger";
			$respon = "Sorry - This User ID Has Already Exists ";
		} else {
			
			$table = "user";
			$sql = "`email`='$email'";
			$row = $this->model->row($table,$sql);
			if($row >= 1){
				$alert = "danger";
				$respon = "Sorry - This Email Has Already Exists ";
			} else {
				$this->db->query("INSERT INTO user (`name`,`email`,`user_id`,`password`) VALUES ('$name','$email','$user_id','$password') ");
				
				$table = "user";
				$sql = "`user_id`='$user_id'";
				$row = $this->model->row($table,$sql);
				if($row >= 1){
					$user = $this->model->get_obj($table,$sql)[0];
					$_SESSION['user'] = $user; 
				} 
				
				$alert = "success";
				$respon = "Success Register New Account , Redirect In 3 Second ";
				
				?> 
				<script>  
					$( document ).ready(function() {
						setTimeout(function(){
							document.location.href="<?php echo($site) ?>"; 
						}, 3000); 
					});
				</script>  
				<?php 
				
			}
		}
	}
?>



<section class="h-100 w-100 section_home ">
	<div class="row justify-content-center align-items-center h-100 w-100 m-0">
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 ">
			<div class="card ">
			<div class="card-header"  style="background: black" >
				<h5 class="mb-0"> Sign Up</h5> 
				<p class="mb-0"> Please enter complete information </p> 
			</div>
			<div class="card-body shadow-sm">
			<?php include("alert_form.php"); ?>
				<form method="post" enctype="multipart/form-data"> 
				<span> Your Name </span> 
				<input type="text" required class="form-control" name="name" value="<?php echo($name) ;  ?>" placeholder="Full Name"    />
				
				<span> Email Address </span> 
				<input type="email" required class="form-control" name="email" value="<?php echo($email) ;  ?>" placeholder="Email Address"    />
				
				<span> User ID</span> 
				<input type="text" required class="form-control currency" name="user_id" value="<?php echo($user_id) ;  ?>" placeholder="User ID"    />
				
				<span> Password Login</span> 
				<input type="password" required class="form-control" name="password" value="<?php echo($password) ;  ?>" placeholder="Your Password Login"    />
				
				<div class="d-flex justify-content-between align-items-center pt-1 pb-3">
					<a class="fs-13 text-dark" href="<?php echo($site) ?>page/forgot" > Forgot Password ? </a> 
					<a class="fs-13 text-dark" href="<?php echo($site) ?>page/login" > Login To Dashboard </a> 
				</div>
				<div class="" align="left">
					<button type="submit" name="register" class="btn btn-primary" >Register Now</button> 
				</div>
				
				</form>
				
			</div>
			</div>
			
		
		</div>
	
	</div>
</section>