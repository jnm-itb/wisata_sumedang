<?php 	
if(isset($_POST['daftar'])){
	$nama = in($_POST['nama']);
	$telepon = in($_POST['telepon']);
	$email = in($_POST['email']);
	$user_id = in($_POST['user_id']);
	$password = in($_POST['password']);   
	
	$row = $this->model->row("user","user_id='$user_id'  ");
	if($row >= 1){
		$alert = "danger";
		$respon = "Maaf. User ID Ini sudah terdaftar sebelumnya ";
	}else {
		$row = $this->model->row("user","email='$email' ");
		if($row >= 1){
			$alert = "danger";
			$respon = "Maaf. Email ini sudah terdaftar sebelumnya ";
		}else{
			$data = array();
			$data['user_id'] = $user_id ;
			$data['password'] = $password ;
			$data['nama'] = $nama ;
			$data['telepon'] = $telepon ;
			$data['email'] = $email ;
			
			$this->db->insert('user',$data);
			$return  = $this->db->insert_id(); 
			
			$alert = "success";
			$respon = "Berhasil Melakukan Pendaftaran , Silahkan Login Menggunakan User ID ".$user_id;
			
			
		}
	}
	
	
} 
?>



<div class="padding  pt-3 pb-3 bg-style">
	<div class="d-block w-100 "> 
		<div class="block-all ">
			<strong>Selamat Datang di <?php echo($settings->nama) ;  ?><br></strong>
			<p class="">Silahkan Lengkapi Formulir Pendaftaran<br></p>
			 <?php include("alert_form.php"); ?>
			 <form method="post" enctype="multipart/form-data"> 
			<span  style="font-weight : bold; font-size : 14px" > Nama Lengkap</span> 
			<input name="nama" type="text" class="form-control  input-login" placeholder="Nama Lengkap" align="center">
		 
			<span  style="font-weight : bold; font-size : 14px; display:block; margin-top: 10px" > Telepon </span> 
			<input name="telepon" type="text" class="form-control  input-login" placeholder="Nomor Telepon" align="center">
		 
			<span  style="font-weight : bold; font-size : 14px; display:block; margin-top: 10px" > Email </span> 
			<input name="email" type="email" class="form-control  input-login" placeholder="Alamat Email" align="center">
		 
			<span  style="font-weight : bold; font-size : 14px; display:block; margin-top: 10px" > User ID </span> 
			<input name="user_id" type="text" class="form-control  input-login" placeholder="User ID Login" align="center">
			
			<span  style="font-weight : bold; font-size : 14px; display:block; margin-top: 10px" > Password </span> 
			<input name="password" type="password" class="form-control  input-login" placeholder="Password Login" align="center">
			
			<button type="submit" name="daftar" class="btn btn-success form-control mt-2 radius-5 "   > Masuk Sekarang</button> 
			 </form>
			 
			<div class="d-flex align-items-center mt-3 fs-14 justify-content-between">
				<a class="text-dark " href="<?php echo($site) ?>page/forgot" > Lupa Password ?</a> 
				<a class="text-dark " href="<?php echo($site) ?>page/login" > Masuk Sekarang </a> 
			
			</div> 
		</div>
	</div>
</div>
