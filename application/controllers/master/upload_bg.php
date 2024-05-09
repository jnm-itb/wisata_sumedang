<?php 
$response = array();
$alert = "danger";
$respon = "Terjadi Kesalahan Pada Server";


if(!empty($_FILES)){
	if ($_FILES['file']['name'] != '') {
			
		$type_list = explode('.',$_FILES['file']['name']);
		$type = $type_list[count($type_list)-1]; 
		$file = $_FILES['file']['name'];
		$respon_file = $this->upload_data('file', $file, './');
		  
		if($respon_file == "success"){ 
			$alert = "success";
			$respon = "File Berhasil Di Upload  . ";
			
		} else {
			$respon = "Gagal Mengupload Image / Periksa Folder Anda - Pastikan mengizinkan upload data secara publik ";
		}
	}
}


$response['data'] = $_POST;
$response['alert'] = $alert;
$response['respon'] = $respon;
$res = json_encode($response);
echo($res) ; 

?>