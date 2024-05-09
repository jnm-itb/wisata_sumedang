<?php
session_start();
include("a_con.php");

error_reporting(E_ALL);
$wheres = "`id` <> '-1'  ";
$ordered = " `id` DESC ";

 
$aColumns = array('date','name','email','user_id','password','total_video','id');
$sIndexColumn = "id";
$sTable = "user_view";
include("master_filter.php");

?>