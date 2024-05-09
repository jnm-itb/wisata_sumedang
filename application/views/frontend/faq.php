<section class="h-100 w-100 section_home d-flex align-items-center justify-content-center">
	<div class=""   style="width : 100%; max-height:100vh ; overflow:auto; padding-top:100px; padding-bottom:100px" >
	<div class="container">
	<div class="text-light"   >
			
		<h1> Frequently Asked Questions</h1> 
		<div class="">
			
		<div id="accordion">
		
		<?php $table = "faq";
		$sql = "`id`<>-1";
		$row = $this->model->row($table,$sql);
		if($row >= 1){
			$dd = $this->model->get_obj($table,$sql);
			foreach($dd as $data){
				?> 
				
			<div class="card mb-2">
			<div class="card-header" id="heading_<?php echo($data->id) ;  ?>">
			<h5 class="mb-0">
			<button class="btn btn-link text-light d-block w-100 align-left text-left" align="left" data-toggle="collapse" data-target="#collapse_<?php echo($data->id) ;  ?>" aria-expanded="true" aria-controls="collapse_<?php echo($data->id) ;  ?>">
				<?php echo($data->title) ;  ?>
			</button>
			</h5>
			</div>

			<div id="collapse_<?php echo($data->id) ;  ?>" class="collapse" aria-labelledby="heading_<?php echo($data->id) ;  ?>" data-parent="#accordion">
			<div class="card-body">
				<?php echo($data->description) ;  ?>
			</div>
			</div>
			</div>
			 
				<?php 
			}
		} 
		 ?>
			
			
		</div>
		
		</div>
	
	</div>
	</div>
	</div>
	
</section>