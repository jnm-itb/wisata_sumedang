<?php
session_start();
include("a_con.php");

error_reporting(E_ALL);
$wheres = "`id` <> '-1'  ";
$ordered = " `id` DESC ";

$aColumns = array('title','description','id');
$sIndexColumn = "id";
$sTable = "faq";
include("master_filter.php");

?>