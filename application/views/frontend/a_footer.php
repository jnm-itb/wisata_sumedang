<?php 
$show_ar = array();
$show_ar['home'] = array('detail','home','category','search');
$show_ar['resep'] = array('resep','baca');
$show_ar['cart'] = array('cart','checkout','alamat-pilih','alamat-tambah','alamat-ubah');
$show_ar['pesanan'] = array('pesanan','invoice','invoice-detail','invoice-bayar','invoice-bank','bayar');
$show_ar['akun'] = array('akun','login','bantuan','page','referral','riwayat','password','alamat','alamat-edit','alamat-new');

$showx = "home";
foreach($show_ar as $name => $isi){
	if(in_array($page , $isi)){
		$showx = $name;		
	} 
}


  
 
?>
<aside>
<div class="modal_del" id="modal_del" >
	<div class="padding relative pt-3 pb-3 shadow">
		<a class="btn btn-white btn-sm absolute-10" onclick="toggle_modal_del()" > <i class="fas fa-times">  </i> </a> 
		<b class="fs-16"> Apakah Anda Yakin Ingin Menghapus Data Ini </b> 
		<p class="fs-12"> Data Yang Akan Di Hapus : <span id="hapus_data"  style="font-weight : bold;" > </span> </p> 
		<form method="post" enctype="multipart/form-data"> 
			<input type="hidden" id="id_del" name="id_del" class="form-control" value="" placeholder=""    />
			<button type="submit" class="btn btn-danger" name="delete" >Ya . Hapus Sekarang</button>
		</form>
	</div>
</div>

	<a class="btn bg-style shadow-lg btn-up" onclick="scrool_top();" > <i class="fas fa-chevron-up">  </i> </a> 

	<a class="aside-menu <?php 	if($showx == "home"){echo("active") ; }  ?>" href="<?php echo($site) ?>"><i class="typcn typcn-home-outline"></i><span>Utama</span></a>
	<a class="aside-menu <?php 	if($showx == "resep"){echo("active") ; }  ?>" href="<?php echo($site) ?>page/produk"><i class="typcn typcn-image"></i><span>Produk</span></a>
	
	<a class="aside-menu <?php 	if($showx == "cart"){echo("active") ; }  ?>" href="<?php echo($site) ?>page/cart">
	<i class="typcn typcn-shopping-cart"></i><span>Keranjang</span> 
	<span id="total_cart" class="total_cart"><?php echo($total_cart) ;  ?></span> 
	</a>
	
	<a class="aside-menu <?php 	if($showx == "pesanan"){echo("active") ; }  ?>" href="<?php echo($site) ?>page/invoice"><i class="typcn typcn-th-list-outline"></i><span>Pesanan</span></a>
	<a class="aside-menu <?php 	if($showx == "akun"){echo("active") ; }  ?>" href="<?php echo($site) ?>page/akun"><i class="typcn typcn-user-outline"></i><span>Akun</span></a>
</aside>

