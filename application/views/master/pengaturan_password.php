<?php if(isset($_POST['edit'])){
	$user_id_baru = in($_POST['user_id_baru']);
	$password_lama = in($_POST['password_lama']);
	$password_baru = in($_POST['password_baru']);
	if($user->password == $password_lama){
		
		$this->db->query("UPDATE master SET user_id='$user_id_baru', `password`='$password_baru' ");
		
		$alert = "success";
		$respon = "Berhasil Memperbaharui Data ";
		
		$table = "master";
		$sql = "`id`<>-1";
		$row = $this->model->row($table,$sql);
		if($row >= 1){
			$user = $this->model->get_obj($table,$sql)[0];
			$_SESSION['user_master'] = $user; 
		} 
		 
	}   else {
		$alert = "danger";
		$respon = "Maaf. Password lama anda salah ";
		
	} 
}  ?>

<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-12 ">
		
		<div class="card">
			<div class="card-header">
				<h4>Pengaturan Akses Login </h4>
			</div>
			<div class="card-body">
				<form method="post"   enctype="multipart/form-data"> 
					<?php include("alert_form.php"); ?>
					
					<span> User ID Baru </span> 
					<input type="text" required class="form-control" name="user_id_baru" value="" placeholder="User ID Baru"    />
					<br />
					<span> Password Baru </span> 
					<input type="password" required class="form-control" name="password_baru" value="" placeholder="Password Baru"    />
					<br />
					<span> Konfirmasi Password Lama </span> 
					<input type="text" required class="form-control" name="password_lama" value="" placeholder="Password Lama"    />
					<br />
					 
					 
					  
					
					<button name="edit" type="submit" class="btn btn-primary" > <i class="la la-ticket">  </i> Perbaharui</button>
				</form>
			</div>
		</div>
	</div> 		
</div>
</div> 