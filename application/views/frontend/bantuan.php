<div class="pt-2 pb-4">
<div class="padding ">
<div class="pt-3 pb-2">
<h5  style="margin:0px !important; font-weight : bold;" > FAQ / Bantuan </h5> 
<p> Dapatkan Informasi Seputar <?php echo($settings->nama) ;  ?></p> 
</div>

<?php 
$x = 0 ;
$table = "faq";
$sql = "`id`<>-1";
$row = $this->model->row($table,$sql);
if($row >= 1){
	$dd = $this->model->get_obj($table,$sql);
	foreach($dd as $data){
		$x++;
		?> 
			 
	<div class="mb-0 mt-2">
	<a class="d-block padding shadow bg-white nolink"  style="cursor:pointer"  data-bs-toggle="collapse" data-bs-target="#multiCollapseExample_<?php echo($x) ;  ?>" aria-expanded="false" aria-controls="multiCollapseExample_<?php echo($x) ;  ?>" >
		<div class="pt-3 pb-3">
			<b> <?php echo($x) ;  ?>. <?php echo($data->title) ;  ?> </b> 			
		</div>
	</a>
	<div class="padding bg-style pt-2 pb-2 collapse multi-collapse" id="multiCollapseExample_<?php echo($x) ;  ?>">
		<p class="m-0 fs-14"> <?php echo($data->description) ;  ?></p> 
	</div>
	</div>
	
	 
			 <?php 
		}
	} 
 ?>
	
</div>
</div>

