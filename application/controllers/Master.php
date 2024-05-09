<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Master extends CI_Controller {	 
	
    public $CI = NULL;

    public function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
    }

	public function upload_data($image, $filename,$folder = 'file/') {	
	
		$config['upload_path']          = $folder;
		$config['allowed_types']        = '*';
		$config['file_name']            = $filename;
		$config['max_size']             = 10000024;

		$error = "Tidak di Ketahui";
		$this->load->library('upload', $config);
		try{
			$this->upload->do_upload($image);
		}  catch (Exception $e) {
			$error = $e->message;
		} 
		
		
		unset($this->upload);	
		unset($this->upload->do_upload);	
		unset($config['file_name']);	
		
		
		
		if(file_exists($folder.$filename)){
			return "success"; 
		} else {
			return "error";
		}
		
	}
	
	public function index($page = 'home',$id = -1,$filter = '')
	{
		$response = array();  
		$response['site'] = base_url();
		$response['id'] = $id;
		
		include("master/data_user.php");
		include("globe/settings.php");
		$response['login'] = $login;
		
		if($page <> "logout"){
		if(!empty($login)){	
			$response['user'] = $user;
			$this->load->view('master/index1',$response); 
			$this->load->view('master/'.$page,$response); 
			$this->load->view('master/index9',$response);
			
		} else {	
			$this->load->view('master/login',$response);
		}
		
		} else {
			$_SESSION['user_master'] = ""; 
			redirect($site.'/master/home'); 
			header('location:'.$site);
		}
	} 
	

	
	
	
} 

?> 