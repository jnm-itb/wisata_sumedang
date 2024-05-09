<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Content-Type: application/json'); 
date_default_timezone_set('Asia/Jakarta');

class Post_master extends CI_Controller {
	
	
	public function index()
	{ 
		echo("Apaan Sih - Kalau Suka yah bilang ") ; 
	} 
	
	
	public function delete() { require_once("master/delete.php"); } public function upload_bg() { require_once("master/upload_bg.php"); }
	public function reject() { require_once("master/reject.php"); }
	
	public function blog_new() { require_once("master/blog_new.php"); }
	public function blog_edit() { require_once("master/blog_edit.php"); }
	
	public function page_new() { require_once("master/page_new.php"); }
	public function page_edit() { require_once("master/page_edit.php"); }
	  
	public function features_new() { require_once("master/features_new.php"); }
	public function features_edit() { require_once("master/features_edit.php"); }
	  
	
	 
	public function settings_website() { require_once("master/settings_website.php"); }
	public function settings_password() { require_once("master/settings_password.php"); }

 
 	public function crop($width = 600 ,$height = 400 ,$img = 'default.jpg') {  
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'image/'.$img;
		$config['new_image'] = 'image/sm-'.$img;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = true;
		$config['width']       = $width; 
		$this->load->library('image_lib', $config);


		if($this->image_lib->resize()){
		unset($this->image_lib);
		$this->image_lib = null;

		$config['image_library'] = 'gd2';
		$config['source_image'] = 'image/sm-'.$img;
		$config['new_image'] = 'images/'.$img;

		$config['create_thumb'] = false;
		$config['maintain_ratio'] = false ;
		$config['height']       = $height ; 
		$this->load->library('image_lib', $config);
		$this->image_lib->crop();


		unset($this->image_lib);
		
		
		$this->image_lib = null;
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'image/'.$img;
		$config['new_image'] = 'image/sm-'.$img;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = true;
		$config['width']       = 40; 
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
		
		unset($this->image_lib);
		};   
		
		
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

	
	
	
	
	 
	
} 
?> 
