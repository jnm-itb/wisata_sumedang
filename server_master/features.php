<?php
session_start();
include("a_con.php");

error_reporting(E_ALL);
$wheres = "`id` <> '-1'  ";
$ordered = " `id` DESC ";

$aColumns = array('image','title','description','id');
$sIndexColumn = "id";
$sTable = "features";
include("master_filter.php");

?>