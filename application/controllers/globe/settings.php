<?php 
$ref = "";
if(!empty($_GET['ref'])){ 
$ref = in($_GET['ref']); 
$row = $this->model->row('user'," user_id='$ref' ");
if($row >= 1){ 
	$_SESSION['ref'] = $ref;  
    
} 
}

$table = "settings";
$sql = "id<>-1";
$row = $this->model->row($table,$sql);
if($row >= 1){
	$data_list = $this->model->get_obj($table,$sql);
	foreach($data_list as $data){
		$settings= $data;
	}
	
	$response['settings'] = $settings;
} 



$response['date'] = date('Y-m-d');
$response['datetime'] = date('Y-m-d h:i:s');
$response['d'] = date('d');
$response['m'] = date('m');
$response['y'] = date('Y');
 

$datetime = date('Y-m-d h:i:s');
$date = date('Y-m-d');
$d = date('d');
$m = date('m');
$y = date('Y');


if(empty($_SESSION['money_type'])){ $_SESSION['money_type'] = "Rp. ";  } 
$type = "";
if(!empty($_GET['type'])){ 
$type = in($_GET['type']); 
if((strtolower($type) == "rp") or (strtolower($type) == "rp.") or (strtolower($type) == "rp. ") ) {
	$_SESSION['money_type'] = "Rp. "; 	
} else {
	$_SESSION['money_type'] = "USDT $"; 
}
}


$response['money_type'] = $_SESSION['money_type'];

?>