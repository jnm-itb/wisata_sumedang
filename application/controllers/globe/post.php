<?php 
	if(isset($_POST['start'])){
		$education = in($_POST['education']);
		$job = in($_POST['job']);
		$gender = in($_POST['gender']);
		$code = in($_POST['code']);
		
		$data = array();
		$data['id_education'] = $education;
		$data['date'] = date('Y-m-d');
		$data['id_gender'] = $gender; 
		$data['code'] = $code;
		$data['id_job'] = $job;
		$this->db->insert('answer',$data);
		
		header('location:'.base_url().'step2?code='.$code);
	} 
	
	
	if(isset($_POST['service'])){
		$service = in($_POST['service']);
		$code = "";
		if(!empty($_GET['code'])){ 
		$code = in($_GET['code']); 
		}
		
		$this->db->query("UPDATE answer SET `id_service`='$service' where code='$code'   ");	
		header('location:'.base_url().'step3?code='.$code);
	} 
	
	
	
	if(isset($_POST['next'])){
		$start = in($_POST['start_page']);
		$quest = ($_POST['quest']);
		
		$code = "";
		if(!empty($_GET['code'])){ 
		$code = in($_GET['code']); 
		}
		 
		
		foreach($quest as $index => $val){
			$this->db->query("INSERT INTO `answer_question`
			(`id_question`, `value`, `code`) VALUES 
			('$index','$val','$code') ");	
		}
		
		header('location:'.base_url().'step3?code='.$code."&start=".$start);
	} 
	
	
	if(isset($_POST['saran'])){

		$quest = ($_POST['quest']);
		
		$code = "";
		if(!empty($_GET['code'])){ 
		$code = in($_GET['code']); 
		}
		 
		
		foreach($quest as $index => $val){
			$this->db->query("INSERT INTO `answer_question`
			(`id_question`, `value`, `code`) VALUES 
			('$index','$val','$code') ");	
		}
		
		//header('location:'.base_url().'finish?code='.$code);
		 
		header('location:'.base_url().'step4?code='.$code);
	} 
	
	
	
	if(isset($_POST['finish'])){
		$quest = ($_POST['quest']);
		$code = "";
		if(!empty($_GET['code'])){ 
		$code = in($_GET['code']); 
		}
		
		$saran = in($_POST['saran']);
		$this->db->query("UPDATE answer SET `saran`='$saran' where `code`='$code'  ");	
		
		header('location:'.base_url().'finish?code='.$code);
	} 
	
	
	
?>