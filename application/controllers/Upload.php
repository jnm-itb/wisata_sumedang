<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
header("Content-type:application/json");

class Upload extends CI_Controller {	
 
	public function index()
	{
		
		$message = []; 
		$message['message'] = "";
		
		require_once("user/data_user.php");
		if(!empty($_FILES['file'])){
			$uploadOk = 1;
			$tujuan_lama = $_FILES["file"]["tmp_name"];
			$nama_lama = $_FILES["file"]["name"];
			$size = $_FILES["file"]["size"];

			$size = $size / 1024;
			$size = round($size);
			$dir = "video/".date('Y_m_d')."/";
						
			if(!file_exists($dir)){
				mkdir($dir, 0755);
			} 
			
			
			$ss = $size ; 
			$cp = "Kb";
			if(($ss / 1024) >= 1){ $ss = $ss / 1024 ; $cp = "Mb"; $ss = round($ss,2); } 
			if(($ss / 1024) >= 1){ $ss = $ss / 1024 ; $cp = "Gb"; $ss = round($ss,2);  } 
			if(($ss / 1024) >= 1){ $ss = $ss / 1024 ; $cp = "Tb"; $ss = round($ss,2);  } 

			$size_text = $ss." ".$cp ;
			$r = date('Ymdhis').rand(0,999);

			$ex = strtolower(pathinfo($nama_lama,PATHINFO_EXTENSION));
			$nama_file_baru = $r.".".$ex;
			$tujuan_baru = $dir.$nama_file_baru;
			if(($ex == "mp4") or ($ex == "mpeg") or ($ex == "flv") or ($ex == "mkv") or ($ex == "3gp") or ($ex == "mpg")){

				if (move_uploaded_file($tujuan_lama, $tujuan_baru)) {
					
					$file = $nama_file_baru;
					
					$this->db->query("INSERT INTO video 
					(`id_user`, `title`, `description`, `filename`, `size`,`type`) VALUES 
					('$id_user','$nama_lama','-','$tujuan_baru','$size_text','$ex') ");
					
					$message['message'] = $tujuan_baru ; 
					
					$table = "video";
					$sql = "`id_user`='$id_user' and title='$nama_lama' and filename='$tujuan_baru'   ";
					$row = $this->model->row($table,$sql);
					if($row >= 1){
						$data = $this->model->get_obj($table,$sql)[0];
						$message['message'] = base64_encode($data->id);
					} 					
					
				}  
			}
			
			
		} 
		
		echo($message['message']);

	}
} 

