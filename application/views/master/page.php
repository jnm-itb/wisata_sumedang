<?php  

if(isset($_POST['delete'])){
$id = in($_POST['id']);
$this->db->query("DELETE FROM page WHERE id='$id' ");
$alert = "danger";
$respon = "Berhasil Menghapus Data ";	 
} 


?>
<div class="container-fluid">
<a class="btn btn-primary" href="<?php echo($site) ?>master/page-new" > Tambah Data Baru </a> 
<div class="row"> 	 

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 ">
	<div class="card">
		<div class="card-header">
			<h4>Page List  </h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="tables" class="table table-striped">
					<thead>
					<tr>   
						<th>Title</th>					
						<th>#</th>
					</tr>
					</thead>
					<tbody>
					<?php $table = "page";
					$sql = "`id`<>-1";
					$row = $this->model->row($table,$sql);
					if($row >= 1){
						$dd = $this->model->get_obj($table,$sql);
						foreach($dd as $data){
							?> 
							<tr> 
								<td> <?php echo($data->title) ;  ?> </td>
								<td> 
									<a class="btn btn-danger btn-sm" onclick="showdel('<?php echo($data->id) ;  ?>','<?php 	echo($data->title) ;  ?>')" > Delete </a> 
									<a class="btn btn-primary btn-sm" href="<?php echo($site) ?>master/faq-edit/<?php echo($data->id) ;  ?>" > Edit </a> 
						
								</td>
							</tr> 
							<?php 
						}
					} 
					 ?>
					</tbody> 
				</table> 
			</div>
				
		</div>
	</div>	
</div>
</div>

</div>
