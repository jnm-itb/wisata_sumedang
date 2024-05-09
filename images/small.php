<?php 
header("Access-Control-Allow-Origin: *");
header("cache-control: public, max-age=31557600");  
header("etag: ".str_replace('.','',$_GET['img']));  

$link = "../image/";
$img = "";
if(!empty($_GET['img'])){ 
$img = ($_GET['img']); 
}
 

$i = str_replace('.webp','',$_GET['img']);
$url=$link.$img;

$tmp_names =$url;


if(!file_exists($url)){
	$url = $link."erorr.jpg";
	$tmp_names = $url;
} 


$extensionList = array("bmp", "jpg", "gif", "png", "jpeg","webp");
$pecah = explode(".", $url);

foreach($pecah as $new) {
	$new = trim($new);
	$ekstensi = strtolower($new);
}

$width = 400;
if(!empty($_GET['width'])){ 
$width = ($_GET['width']); 
}
 

$q = 80;


if (in_array($ekstensi, $extensionList))
{

list($w, $h) = getimagesize($url);
//$width = round($w/2);
//$height = round($h/2);

//$width =400;
//$hx = ($height - $width) ;


$pc = round(($w * 100) / $h);
$min_pc = round(100 - $pc);
$height = round(($width * 100) / $pc);




  $ratio = max($width/$w, $height/$h);
  $h = ceil($height / $ratio);
  $x = ($w - $width / $ratio) / 2;
  $w = ceil($width / $ratio);
  /* new file name */
  /* read binary data from image file */
  $imgString = $url;
  /* create image from string */

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
	
header('Content-Type: image/webp');
  switch ($ekstensi) {
    case 'jpeg':
	imagewebp($tmp, null,$q);
      break;
    case 'jpg':  
	imagewebp($tmp, null,$q);
      break;
    case 'png':
	imagewebp($tmp, null,$q);
      break;
    case 'gif':
	imagewebp($tmp, null,$q);
 
      break;
    default:
      exit;
      break;
  }
  
}  


?>