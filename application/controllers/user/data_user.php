<?php 
$login = "";
$user = "";
$response['saldo'] = 0;
$response['id_user']  = 0; 

if((!empty($_SESSION['user']))){
	$user  = ($_SESSION['user']);  
	$response['id_user'] = $user->id ;
	$login = "ok";
	$id_user = $user->id;
	
	$table = "user";
	$sql = "`id`='$id_user'";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$user = $this->model->get_obj($table,$sql)[0];
		$_SESSION['user'] = $user ;  
		$response['user'] = $user; 
	} 
}

   
   
if(!empty($alert)){
	$response['alert'] = $alert;
	$response['respon'] = $respon;
} 


?>