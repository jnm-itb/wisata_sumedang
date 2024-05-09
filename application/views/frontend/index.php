<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link rel="shortcut icon" href="<?php echo($site) ?>image/<?php echo($settings->favicon) ;  ?>"  type="image/png" />
    <link rel="stylesheet" href="<?php echo($site) ?>assets_landing/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&amp;display=swap">
    <link rel="stylesheet" href="<?php echo($site) ?>assets_landing/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo($site) ?>assets_landing/fonts/typicons.min.css">
    <link rel="stylesheet" href="<?php echo($site) ?>assets_landing/css/styles.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="<?php echo($site) ?>assets_landing/bootstrap/js/bootstrap.min.js"></script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

	<?php include("meta.php"); ?> 
	<style>
		.paginate_button,.paginate_button *{z-index:0!important;}
		@media(max-width:500px){
			.icon-list-main{width : 33.333%!important;}
		}

		.width-mobile{
			width : 500px;
			max-width:100%;
		}
		.allcategory{bottom:-100vh; transition:.5s;}
		.allcategory.active{bottom:0px; }
	
	</style>
</head>

<body>
<main>
<section class="section-mobile" id="section-mobile"  style="padding-bottom:50px!Important" >
<?php 
include("a_header.php");  
?>

<?php include("modal.php"); ?>