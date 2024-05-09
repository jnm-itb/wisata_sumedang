<?php  

if(isset($_POST['delete'])){
$id = in($_POST['id']);
$this->db->query("DELETE FROM produk WHERE id='$id' ");
$alert = "danger";
$respon = "Berhasil Menghapus Data ";	 
} 



?>

<div class="container-fluid bg-light min-vh-100">
<?php include("alert_form.php"); ?>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 ">
 <a class="btn btn-primary mb-2" href="<?php echo($site) ?>master/produk-new" > Tambah Produk Baru </a> 
<div class="card ">
<div class="card-header bg-primary">
	<h5 class="m-0  text-light"> Data Produk</h5>  
</div>
<div class="card-body shadow-sm">

	
	<table class="table table-striped table-bordered">
		<thead>
		<tr>
			<th> Foto </th> 
			<th> Nama Produk </th> 
			<th> Kategori </th> 
			<th> Harga </th> 
			<th> # </th>
		</tr>
		</thead>
		<tbody>
			<?php $table = "produk_view";
			$sql = "`id`<>-1";
			$row = $this->model->row($table,$sql);
			if($row >= 1){
				$dd = $this->model->get_obj($table,$sql);
				foreach($dd as $data){
					?> 
					<tr> 
						<td> <img src="<?php echo($site) ?>images/crop/40/20/<?php echo($data->image) ;  ?>" class="" /></td>
						<td> <?php echo($data->nama) ;  ?> </td>
						<td> <?php echo($data->kategori) ;  ?> </td>
						<td> Rp. <?php echo uang($data->harga, 0) ;  ?> </td>
						<td> 
						<a class="btn btn-danger btn-sm" onclick="showdel('<?php echo($data->id) ;  ?>','<?php 	echo($data->nama) ;  ?>')" > Delete </a> 
						<a class="btn btn-primary btn-sm" href="<?php echo($site) ?>master/produk-edit/<?php echo($data->id) ;  ?>" > Edit </a> 
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
