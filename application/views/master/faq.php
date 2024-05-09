<?php if(isset($_POST['new'])){
	$title = in($_POST['title']);
	$description = in($_POST['description']);
	
	$row = $this->model->row("faq","title='$title' ");
	if($row >= 1){
		$alert = "danger";
		$respon = "Maaf. Data ini sudah ada sebelumnya ";
	}else {
		$data = array();
		$data['title'] = $title ;
		$data['description'] = $description ;
		$this->db->insert('faq',$data);
		$return  = $this->db->insert_id(); 
		
		$alert = "success";
		$respon = "Berhasil Memasukkan Data Baru ";
		
	}	
}  
 

if(isset($_POST['delete'])){
$id = in($_POST['id']);
$this->db->query("DELETE FROM faq WHERE id='$id' ");
$alert = "danger";
$respon = "Berhasil Menghapus Data ";	 
} 


?>
<div class="container-fluid">
<div class="row"> 	
<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-12 ">
	<div class="card">
		<div class="card-header">
			<h4>FAQ Baru</h4>
		</div>
		<div class="card-body">
			<form method="post" enctype="multipart/form-data"> 
				<span> Title </span> 
				<input type="text" required class="form-control" name="title" value="" placeholder="FAQ Title"    />
				<br /> 
				<span> Description </span> 
				<textarea type="text" required class="form-control" name="description" value="" placeholder="Faq Description"    ></textarea>
				<br />
				
				<button name="new" type="submit" class="btn btn-primary" > <i class="la la-ticket">  </i> Masukkan Data</button>
			</form>
		</div>
	</div>
</div> 		

<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-12 ">
	<div class="card">
		<div class="card-header">
			<h4>FAQ List </h4>
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
					<?php $table = "faq";
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
