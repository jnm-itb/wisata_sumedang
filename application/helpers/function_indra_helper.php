<?php
	
	function star($star){
		$star = round($star);
		for ($i = 1; $i <= $star; $i++) {
			echo('<i class="fa fa-star"></i>') ; 
		} 
		
		for ($i = 1; $i <= (5 - $star); $i++) {
			echo('<i class="fa fa-star-o"></i>') ; 
		} 		
	}
	
	

	function angka($data){ 
	$data2 = str_replace(",", "",$data); 
	$data2 = preg_replace("/[^0-9.]/", "",$data2);  return $data2;
	}
	
	function check_mime($text){
		
		$mime = "mp4";
		if(strpos('mp4',$text) >= 1){ $mime = "mp4"; } 
		if(strpos('mkv',$text) >= 1){ $mime = "mkv"; } 
		if(strpos('avi',$text) >= 1){ $mime = "avi"; } 
		if(strpos('mpeg',$text) >= 1){ $mime = "mpeg"; } 
		
		return $mime; 
		
	}
	
	function ip(){
		$ip = "";
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){ $ip=$_SERVER['HTTP_CLIENT_IP']; } else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){  $ip=$_SERVER['HTTP_X_FORWARDED_FOR']; } else{ $ip=$_SERVER['REMOTE_ADDR']; }
		return $ip; 
	}
	
	
	
	function waktu($time){ 


		$date = date_create(date('Y-m-d'));
		$date2 = date_create($time);
		
		$s  = date_diff( $date, $date2);
		$selisih= $s->days;
		
		$text = "";
		if($selisih == 0){
			$text = "Hari Ini";
		} else {
			if($selisih <= 29){
				$text = $selisih." Hari Lalu"; 
			} else 
			if($selisih <= 50){
				$text = "1 Bulan Lalu"; 
			} else 
			if($selisih <= 80){
				$text = "2 Bulan Lalu"; 
			} else {
				$text = $time;
			}
		} 
		
		
		return $text;
		
	}
	
	function comment_plain($data){
		$data = str_replace('%','',$data);
		$data = htmlspecialchars($data , ENT_QUOTES);
		$data = htmlentities($data);
		return $data;
		
	}
	
	
	
	function in($data){
		$data = htmlspecialchars($data , ENT_QUOTES);
		$data = htmlentities($data);
		return $data;
	}

	function inx($data){
		$data = htmlspecialchars($data , ENT_QUOTES);
		$data= trim(preg_replace('/\s\s+/', ' ', $data));
		$data = preg_replace('~[\r\n]+~', '', $data);
		$data = str_replace("'",'',$data);
		$data = str_replace('"','',$data);
		return $data;
	}
	
	
	function ssl($str){	$str = str_replace("_","__9*",$str);	$str = str_replace("a","__8*",$str);	$str = str_replace("b","__7*",$str);	$str = str_replace("c","__6*",$str);	$str = str_replace("d","__5*",$str);	$str = str_replace("e","__4*",$str);	$str = str_replace("f","__3*",$str);	$str = str_replace("g","__2*",$str);	$str = str_replace("h","__1*",$str);	$str = str_replace("i","__9#",$str);	$str = str_replace("j","__8#",$str);	$str = str_replace("k","__7#",$str);	$str = str_replace("l","__6#",$str);	$str = str_replace("m","__5#",$str);	$str = str_replace("n","__4#",$str);	$str = str_replace("o","__3#",$str);	$str = str_replace("p","__2#",$str);	$str = str_replace("q","__1#",$str);	$str = str_replace("r","__9",$str);	$str = str_replace("s","__8",$str);	$str = str_replace("t","__7",$str);	$str = str_replace("u","__6",$str);	$str = str_replace("v","__5",$str);	$str = str_replace("w","__4",$str);	$str = str_replace("x","__3",$str);	$str = str_replace("y","__2",$str);	$str = str_replace("z","__1",$str);	$str = base64_encode(base64_encode($str));	return $str;}
	function de_ssl($str){	$str = base64_decode(base64_decode($str));	$str = str_replace("__9*","_",$str);	$str = str_replace("__8*","a",$str);	$str = str_replace("__7*","b",$str);	$str = str_replace("__6*","c",$str);	$str = str_replace("__5*","d",$str);	$str = str_replace("__4*","e",$str);	$str = str_replace("__3*","f",$str);	$str = str_replace("__2*","g",$str);	$str = str_replace("__1*","h",$str);	$str = str_replace("__9#","i",$str);	$str = str_replace("__8#","j",$str);	$str = str_replace("__7#","k",$str);	$str = str_replace("__6#","l",$str);	$str = str_replace("__5#","m",$str);	$str = str_replace("__4#","n",$str);	$str = str_replace("__3#","o",$str);	$str = str_replace("__2#","p",$str);	$str = str_replace("__1#","q",$str);	$str = str_replace("__9","r",$str);	$str = str_replace("__8","s",$str);	$str = str_replace("__7","t",$str);	$str = str_replace("__6","u",$str);	$str = str_replace("__5","v",$str);	$str = str_replace("__4","w",$str);	$str = str_replace("__3","x",$str);	$str = str_replace("__2","y",$str);	$str = str_replace("__1","z",$str);	return $str;}
	
	function upload_name($title){
		$title = str_replace(' ','-',$title);
		$title = strtolower($title);
		$title = preg_replace("/[^.A-Za-z0-9_-]/", '', $title);
		return $title;
	}	
	
	
	
	
	function eksekusi($pdo, $query,$type = "mysql"){ 	
		if(strtolower($type) == "postgresql"){
			$query2 = str_replace('`','"',$query);
		} else {
			$query2 = $query ;
		} 
		try{
			$exe = $pdo->prepare($query2); 	
			$exe->execute(); 	
			return "success";	
		}  catch (Exception $e) { 
			return $e;
		} 
		
	}
	
	
	function select($pdo,$query , $type = "mysql"){ 
		$query2 = str_replace('`','"',$query);
		$type = strtolower($type);
		
		if($type == "mysql"){
			$x = $pdo->prepare($query); 
		} if($type == "postgresql"){
			$x = $pdo->prepare($query2); 
		} else {
			$x = $pdo->prepare($query); 
		}
		return $x; 
	}
	
	
	
	
	function row($var){ return $var->rowCount(); }
	function fetch($var){ return $var->fetch(PDO::FETCH_BOTH); }
	function fetch_obj($var){ return $var->fetch(PDO::FETCH_OBJ); }
	function uang($money, $round = 2){
		if (( $money <> 0 ) and ($money <> '')) {
			$uang = number_format((float)$money, $round, '.', ',');
			return $uang;
		}
		else{
			$uang = "0";return $uang;
		}
	}
	
	
	function plain($title){$title = strtolower($title);$title = preg_replace("/[^A-Za-z0-9_ -]/", '', $title);$t = explode(' ',$title);$txx = "";$x =0;foreach($t as $tx){		if($tx != ""){		if($x == 0){		$txx = $tx;	} else {		$txx .= "-".$tx;	}	$x++;	}}return $txx;}	
	function plain2($title){$title = strtolower($title);$title = preg_replace("/[^A-Za-z0-9_ ,-]/", '', $title);$t = explode(' ',$title);$txx = "";$x =0;foreach($t as $tx){		if($tx != ""){		if($x == 0){		$txx = $tx;	} else {		$txx .= "-".$tx;	}	$x++;	}}return $txx;}	
	
	function title($title){$title = strtolower($title);$title = preg_replace("/[^A-Za-z0-9_ ]/", '', $title);$t = explode(' ',$title);$txx = "";$x =0;foreach($t as $tx){		if($tx != ""){		if($x == 0){		$txx = $tx;	} else {		$txx .= "-".$tx;	}	$x++;	}}return $txx;}	
	function judul($title,$count){$t = explode(' ',$title);$txx = "";$x =0;$xxx = "";foreach($t as $tx){		if($x <> $count){	if($x == 0){		$txx = $tx;	} else {		$txx .= " ".$tx;	}	$x++;	} else {		$xxx = "...";	}}return $txx.$xxx;}   
	function respon_exists(){ return "<h4 class='mb-0'> Error </h4> - This Data Is Already Exists"; }
	function respon_success(){ return "<h4 class='mb-0'> Success </h4>  <p> Data Entered Successfully  </p>"; }
	function respon_primary(){ return "<h4 class='mb-0'> Error </h4>  <p> Error At Get Last ID Primary  </p>"; }
	

	function test_connect($host, $user_db,$password_db,$database,$type,$port)
	{
		$return = "Type Database Is Not Support";
	
		if(strtolower($type) == "mysql"){
			try {
			$pdo = new PDO("mysql:host=$host;dbname=$database", $user_db, $password_db);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$return = "success";
			} catch(PDOException $e) {
				$return = "Connection failed: " . $e->getMessage();
			}
		} 
		
		if(strtolower($type) == "postgresql"){	
			try {
				$pdo = new PDO("pgsql:host=$host;port=$port;dbname=$database;", $user_db, $password_db);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$return =  "success";
			} catch(PDOException $e) {
				$return =  "Connection failed: " . $e->getMessage();
			}
		} 
		
		return $return;	
	}
	
	
	
	function connect($database)
	{
		
		$host = $database->host_db;
		$user_db = $database->user_db;
		$password_db = $database->password_db;
		$db_name = $database->database_name;
		$type = $database->type;
		$port = $database->port;
		
		$pdo = "ERROR CONNECTED";
		
		if(strtolower($type) == "mysql"){
			try {
				$pdo = new PDO("mysql:host=$host;dbname=$db_name", $user_db, $password_db, array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
			} catch(PDOException $e) {
				$pdo = "ERROR CONNECTED";
			}
		} else 
		if(strtolower($type) == "postgresql"){
			try {
				$pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db_name;", $user_db, $password_db);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
				$pdo = "ERROR CONNECTED";
			}
		} 
		
		
		return $pdo;	
	}
	
	function ext($name){		
		$type_list = explode('.',$name);
		$type = $type_list[count($type_list)-1]; 
		return $type;
	}	

	
function send_file($file, $speed = 100) {
 
    //First, see if the file exists   
    if (!is_file($file)) {
        die("<b>404 File not found!</b>");
    }  
    //Gather relevent info about file
    $filename = basename($file);
    $file_extension = strtolower(substr(strrchr($filename,"."),1));
    // This will set the Content-Type to the appropriate setting for the file
    switch( $file_extension ) {
        case "exe":
            $ctype="application/octet-stream";
            break;
        case "zip":
            $ctype="application/zip";
            break;
        case "mp3":
            $ctype="audio/mpeg";
            break;
        case "mpeg":
            $ctype="video/mpg";
            break; 
        case "flv":
            $ctype="video/flv";
            break;
        case "mkv":
            $ctype="video/mkv";
            break;
        case "mp4":
            $ctype="video/mp4";
            break;
        case "mpg":
            $ctype="video/mpeg";
            break;
        case "avi":
            $ctype="video/x-msvideo";
            break;
 
        //  The following are for extensions that shouldn't be downloaded
        // (sensitive stuff, like php files)
        case "php":
        case "htm":
        case "html":
        case "txt":
            die("<b>Cannot be used for ". $file_extension ." files!</b>");
            break;
        default:
            $ctype="application/force-download";
    }
 
    //  Begin writing headers
    header("Cache-Control:");
    header("Cache-Control: public");
    header("Content-Type: $ctype");
 
    $filespaces = str_replace("_", " ", $filename);
    // if your filename contains underscores, replace them with spaces
 
    $header='Content-Disposition: attachment; filename='.$filespaces;
    header($header);
    header("Accept-Ranges: bytes");
 
    $size = filesize($file);  
    //  check if http_range is sent by browser (or download manager)  
    if(isset($_SERVER['HTTP_RANGE'])) {
        // if yes, download missing part     
 
        $seek_range = substr($_SERVER['HTTP_RANGE'] , 6);
        $range = explode( '-', $seek_range);
        if($range[0] > 0) { $seek_start = intval($range[0]); }
        if($range[1] > 0) { $seek_end  =  intval($range[1]); }
 
        header("HTTP/1.1 206 Partial Content");
        header("Content-Length: " . ($seek_end - $seek_start + 1));
        header("Content-Range: bytes $seek_start-$seek_end/$size");
    } else {
        header("Content-Range: bytes 0-$seek_end/$size");
        header("Content-Length: $size");
    }  
    //open the file
    $fp = fopen("$file","rb");
 
    //seek to start of missing part  
    fseek($fp,$seek_start);
 
    //start buffered download
    while(!feof($fp)) {      
        //reset time limit for big files
        set_time_limit(0);      
        print(fread($fp,1024*$speed));
        flush();
        sleep(1);
    }
    fclose($fp);
    exit;
}


?>