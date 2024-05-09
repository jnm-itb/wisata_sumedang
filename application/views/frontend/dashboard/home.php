<?php 
if(isset($_POST['delete'])){
	$id = in($_POST['id']);
	$table = "video";
	$sql = "`id`='$id' and id_user='$id_user' ";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$data = $this->model->get_obj($table,$sql)[0]; 
		$this->db->query("DELETE FROM video WHERE `id`='$id' and id_user='$id_user'");
		if(file_exists($data->filename)){
			unlink($data->filename);
			$alert = "success";
			$respon = "Success Delete Your Video ";
		}   	
	} else {
		$alert = "danger";
		$respon = "Sorry - Video Has Not Found ";
	}
}  
?>



<?php include("modal.php"); ?>


<section class="h-100 w-100 section_home d-flex align-items-center justify-content-center text-light"   >
	
	<div class=""  style="height: 100vh; padding-top:100px; overflow:auto; width : 100%; padding-bottom:100px" >
	<div class="container">
<?php include("alert_form.php"); ?>
		<h1 class="mb-0"> Welcome <?php echo($user->name) ;  ?> <a href="<?php echo($site) ?>dashboard/profile" class="fs-14 btn btn-light btn-sm" > <small> Edit Profile </small> </a>  <a href="<?php echo($site) ?>dashboard/password" class="fs-14 btn btn-light btn-sm" > <small> Edit Password </small> </a>  </h1> 
		<p> The following are details of the data you have uploaded so far. You can update the data that you have uploaded </p> 
		
		
		<div class="row ml-n1 mr-n2">
			 
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 p-2">
			<div class="card ">
			<div class="card-header">
				<h5> Total Videos </h5>  
			</div>
			<div class="card-body shadow-sm" align="center">
				<h1 class="display-3"  style="font-weight : bold;" > <?php echo uang($user->total_video,0) ;  ?></h1> 
				<p class="mb-0"> Total videos uploaded </p> 
				
			</div>
			</div>
			</div>
			
		
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 p-2">
			<div class="card ">
			<div class="card-header">
				<h5> Total Watch </h5>  
			</div>
			<div class="card-body shadow-sm" align="center">
				<h1 class="display-3"  style="font-weight : bold;" > <?php echo uang($user->total_watch,0) ;  ?></h1> 
				<p class="mb-0"> Your total video views  </p> 
				
			</div>
			</div>
			</div>
			
		
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 p-2">
			<div class="card ">
			<div class="card-header">
				<h5> Total Download </h5>  
			</div>
			<div class="card-body shadow-sm" align="center">
				<h1 class="display-3"  style="font-weight : bold;" > <?php echo uang($user->total_download,0) ;  ?></h1> 
				<p class="mb-0"> Your total videos downloaded </p> 
				
			</div>
			</div>
			</div>
			
			

<link rel="stylesheet" href="<?php echo($site) ?>assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="<?php echo($site) ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo($site) ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">  


			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 p-2 ">
				<div class="table-responsive">
					<table id="tables" class="table table-striped w-100">
					<thead> 
					<tr>
						<th> Date Uploaded </th>
						<th> Thumb </th>
						<th> Title </th>
						<th> Type </th>
						<th> Size </th>
						
						<th> Watch </th>
						<th> Download </th> 
						<th> Action </th> 
					</tr>
					</thead>
					<tbody>
												
					</tbody>
				</table> 
				</div>
			</div>
			


<script src="<?php echo($site) ?>assets/modules/datatables/datatables.min.js"></script>
<script src="<?php echo($site) ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo($site) ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>

		</div>
	</div>
	</div>
</section>



<script>  
site ="<?php echo($site) ?>";


var tablex = $('#tables').dataTable( {
 "bProcessing": true,
 "bServerSide": true, 
  
    "ajax" : { 
        url:  site+"server/video.php?id_user=<?php echo($user->id) ;  ?>", 
        type:"POST"
    } ,
	
 "aoColumns": [
 
 
	null,   
	{ "mclass":"wall", "mData": "1", "mRender": function ( data, type, full ) {
		return '<img src="<?php echo($site) ?>images/crop/300/200/'+data+'"  style="width : 30px; border-radius:3px; "  />' ;  
	}},
	{ "mclass":"wall", "mData": "2", "mRender": function ( data, type, full ) {
		return '<a class="text-danger" target="_blank" href="<?php echo($site) ?>v/'+btoa(full[7])+'" > '+data+' </a> ' ;  
	}},
	
	null,  
	null,  
	
	{ "mclass":"wall", "mData": "5", "mRender": function ( data, type, full ) {
		return  (data)+"x" 
	}},
	
	{ "mclass":"wall", "mData": "6", "mRender": function ( data, type, full ) {
		return  (data)+"x" 
	}},
	
	{ "mclass":"wall", "mData": "7", "mRender": function ( data, type, full ) {
		del="showdel('"+data+"','"+full[1]+"')";
		div = '';
		div += '<div class="dropdown"> <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Option </button>';
		div += '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
		div += '<a class="dropdown-item"  style="cursor:pointer !important;"  onclick="'+del+'">Delete</a>';
		div += '<a class="dropdown-item"  style="cursor:pointer !important;" href="'+site+'dashboard/video_edit/'+data+'" > Edit</a>'; 
		div += '<a class="dropdown-item"  style="cursor:pointer !important;" target="_blank" href="<?php echo($site) ?>v/'+btoa(full[7])+'" > Preview Link </a>'; 
		div += '</div>';
		div += '</div>';
		return div;
		
	}},
	
	
	
	
 ]
 } );
 
 
 
function table_reload(){
	$('#tables').DataTable().ajax.reload(null, false);
}

 

</script> 

	

	


