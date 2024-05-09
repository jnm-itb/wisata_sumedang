<?php 
if(!empty($login)){
	if(!empty($user)){
				
		
		if(isset($_POST['klaim_bonus'])){
			$id_user = $user->id;
			$table = "user";
			$sql = "`id`='$id_user'";
			$row = $this->model->row($table,$sql);
			if($row >= 1){
				$u = $this->model->get_obj($table,$sql)[0];
				$this->db->query("UPDATE user SET `saldo`=`saldo`+`bonus_rp` , `saldo_usdt`=`saldo_usdt`+`bonus_usdt`, `bonus_rp`='0', `bonus_usdt`='0' WHERE id='$id_user'  ");			
				
				if($u->bonus_rp >= 1){ $bonus_rp = $u->bonus_rp;  $this->db->query("INSERT INTO `history_klaim` (`type`, `total`,`id_user`,`type_klaim`) VALUES ('Rp. ','$bonus_rp','$id_user','Claim 1st') "); } 
				if($u->bonus_usdt >= 1){ $bonus_usdt = $u->bonus_usdt;  $this->db->query("INSERT INTO `history_klaim` (`type`, `total`,`id_user`,`type_klaim`) VALUES ('USDT $','$bonus_usdt','$id_user','Claim 1st') "); } 
			} 
			
			
			$sql = "`id`='$id_user'";
			$row = $this->model->row($table,$sql);
			if($row >= 1){
				$user = $this->model->get_obj($table,$sql)[0];
				$response['user'] = $user;
			} 
			
			$alert = "success";
			$respon = "Success Klaim Your Bonus To Your Balance ";
			
			$response['alert'] = $alert;
			$response['respon'] = $respon;
		} 
		
		
		
		
		
		if(isset($_POST['klaim_bonus2'])){
			$id_user = $user->id;
			
			
			$row = $this->model->row("user","referral='$id_user' and active='Yes' ");
			if($row >= 10){
				
				$table = "user";
				$sql = "`id`='$id_user'";
				$row = $this->model->row($table,$sql);
				if($row >= 1){
					$u = $this->model->get_obj($table,$sql)[0];
					$this->db->query("UPDATE user SET `saldo`=`saldo`+`bonus_rp2` , `saldo_usdt`=`saldo_usdt`+`bonus_usdt2`, `bonus_rp2`='0', `bonus_usdt2`='0' WHERE id='$id_user'  ");			
					
					if($u->bonus_rp2 >= 1){ $bonus_rp2 = $u->bonus_rp2;  $this->db->query("INSERT INTO `history_klaim` (`type`, `total`,`id_user`,`type_klaim`) VALUES ('Rp. ','$bonus_rp2','$id_user','Claim 2nd') "); } 
					if($u->bonus_usdt2 >= 1){ $bonus_usdt2 = $u->bonus_usdt2;  $this->db->query("INSERT INTO `history_klaim` (`type`, `total`,`id_user`,`type_klaim`) VALUES ('USDT $','$bonus_usdt2','$id_user','Claim 2nd') "); } 
				} 
				
				
				$sql = "`id`='$id_user'";
				$row = $this->model->row($table,$sql);
				if($row >= 1){
					$user = $this->model->get_obj($table,$sql)[0];
					$response['user'] = $user;
				} 
				
				
				
				$alert = "success";
				$respon = "Success Klaim Your Bonus To Your Balance ";
				
				$response['alert'] = $alert;
				$response['respon'] = $respon;
				
			}else {
				$alert = "danger";
				$respon = "Sorry - You must have minimum 10 Users Referrer Active First Deposit ";
				$response['alert'] = $alert;
				$response['respon'] = $respon;
			}
		} 
		
		
		
		
		
		
		
$client = $settings->client;
$secret = $settings->secret;
$url_api = "https://api.onebrick.io";
		 
		
		$table = "withdraw";
		$sql = "`id_user`='$id_user'  and auto='Yes' and status='Waiting' ";
		$row = $this->model->row($table,$sql);
		if($row >= 1){
			$dd = $this->model->get_obj($table,$sql);
			foreach($dd as $data){
				$id_wd = $data->id_wd; 
				
									 

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url_api.'/v2/payments/auth/token');
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

					curl_setopt($ch, CURLOPT_USERPWD, $client . ':' . $secret);

					$result = curl_exec($ch); 
					curl_close($ch);   
					  
					if(!empty($result)){
						$obj = json_decode($result);
						$token2 = $obj->data->accessToken;
						
						

							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, $url_api.'/v2/payments/gs/disbursements/'.$id_wd);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							$headers = array();
							$headers[] = 'Accept: application/json';
							$headers[] = 'Content-Type: application/json';
							$headers[] = 'Publicaccesstoken: Bearer '.$token2;
							curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

							$result = curl_exec($ch);
							curl_close($ch); 
								 
									
							if(!empty($result)){
								$obj = json_decode($result);
								
								if($obj->status == "200"){
										
											
									$data_respon = $obj->data;
									$status = $data_respon->attributes->status;
									
									if($status == "completed"){
										$this->db->query("UPDATE withdraw SET `status`='Finish' WHERE id_wd='$id_wd'  ");
									} 
									
									
								}
							} 
							 
					} 
									
									
				
				
				
				
				
			}
		} 
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	} 
} 
	
?>