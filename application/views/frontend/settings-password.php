<?php if(!empty($login)){
	
if(isset($_POST['edit'])){
	$user_id_baru = in($_POST['user_id_baru']);
	$password_baru = in($_POST['password_baru']);
	$password_lama = in($_POST['password_lama']);
	if($password_lama == $user->password){
		
		$id_user= $user->id;
		
		$row = $this->model->row("user","user_id ='$user_id' and id<>'$id_user' ");
		if($row >= 1){
			$alert = "danger";
			$respon = "Maaf. User ID Ini sudah digunakan sebelumnya";
		}else {
			$data = array();
			$data['user_id'] = $user_id_baru;
			$data['password'] = $password_baru;
			 
			$this->db->where('id',$id_user);
			$this->db->update('user',$data);
			
			$alert = "success";
			$respon = "Berhasil Memperbaharui Akses Login ";
			
			
		}
		
		
	}   else {
		$alert = "danger";
		$respon = "Maaf. Password Lama Anda Salah . ";
		
	} 
} 	
?> 


 
<div class="pt-2 pb-4">
<div class="padding ">
<div class="pt-3 pb-2">
<h5  style="margin:0px !important; font-weight : bold;" > Pengaturan Password </h5> 
<p> Silahkan Lengkapi Formulir Dengan Benar </p> 
</div>
<?php include("alert_form.php"); ?> 
<form method="post" class="block-all" enctype="multipart/form-data"> 
	<span  style="font-weight : bold; font-size : 14px" > User ID Baru</span> 
	<input name="user_id_baru" type="text" class="form-control  input-login"  value="<?php echo($user->user_id) ;  ?>"   placeholder="User ID Baru" align="center">
	 
	<span  style="font-weight : bold; font-size : 14px; margin-top: 10px;" > Password Baru</span> 
	<input name="password_baru" type="password" class="form-control  input-login"  placeholder="User ID Baru" align="center">
	 
	<span  style="font-weight : bold; font-size : 14px; margin-top: 10px;" > Konfirmasi Password Lama</span> 
	<input name="password_lama" type="text" class="form-control  input-login" placeholder="User ID Baru" align="center">
	 
		
	<br />
	<button type="submit" name="edit" class="btn btn-success" >Perbaharui Akses Login</button> 


</form>

</div>
</div>


<?php }  ?>


