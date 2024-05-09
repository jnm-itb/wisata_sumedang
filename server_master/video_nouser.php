<?php
session_start();
include("a_con.php");

error_reporting(E_ALL);
$wheres = "user_id = '' or user_id is null  ";
$ordered = " `id` DESC ";


$aColumns = array('date','title','type','size','watch','download','id');
$sIndexColumn = "id";
$sTable = "video_view";
include("master_filter.php");

?>