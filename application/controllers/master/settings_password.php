<?php 
$response = array();
$alert = "danger";
$respon = "Terjadi Kesalahan Pada Server";


if(!empty($_POST)){
	
	
	$user_id = in($_POST['user_id']); 
	$password = in($_POST['password']);
	$old_password = in($_POST['old_password']);
	$password2 = in($_POST['password2']);
	  
	
	$id = "";
	if(!empty($_GET['id'])){ 
	$id = in($_GET['id']); 
	}
	

	$row = $this->model->row('master'," user_id='$user_id' and id<>'$id' ");
	if($row >= 1){
		$respon = "Maaf. User ID Ini telah digunakan sebelumnya";
	} else {
		
		$user = $_SESSION['user_master']; 
		
		if(strtolower($user->password) == strtolower($old_password)){
			if($password == $password2){
			$this->db->query("UPDATE master SET `user_id`='$user_id',`password`='$password'  WHERE id='$id'   ");	
			$alert = "success";
			$respon = "Password And User ID Has Changed ";
			 
			$master = $this->model->get_obj('master'," id='$id' ")[0];
			$_SESSION['user_master'] = $master; 
			
			} else {
				$alert = "danger";
				$respon = "Password Baru Pertama Dan Kedua Tidak Sama ";
				
			}
		} else {
			$alert = "danger";
			$respon = "Sorry - Your Old Password is wrong";
		} 
	
	}
	 
	
}



$response['data'] = $_POST;
$response['alert'] = $alert;
$response['respon'] = $respon;
$res = json_encode($response);
echo($res) ; 

?>