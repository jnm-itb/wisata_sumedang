<?php if(isset($_POST['delete'])){
	$id = in($_POST['id']);
	$this->db->query("DELETE FROM user WHERE id='$id' ");
	$alert = "success";
	$respon = "Berhasil Menghapus User ";
	
	 
}  ?>

<div class="container-fluid bg-light min-vh-100">
<!--  Row 1 -->
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 ">
 
<div class="card ">
<div class="card-header bg-primary">
	<h5 class="m-0  text-light"> Data Pengguna </h5>  
</div>
<div class="card-body shadow-sm">

	<?php include("alert_form.php"); ?>
	<table class="table table-striped table-bordered">
		<thead>
		<tr>
			<th> Nama </th>
			<th> Telepon </th>
			<th> Email </th>
			<th> User ID</th> 
			<th> Alamat </th>
			<th> # </th>
		</tr>
		</thead>
		<tbody>
			<?php $table = "user";
			$sql = "`id`<>-1";
			$row = $this->model->row($table,$sql);
			if($row >= 1){
				$dd = $this->model->get_obj($table,$sql);
				foreach($dd as $data){
					?> 
					<tr> 
						<td> <?php echo($data->nama) ;  ?> </td>
						<td> <?php echo($data->telepon) ;  ?> </td>
						<td> <?php echo($data->email) ;  ?> </td>
						<td> <?php echo($data->user_id) ;  ?> </td>
						<td> <?php echo($data->alamat) ;  ?> </td>
						<td> 
								<a class="btn btn-danger btn-sm" onclick="showdel('<?php echo($data->id) ;  ?>','<?php 	echo($data->nama) ;  ?>')" > Delete </a> 
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
