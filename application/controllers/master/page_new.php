<?php 
$response = array();
$alert = "danger";
$respon = "Sorry - Error On Server, Call developer";


if(!empty($_POST)){
	$title = in($_POST['title']);
	$text = in($_POST['text']);
	 
	
	$row = $this->model->row('page'," title='$title'  ");
	if($row <= 0){		
		
		$image = "";
		
		
			$data = array();
			$data['title'] = $title;
			$data['text'] = $text; 
		
			if ($_FILES['image']['name'] != '') {
			$type_list = explode('.',$_FILES['image']['name']);
			$type = $type_list[count($type_list)-1]; 
			$image = date('Y-m-d-his').".".$type;
			
			if(($type =='png') or ($type =='jpg') or ($type =='jpeg') or ($type =='bmp')){
			$respon_file = $this->upload_data('image', $image, 'image/');
			
			if($respon_file == "success"){
				$data['image'] = $image;  
			}
			}
			}
			
			
			$this->db->insert('page',$data);
			$return  = $this->db->insert_id(); 
			
			$alert = "success";
			$respon = "Berhasil Memasukkan Data Baru ";
			 
		
		
		
	} else {
		$respon = "Sorry - This Data has already exists";
	}
}




$response['data'] = $_POST;
$response['alert'] = $alert;
$response['respon'] = $respon;
$res = json_encode($response);
echo($res) ; 

?>