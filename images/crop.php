<?php 
header("Access-Control-Allow-Origin: *");
$link = "../image/";
 
$img = "";
if(!empty($_GET['img'])){ 
	$img = ($_GET['img']); 
}

$height = "";
if(!empty($_GET['height'])){ 
$height = ($_GET['height']); 
}
$width = "";
if(!empty($_GET['width'])){ 
$width = ($_GET['width']); 
}

$url=$link.$img;
$tmp_names =$link.$img;

$extensionList = array("bmp", "jpg", "gif", "png", "jpeg","webp");
$pecah = explode(".", $url);

foreach($pecah as $new) {
	$new = trim($new);
	$ekstensi = strtolower($new);
}



$h = $height; 
$w = $width;


if (in_array($ekstensi, $extensionList))
{

list($w, $h) = getimagesize($url);
  $ratio = max($width/$w, $height/$h);
  $h = ceil($height / $ratio);
  $x = ($w - $width / $ratio) / 2;
  $w = ceil($width / $ratio);
  $imgString = $url;

  switch ($ekstensi) {
    case 'jpeg':
	$image = imagecreatefromjpeg($imgString);
	break;
    case 'jpg':
	$image = imagecreatefromjpeg($imgString);
	break;
    case 'png':
	$image = imagecreatefrompng($imgString);
	break;
    case 'gif':
	$image = imagecreatefromgif($imgString);
	break;
	default:
      exit;
      break;
  }
  
  
  
  


$tmp = imagecreatetruecolor($width, $height);
imagealphablending($tmp, false);
imagesavealpha($tmp, true);


  imagecopyresampled($tmp, $image,
    0, 0,
    $x, 0,
    $width, $height,
    $w, $h);
  
  
  switch ($ekstensi) {
    case 'jpeg':
    header('Content-Type: image/jpeg');
      imagejpeg($tmp);
      break; 
    case 'jpg':
    header('Content-Type: image/jpeg');
      imagejpeg($tmp);
      break;
    case 'png':
    header('Content-Type: image/png');
      imagepng($tmp);
      break;
    case 'gif':
    header('Content-Type: image/gif');
      imagegif($tmp);
      break;
    default:
      exit;
      break;
  }
  
}  

?>