<?php 
	$total_1 = 0; 
	$no_1 = 1; 


if(!empty($quest_1)){
$filename = "quest/".$quest_1 ; 
if(file_exists($filename)){
$data_quest	= fopen($filename, "r"); 
while(($row = fgetcsv($data_quest, 1000, ",")) !== FALSE){ 
		
		if($total_1 >= 1){
		$question = $row[0];
		$question = str_replace("'",'"',$question);
		$question = in($question);
		
		$answer_a = "";
		$answer_b = "";
		$answer_c = "";
		$answer_d = "";
		$answer_e = ""; 
		
		$points_a = 0;
		$points_b = 0;
		$points_c = 0;
		$points_d = 0;
		$points_e = 0;

		$discussion = "";
		
		if(!empty($row[1])){ $answer_a = in($row[1]); } 
		if(!empty($row[2])){ $answer_b = in($row[2]); } 
		if(!empty($row[3])){ $answer_c = in($row[3]); } 
		if(!empty($row[4])){ $answer_d = in($row[4]); } 
		if(!empty($row[5])){ $answer_e = in($row[5]); } 
		
		if(!empty($row[6])){ $points_a = $row[6]; } 
		if(!empty($row[7])){ $points_b = $row[7]; } 
		if(!empty($row[8])){ $points_c = $row[8]; } 
		if(!empty($row[9])){ $points_d = $row[9]; } 
		if(!empty($row[10])){$points_e = $row[10]; } 
		if(!empty($row[11])){$discussion = in($row[11]); }   
		
		$answer_a = str_replace("'",'"',$answer_a);  
		$answer_b = str_replace("'",'"',$answer_b);   
		$answer_c = str_replace("'",'"',$answer_c);  
		$answer_d = str_replace("'",'"',$answer_d); 
		$answer_e = str_replace("'",'"',$answer_e); 
		$discussion = str_replace("'",'"',$discussion); 
		
		if(empty($points_a)){$points_a = 0;} 
		if(empty($points_b)){$points_b = 0;} 
		if(empty($points_c)){$points_c = 0;} 
		if(empty($points_d)){$points_d = 0;} 
		if(empty($points_e)){$points_e = 0;} 
		
		
		if((!empty($answer_a)) and (!empty($question))){
			
			
			if(empty($id_learning)){
				$id_learning = "0";
			} 
			
			$this->db->query("INSERT INTO `learning_data`
			(`id_learning`, `question`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `answer_e`, `points_a`, `points_b`, `points_c`, `points_d`, `points_e`, `discussion`, `no`) VALUES 
			('$id_learning','$question','$answer_a','$answer_b','$answer_c','$answer_d','$answer_e','$points_a','$points_b','$points_c','$points_d','$points_e','$discussion','$no_1') ");
			
			$no_1++;
			$total_1++;
			
		}
		
		} else {
			$total_1++;
		}

}
}
}
	
?>
