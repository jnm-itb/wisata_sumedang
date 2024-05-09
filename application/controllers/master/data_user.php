<?php 
$login = "";
$user = "";
  

if((!empty($_SESSION['user_master']))){
	$user  = ($_SESSION['user_master']);
	$login = "ok";
}

if(isset($_POST['login'])){
	$user_id = in($_POST['user_id']);
	$password = in($_POST['password']);
	
	$row = $this->model->row('master'," user_id='$user_id' and password='$password'  ");
	if($row >= 1){
		 
		$user = $this->model->get_obj('master'," user_id='$user_id' and password='$password' ")[0];
		$_SESSION['user_master'] = $user;   
		$login = "ok";		
		$response['alert'] = "success";
		$response['respon'] = "Selamat Datang Di Dashboard Administrator ";	
	
	} else {
		$response['alert'] = "danger";
		$response['respon'] = "Maaf. Password Anda salah , Harap Masukkan dengan benar ";
	} 
	 
}



?>