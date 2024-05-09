<?php 

$response = array();
$alert = "danger";
$respon = "Terjadi Kesalahan Pada Server";


if(!empty($_POST['table'])){
	$table =in($_POST['table']);
	$id =in($_POST['id']);
	
	$row = $this->model->row($table," `id`='$id' ");
	
	if($row >= 1){
		
		$data = $this->model->get_obj($table," `id`='$id' ")[0];
		if(!empty($data->image)){ $image = $data->image; if(file_exists('image/'.$image)){ unlink('image/'.$image); }  } 
		if(!empty($data->file)){ $file = $data->file; if(file_exists('image/'.$file)){ unlink('image/'.$file); }  } 
		
		
		if($table == "question"){
			$table = "question";
			$sql = "id<>-1 ORDER BY id ASC ";
			$row = $this->model->row($table,$sql);
				if($row >= 1){
					$data_list = $this->model->get_obj($table,$sql);
					$no = 1;
					foreach($data_list as $d){
						 $idx = $d->id;
						 $this->db->query("UPDATE question SET `no_quest`='$no' where id='$idx'  ");	
						 $no++;
					}
				} 	
		} 
		
		
		$row_delete = $this->model->delete($table," `id`='$id'");
		if($row_delete >=1){
			$respon = "Tidak Bisa Di Hapus";
		} else {
			$alert = "success";
			$respon = "Data Berhasil Di Hapus";
		}
	
	
	} else {
		$respon = "Data Sudah Dihapus Sebelumnya ";
	}
	
} else {
	$respon = "Tidak Ada Respon Table";
} 

$response['data'] = $_POST;
$response['alert'] = $alert;
$response['respon'] = $respon;
$res = json_encode($response);
echo($res) ; 

?>