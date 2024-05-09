<?php 
	$id = str_replace('-','%',$id);
	$table = "page";
	$sql = "`title` LIKE '%$id%' ";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$data = $this->model->get_obj($table,$sql)[0];
		
	
	
	
?> 
<div class="h-100 w-100"  style="background: #001527; " >
	<div class=""  style="height: 100%; overflow:auto; width : 100%; padding-top:100px; padding-bottom:50px;" >
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 ">
				<div class="text-light" align="center">
				<h1 class="mb-0"> <?php echo($data->title) ;  ?></h1> 
				<p class=""> Upload At <?php echo(date_format( date_create($data->date) , 'd M Y h:i:s' )) ;  ?> </p> 
				</div>			
			</div>
			
			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-12  ">
				<div class="bg-light text-dark p-3"  style="border-radius:10px; " >
					<?php if(!empty($data->image)){?> 
					<img src="<?php echo($site) ?>image/<?php echo($data->image) ;  ?>" class="w-100" /> 
					<?php  }  ?>
					
					<?php echo html_entity_decode(htmlspecialchars_decode($data->text)) ;  ?>
				
				</div>
			
			</div>
			
		
		</div>
		</div>
	</div>
	

</div> 
	<?php } ?>
	
	