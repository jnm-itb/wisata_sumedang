 
<section class="h-100 w-100 section_home d-flex align-items-center justify-content-center">
	<div class=""   style="width : 100%; max-height:100vh ; overflow:auto; padding-top:100px; padding-bottom:100px" >
	<div class="container">
	<div class="text-light"   >
			
		<h1 class="mb-0"> Features </h1> 
		<p> Upload and share files for free. You can upload your files and share them anywhere. Fastupload.io is a file-sharing service that offers fast upload and download speeds. </p> 
		
		<div class="row   ml-n1 mr-n1">
		<?php $table = "features";
		$sql = "`id`<>-1";
		$row = $this->model->row($table,$sql);
		if($row >= 1){
			$dd = $this->model->get_obj($table,$sql);
			foreach($dd as $data){
				?> 
			<div class="col-lg-4  col-md-4 col-sm-12 col-xs-12 col-12 p-1"  >
			<div class="card mb-2" >
			<div class="card-body"  style="min-height:300px"  align="center">
			
				<img src="<?php echo($site) ?>image/<?php echo($data->image) ;  ?>"   style="height : 100px"  />
				 
				<h4 class="mt-2"> <?php echo($data->title) ;  ?></h4>  
				<p class="mb-0 fs-14"> <?php echo($data->description) ;  ?> </p> 
				
				
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
	
</section>