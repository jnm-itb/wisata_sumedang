<?php
$target_dir = "image/";
$image = "";
$image2 = "";
$image3 = "";
$image4 = "";
$file = "";


if(!empty($_FILES['image'])){
$r = rand(0,9999);
$u = date('ymdhis').$r;

$img_name  = str_replace("?","",$_FILES["image"]["name"]) ;
$img_name  = str_replace("&","",$img_name) ;
$tmp = $_FILES["image"]["tmp_name"];
$ex = strtolower(pathinfo($img_name ,PATHINFO_EXTENSION));
$file_name = $target_dir .$u.".".$ex;
$new_image = $u.".".$ex;


if(($ex == "png") or($ex == "jpeg") or($ex == "jpg") or($ex == "bmp")){
	if (move_uploaded_file($tmp, $file_name)) {
		$image = $new_image;
	}  
}
}


if(!empty($_FILES['image2'])){
$r = rand(0,9999);
$u = date('ymdhis').$r;

$img_name  = str_replace("?","",$_FILES["image2"]["name"]) ;
$img_name  = str_replace("&","",$img_name) ;
$tmp = $_FILES["image2"]["tmp_name"];
$ex = strtolower(pathinfo($img_name ,PATHINFO_EXTENSION));
$file_name = $target_dir .$u.".".$ex;
$new_image = $u.".".$ex;


if(($ex == "png") or($ex == "jpeg") or($ex == "jpg") or($ex == "bmp")){
	if (move_uploaded_file($tmp, $file_name)) {
		$image2 = $new_image;
	}  
}
}






if(!empty($_FILES['image3'])){
$r = rand(0,9999);
$u = date('ymdhis').$r;

$img_name  = str_replace("?","",$_FILES["image3"]["name"]) ;
$img_name  = str_replace("&","",$img_name) ;
$tmp = $_FILES["image3"]["tmp_name"];
$ex = strtolower(pathinfo($img_name ,PATHINFO_EXTENSION));
$file_name = $target_dir .$u.".".$ex;
$new_image = $u.".".$ex;


if(($ex == "png") or($ex == "jpeg") or($ex == "jpg") or($ex == "bmp")){
	if (move_uploaded_file($tmp, $file_name)) {
		$image3 = $new_image;
	}  
}
}





if(!empty($_FILES['image4'])){
$r = rand(0,9999);
$u = date('ymdhis').$r;

$img_name  = str_replace("?","",$_FILES["image4"]["name"]) ;
$img_name  = str_replace("&","",$img_name) ;
$tmp = $_FILES["image4"]["tmp_name"];
$ex = strtolower(pathinfo($img_name ,PATHINFO_EXTENSION));
$file_name = $target_dir .$u.".".$ex;
$new_image = $u.".".$ex;


if(($ex == "png") or($ex == "jpeg") or($ex == "jpg") or($ex == "bmp")){
	if (move_uploaded_file($tmp, $file_name)) {
		$image4 = $new_image;
	}  
}
}





if(!empty($_FILES['file'])){
$r = rand(0,9999);
$u = date('ymdhis').$r;
 
$img_name  = str_replace("?","",$_FILES["file"]["name"]) ;
$img_name  = str_replace("&","",$img_name) ;
$tmp = $_FILES["file"]["tmp_name"];
$ex = strtolower(pathinfo($img_name ,PATHINFO_EXTENSION));
$file_name = $target_dir .$u.".".$ex;
$new_image = $u.".".$ex;


if(($ex == "zip") or($ex == "rar") or($ex == "pdf") or($ex == "jpg") or($ex == "png")or($ex == "jpeg")){
	if (move_uploaded_file($tmp, $file_name)) {
		$file = $new_image;
	}  
}
}


?>
