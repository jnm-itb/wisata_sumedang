<?php 
if(!empty($login)){


?>

<div class="bg-style">
	<div class="padding">
		<div class="pt-3 pb-3" align="center">
			<b class="fs-22"> Selamat Datang Di <?php echo($settings->nama) ;  ?></b> 
			<p class="mb-0"> <?php echo($settings->deskripsi) ;  ?> <br /> <br />
		</div>
	</div>
</div>



<div class="bg-style ">
	<a class="d-block padding shadow mb-2 bg-white nolink" href="<?php echo($site) ?>page/bantuan" >
		<div class="pt-3 pb-3">
			<div class="card-flex w-100">
				<div class="icon-div w-50p bg-style">
					<i class="fas fa-info-circle text-success fs-26">  </i>
				</div>
				<div class="w-100-50 ps-3">
					<b class="fs-16"> Bantuan </b>
					<p class="fs-14 mb-0"> Temukan Informasi yang mungkin anda butuhkan</p> 
					
				</div>
			</div>
		</div>
	</a> 
	
	 
	<a class="d-block padding shadow mb-2 bg-white nolink" href="<?php echo($site) ?>page/settings-password" >
		<div class="pt-3 pb-3">
			<div class="card-flex w-100">
				<div class="icon-div w-50p bg-style">
					<i class="fas fa-lock text-success fs-26">  </i>
				</div>
				<div class="w-100-50 ps-3">
					<b class="fs-16"> Pengaturan Password </b>
					<p class="fs-14 mb-0"> Ubah PIN / Password Login </p> 
					
				</div>
			</div>
		</div>
	</a> 
	
	<a class="d-block padding shadow mb-2 bg-white nolink" href="<?php echo($site) ?>page/settings-profile" >
		<div class="pt-3 pb-3">
			<div class="card-flex w-100">
				<div class="icon-div w-50p bg-style">
					<i class="fas fa-user text-success fs-26">  </i>
				</div>
				<div class="w-100-50 ps-3">
					<b class="fs-16"> Pengaturan Akun </b>
					<p class="fs-14 mb-0">Atur Informasi Pribadi Anda </p> 
					
				</div>
			</div>
		</div>
	</a> 
	
	<?php $table = "page";
	$sql = "`id`<>-1";
	$row = $this->model->row($table,$sql);
	if($row >= 1){
		$dd = $this->model->get_obj($table,$sql);
		foreach($dd as $data){
			?> 
			
	<a class="d-block padding shadow mb-2 bg-white nolink" href="<?php echo($site) ?>page/pages/<?php echo (title($data->title)."-".$data->id) ;  ?>" >
		<div class="pt-3 pb-3">
			<div class="card-flex w-100">
				<div class="icon-div w-50p bg-style">
					<i class="fas fa-info-circle text-success fs-26">  </i>
				</div>
				<div class="w-100-50 ps-3">
					<b class="fs-16"> <?php echo($data->title) ;  ?></b>
					<p class="fs-14 mb-0"> Page Statis <?php echo($data->title) ;  ?> </p> 
					
				</div>
			</div>
		</div>
	</a>  
			<?php 
		}
	} 
	 ?>
	
	<a class="d-block padding shadow mb-2 bg-white nolink" href="<?php echo($site) ?>page/logout" >
		<div class="pt-3 pb-3">
			<div class="card-flex w-100">
				<div class="icon-div w-50p bg-style">
					<i class="fas fa-sign-out-alt text-success fs-26">  </i>
				</div>
				<div class="w-100-50 ps-3">
					<b class="fs-16"> Keluar </b>
				</div>
			</div>
		</div>
	</a> 
</div>



<?php }else {?> 

<div class="">
<div class="bg-style min-vh-100">
	<div class="padding pt-5 pb-5" align="center"> 
			
			<b class="fs-22"> Selamat Datang Di <?php echo($settings->nama) ;  ?></b> 
			<p> <?php echo($settings->deskripsi) ;  ?> <br /> <br />
			 
			Saat Ini anda belum Masuk .  
			</p> 
			 
			 <div class="mt-1">
	<a class="btn btn-success text-light" href="<?php echo($site) ?>page/login" > Masuk Sekarang </a> 
	<a class="btn btn-light text-dark border"  href="<?php echo($site) ?>page/register" > Daftar Baru</a> 
			</div>
			
			
			
			 
	</div>
</div>
</div>
 
<?php } ?>