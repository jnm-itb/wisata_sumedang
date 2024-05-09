<?php 	
	if(isset($_POST['login'])){
		$user_id = in($_POST['user_id']);
		$password = in($_POST['password']);
		$table = "user";
		$sql = "`user_id`='$user_id' and password='$password'";
		$row = $this->model->row($table,$sql);
		if($row >= 1){
			$user = $this->model->get_obj($table,$sql)[0];
			
			$_SESSION['user'] = $user;
			?> 
			<script>  document.location.href="<?php echo($site) ?>";   </script>  
			<?php 
			exit();
			
		} else {
			$alert = "danger";
			$respon = "Maaf. User ID Atau Password anda salah ";
			
		}
		  
	} 
?>

<div class="padding card-login bg-style">
	<div class="d-block w-100 "> 
		<div class="block-all pb-5">
			<strong>Selamat Datang di <?php echo($settings->nama) ;  ?><br></strong>
			<p class="">Masukkan User ID Dan Password Untuk Melanjutkan<br></p>
			 <form method="post" enctype="multipart/form-data">
<?php include("alert_form.php"); ?>			 
			<span  style="font-weight : bold; font-size : 14px" > User ID </span> 
			<input name="user_id" type="text" class="form-control  input-login" placeholder="User ID Login" align="center">
			
			<span  style="font-weight : bold; font-size : 14px; display:block; margin-top: 10px" > Password </span> 
			<input name="password" type="password" class="form-control  input-login" placeholder="Password Login" align="center">
			
			<button type="submit" name="login" class="btn btn-success form-control mt-2 radius-5 "   > Masuk Sekarang</button> 
			 </form>
			 
			<div class="d-flex align-items-center mt-3 fs-14 justify-content-between">
				<a class="text-dark " href="<?php echo($site) ?>page/forgot" > Lupa Password ?</a> 
				<a class="text-dark " href="<?php echo($site) ?>page/daftar" > Daftar Sekarang </a> 
			
			</div> 
		</div>
	</div>
</div>
