<?php 
if(!empty($id)){
	$idx = explode('-',$id);
	$id = $idx[count($idx) -1]; 
	
	
	$table = "page";
	$sql = "`id`='$id'";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$data = $this->model->get_obj($table,$sql)[0];
	} 
}
?>
 

<div class="padding pt-3">
<?php include("alert_form.php"); ?> 
<div class="card-product-detail"> 
<h4  style="font-weight : bold;" > <?php echo($data->title) ;  ?></h4> 
</div>
<div class="">
		<?php echo html_entity_decode(htmlspecialchars_decode($data->text)) ;  ?>	
</div>
</div> 

