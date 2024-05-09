<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
$active_group = 'default';
$query_builder = TRUE;

require_once("database_config.php");
$db['default']['db_debug'] = ENVIRONMENT !== 'production' ;

?>
