<?php
session_start();
include("a_con.php");


error_reporting(E_ALL);
$wheres = "`id` <> '-1'  ";
$ordered = " `id` DESC ";

$aColumns = array('date','image','title','id');
$sIndexColumn = "id";
$sTable = "blog";
include("master_filter.php");

?>