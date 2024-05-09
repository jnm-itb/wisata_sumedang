 

<div class="container-fluid bg-light min-vh-100">
<!--  Row 1 -->
	<?php include("alert_form.php"); ?>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 ">
 
<div class="card ">
<div class="card-header bg-primary">
	<h5 class="m-0  text-light"> Invoice Selesai  </h5>  
</div>
<div class="card-body shadow-sm">

	<table class="table table-striped table-bordered">
		<thead>
		<tr>
			<th> Tanggal </th>
			<th> Invoice </th>
			<th> Nama </th>
			<th> Telepon </th> 
			<th> Total </th> 
			<th> Alamat Pengiriman  </th>
			<th> # </th>
		</tr>
		</thead>
		<tbody>
			<?php $table = "invoice_view";
			$sql = "`status`= 'Pengiriman Selesai' ORDER BY id DESC LIMIT 20 ";
			$row = $this->model->row($table,$sql);
			if($row >= 1){
				$dd = $this->model->get_obj($table,$sql);
				foreach($dd as $data){
					?> 
					<tr> 
						<td> <?php echo($data->tanggal) ;  ?> </td>
						<td> <?php echo($data->invoice) ;  ?> </td>
						<td> <?php echo($data->nama) ;  ?> </td>
						<td> <?php echo($data->telepon) ;  ?> </td>
						<td> <?php echo uang($data->total) ;  ?> </td>
						<td> <?php echo($data->alamat) ;  ?> </td>
						
						<td> 
							<div class="dropdown dropdown-right">
							  <button class="btn btn-primary btn-sm dropdown-toggle" onclick="$('#d').slideToggle()" 
							  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								 Action 
							  </button>
							  <div  style="right:0px!Important; left:auto"  class="dropdown-menu" id="d" aria-labelledby="dropdownMenuButton"> 
								<a class="dropdown-item" href="<?php echo($site) ?>master/invoice-detail/<?php echo($data->invoice) ;  ?>">Lihat Pesanan</a>
							  </div>
							</div>
						</td>
						
						
					</tr> 
					<?php 
				}
			} else {
				?> 
				<tr> 
					<td colspan="100"> Tidak ada data </td>
				</tr> 
				<?php 
			}
			 ?>		
		</tbody>
	</table> 
	
	


</div>
</div>


</div>
</div>
</div>
