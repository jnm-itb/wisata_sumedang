<?php if(!empty($login)){
	
if(isset($_POST['edit'])){
	$nama = in($_POST['nama']);
	$email = in($_POST['email']);
	$telepon = in($_POST['telepon']);
	$alamat = in($_POST['alamat']);
	$id_user = $user->id;	
	
	$alert = "success";
	$respon = "Berhasil Memperbaharui Profile ";
	
	
	$this->db->query("UPDATE user SET `nama`='$nama' , `email`='$email',
	`telepon`='$telepon',
	`alamat`='$alamat' WHERE id='$id_user'   ");
	
	$table = "user";
	$sql = "`id`='$id_user'";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$user = $this->model->get_obj($table,$sql)[0];
		
	} 
	
	
	
	
} 	
?> 


 
<div class="pt-2 pb-4">
<div class="padding ">
<div class="pt-3 pb-2">
<h5  style="margin:0px !important; font-weight : bold;" > Pengaturan Profile </h5> 
<p> Silahkan Lengkapi Formulir Dengan Benar </p> 
</div>
<?php include("alert_form.php"); ?> 
<form method="post" class="block-all" enctype="multipart/form-data"> 
	<span  style="font-weight : bold; font-size : 14px" > Nama</span> 
	<input name="nama" type="text" class="form-control  input-login"  value="<?php echo($user->nama) ;  ?>"   placeholder="Nama" align="center">
	
	<span  style="font-weight : bold; font-size : 14px; margin-top: 10px;" > Email</span> 
	<input name="email" type="email" class="form-control  input-login"  value="<?php echo($user->email) ;  ?>"   placeholder="Email" align="center">
	
	<span  style="font-weight : bold; font-size : 14px; margin-top: 10px;" > Telepon </span> 
	<input name="telepon" type="text" class="form-control  input-login"  value="<?php echo($user->telepon) ;  ?>"   placeholder="Telepon" align="center">
	
	<span  style="font-weight : bold; font-size : 14px; margin-top: 10px;" > Alamat Default Pengiriman </span> 
	<input name="alamat" type="text" class="form-control  input-login"  value="<?php echo($user->alamat) ;  ?>"   placeholder="Alamat Pengiriman" align="center">
	<br />
	  
	
	<button type="submit" name="edit" class="btn btn-success" >Perbaharui Profile</button> 


</form>

</div>
</div>


<?php }  ?>


