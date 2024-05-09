<?php 
header("Access-Control-Allow-Origin: *");
require_once("../database_config.php");

$host = $db['default']['hostname'];
$user_db =  $db['default']['username'];
$password_db =  $db['default']['password'];
$database =  $db['default']['database'];
$pdo = new PDO("mysql:host=$host;dbname=$database", $user_db, $password_db, array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));

date_default_timezone_set('Asia/Makassar');
$date = date('Y-m-d');
$d = date('d');
$m= date('m');
$y = date('Y');


require_once("../application/helpers/function_indra_helper.php");
?>