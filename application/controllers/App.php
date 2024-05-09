<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class App extends CI_Controller {	
 
	public function index()
	{ 
		$page = "home";
		$response = array();  
		$response['site'] = base_url(); 
		$response['page'] = $page; 
		
		include("user/data_user.php");
		include("globe/settings.php");
		$response['login'] = $login;
		
		if($page <> "logout"){
			
		$response['user'] = $user;
		$this->load->view('frontend/index',$response); 
		$this->load->view('frontend/'.$page,$response);
		$this->load->view('frontend/index9',$response);
	
		} else {
			$_SESSION['user'] = ""; 
			redirect($site); 
			header('location:'.$site);
		}
		
	}
	
	
	 
	public function page($page = "home" , $id = "", $param="")
	{
		
		$response = array();  
		$response['site'] = base_url(); 
		$response['page'] = $page;  
		$response['id'] = $id;
		
		include("user/data_user.php");
		include("globe/settings.php");
		$response['login'] = $login; 
		if($page <> "logout"){ 
		
			$response['user'] = $user;
			$this->load->view('frontend/index',$response); 
			$this->load->view('frontend/'.$page,$response);
			$this->load->view('frontend/index9',$response);
		
		
		} else {
			$_SESSION['user'] = ""; 
			redirect($site); 
			header('location:'.$site);
		}
	} 
	
	  
	 
	public function play($id = "" )
	{
		
		$response = array();  
		$response['site'] = base_url(); 
		$response['page'] = $page;  
		$response['id'] = $id;
		
		include("user/data_user.php");
		include("globe/settings.php");
		$response['login'] = $login; 
		$response['user'] = $user;
		
		$id = base64_decode($id);
		
		
		$ip = ip(); 
		$date= date('Y-m-d');
		$row = $this->model->row("ip","ip='$ip' and id_video='$id' and date='$date'   ");
		if($row <= 0){
			$this->db->query("DELETE FROM ip WHERE date<>'$date'"); 
			$this->db->query("INSERT INTO `ip` (`ip`,`id_video`,`date`) VALUES ('$ip','$id','$date')  ");
			$this->db->query("UPDATE video SET `watch`=`watch`+1 WHERE id='$id'  ");	
		}
		
		
		
		
		
		$table = "video";
		$sql = "`id`='$id'";
		$row = $this->model->row($table,$sql);
		if($row >= 1){ 
			$data = $this->model->get_obj($table,$sql)[0];
			$response['data'] = $data;
		
			$this->load->view('frontend/index',$response); 
			$this->load->view('frontend/play',$response);
			$this->load->view('frontend/index9',$response);
		} else {
			$this->load->view('frontend/index',$response); 
			$this->load->view('frontend/notfound',$response);
			$this->load->view('frontend/index9',$response);
		
		}
 
	} 
	
	  
	 
	public function embed($id = "" )
	{
		
		$response = array();  
		$response['site'] = base_url(); 
		$response['page'] = $page;  
		$response['id'] = $id;
		
		include("user/data_user.php");
		include("globe/settings.php");
		$response['login'] = $login; 
		$response['user'] = $user;
		
		$id = base64_decode($id);
		
		$table = "video";
		$sql = "`id`='$id'"; 
		$row = $this->model->row($table,$sql);
		if($row >= 1){ 
			$data = $this->model->get_obj($table,$sql)[0];
			$response['data'] = $data;
		
			$this->load->view('frontend/embed',$response);
		} else {
			$this->load->view('frontend/notfound',$response);		
		}
 
	} 
	
	  

	
} 

?> 