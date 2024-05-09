<?php 
$response = array();
$alert = "danger";
$respon = "Terjadi Kesalahan Pada Server";


if(!empty($_POST)){
	
$name = in($_POST['name']);
$description = in($_POST['description']);
$title = in($_POST['title']);
$email = in($_POST['email']);
$phone = in($_POST['phone']);
$address = in($_POST['address']);
 $whatsapp = in($_POST['whatsapp']);
  
 
 
$this->db->query("UPDATE `settings` SET 
`name`='$name',
`description`='$description',
`title`='$title',
`email`='$email',
`whatsapp`='$whatsapp',
`phone`='$phone',
`address`='$address' ");



if ($_FILES['image']['name'] != '') {
$type_list = explode('.',$_FILES['image']['name']);
$type = $type_list[count($type_list)-1]; 
$image = date('Y-m-d-his').".".$type;

if(($type =='png') or ($type =='jpg') or ($type =='jpeg') or ($type =='bmp')){
$respon_file = $this->upload_data('image', $image, 'image/');

if($respon_file == "success"){
	$this->db->query("UPDATE settings SET `logo`='$image' ");
}
}
}


if ($_FILES['image2']['name'] != '') {
$type_list = explode('.',$_FILES['image2']['name']);
$type = $type_list[count($type_list)-1]; 
$image2 = date('Y-m-d-his').".".$type;

if(($type =='png') or ($type =='jpg') or ($type =='jpeg') or ($type =='bmp')){
$respon_file = $this->upload_data('image2', $image2, 'image/');
if($respon_file == "success"){
	$this->db->query("UPDATE settings SET `favicon`='$image2' ");
}
}
}


$alert = "success";
$respon = "Website Settings Has Updated";
 
}



$response['data'] = $_POST;
$response['alert'] = $alert;
$response['respon'] = $respon;
$res = json_encode($response);
echo($res) ; 

?>