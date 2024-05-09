<?php
session_start();
include("a_con.php");

error_reporting(E_ALL);


$id_user = "";
if(!empty($_GET['id_user'])){ 
$id_user = in($_GET['id_user']); 
$wheres = "`id` <> '-1' and id_user = '$id_user'   ";
} else {
$wheres = "`id` <> '-1' and user_id<>'' and user_id is not null  ";
}

$ordered = " `id` DESC ";

$aColumns = array('date','CONCAT( `user_id`,"(",`name`,")" )','title','type','size','watch','download','id');
$sIndexColumn = "id";
$sTable = "video_view";
include("master_filter.php");

?>