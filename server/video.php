<?php
session_start();
include("a_con.php");


$id = "-1";
if(!empty($_GET['id_user'])){ 
$id = in($_GET['id_user']); 
}
 
 
error_reporting(E_ALL);
$wheres = "`id_user` =  '$id'  ";
$ordered = " `id` DESC ";

 
$aColumns = array('date','image','title','type','size','watch','download','id');
$sIndexColumn = "id";
$sTable = "video_view";
include("master_filter.php");

?>