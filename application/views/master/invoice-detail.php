<?php 
$table = "invoice_view";
$sql = "`invoice`='$id'";
$row = $this->model->row($table,$sql);
if($row >= 1){
$data = $this->model->get_obj($table,$sql)[0];

?>

<div class="container-fluid bg-light min-vh-100">
<!--  Row 1 -->
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 ">
 
<div class="card ">
<div class="card-header bg-primary">
	<h5 class="m-0  text-light"> Detail Invoice - #<?php echo($data->invoice) ;  ?> </h5>  
</div>
<div class="card-body shadow-sm">

	<?php include("alert_form.php"); ?>
	<table class="table table-striped table-bordered">
		<tbody>
			 <tr> <th> Invoice </th> <td> <?php echo($data->invoice) ;  ?> </td> </tr>
			<tr> 	 <th> Total Pembayaran </th> <td> <?php echo uang($data->total,0) ;  ?> </td> </tr>
			<tr> 	 <th> Nama Penerima </th> <td> <?php echo($data->nama) ;  ?> </td> </tr>
			<tr> 	 <th> Telepon </th> <td> <?php echo($data->telepon) ;  ?> </td> </tr>
			<tr> 	 <th> ALamat  </th> <td> <?php echo($data->alamat) ;  ?> </td> </tr>
			 </tr>
		</tbody>
	</table> 
	
	


</div>
</div>
</div>


<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 ">
 
<div class="card ">
<div class="card-header bg-primary">
	<h5 class="m-0  text-light"> Detail Pesanan </h5>  
</div>
<div class="card-body shadow-sm"> 
	<table class="table table-striped table-bordered">
	<thead>
		<th> Produk </th>
		<th> QTY </th>  
	</thead>
		<tbody>
			<?php 
			$table = "invoice_detail_view";
			$sql = " `invoice` = '$id'  ";
			$row = $this->model->row($table,$sql);
			if($row >= 1){
				$dd = $this->model->get_obj($table,$sql);
				foreach($dd as $d){
					?>  
					<tr> 
						<td> <?php echo($d->nama_produk) ;  ?> </td>
						<td> <?php echo($d->qty) ;  ?> </td>
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


<?php } ?>
