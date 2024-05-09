<?php 
$row_wisata= $this->model->row("trip","id<>-1	");
$row_produk = $this->model->row("produk","id<>-1	");
$row_homestay = $this->model->row("hotel","id<>-1	");
$row_user = $this->model->row("user","id<>-1	");
$row_bukti = $this->model->row("invoice","id<>-1 and status='Dalam Pengecekan' ");
$row_masuk = $this->model->row("invoice","id<>-1 and status='Sedang Di Proses'	");
$row_selesai = $this->model->row("invoice","id<>-1	and status='Pengiriman Selesai' ");

?>


<style>
	.col-4 h1{text-align:right}
</style>
<div class="container-fluid">
<div class="">

<div class="p-3 bg-light shadow"  style="border-radius:10px " >
	<h5  style="font-weight : bold;margin:0px !important; " > Selamat Datang </h5> 
	<p> Selamat Datang Di Dashboard Administrator <?php echo($settings->nama) ;  ?>, Berikut Rincian Singkat </p> 
</div>

<div class="row mt-3">


	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 ">
	<a class="card overflow-hidden shadow" href="<?php echo($site) ?>master/user">
	  <div class="card-body p-4">
		<h5 class="card-title">Total User</h5>
		<div class="row align-items-center">
		  <div class="col-8">
			<h4 class="fw-semibold mb-1"><?php echo($row_user) ;  ?> User</h4>
			<div class="d-flex align-items-center mb-3">
			  <span
				class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
				<i class="ti ti-arrow-up-left text-success"></i>
			  </span>
			  <p class="text-dark me-1 fs-3 mb-0">Total Pengguna Saat ini</p> 
			</div> 
		  </div>
		  <div class="col-4">
			<h1> <i class="ti ti-users">  </i></h1> 
		  </div>
		</div>
	  </div>
	</a>
	</div>
	
	
	
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 ">
	<a class="card overflow-hidden shadow"  href="<?php echo($site) ?>master/bukti">
	  <div class="card-body p-4">
		<h5 class="card-title">Bukti Masuk</h5>
		<div class="row align-items-center">
		  <div class="col-8">
			<h4 class="fw-semibold mb-1"><?php echo($row_bukti) ;  ?> Bukti</h4>
			<div class="d-flex align-items-center mb-3">
			  <span
				class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
				<i class="ti ti-arrow-up-left text-success"></i>
			  </span>
			  <p class="text-dark me-1 fs-3 mb-0">Bukti Pembayaran</p> 
			</div> 
		  </div>
		  <div class="col-4">
			<h1> <i class="ti ti-info-circle">  </i></h1> 
		  </div>
		</div>
	  </div>
	</a>
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 ">
	<a class="card overflow-hidden shadow"  href="<?php echo($site) ?>master/invoice_masuk">
	  <div class="card-body p-4">
		<h5 class="card-title">Perlu Dikirim</h5>
		<div class="row align-items-center">
		  <div class="col-8">
			<h4 class="fw-semibold mb-1"><?php echo($row_masuk) ;  ?> Pesanan</h4>
			<div class="d-flex align-items-center mb-3">
			  <span
				class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
				<i class="ti ti-arrow-up-left text-success"></i>
			  </span>
			  <p class="text-dark me-1 fs-3 mb-0">Pesanan Perlu Dikirim  </p> 
			</div> 
		  </div>
		  <div class="col-4">
			<h1> <i class="ti ti-list">  </i></h1> 
		  </div>
		</div>
	  </div>
	</a>
	</div>
	
	
	
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 ">
	<a class="card overflow-hidden shadow"  href="<?php echo($site) ?>master/invoice_selesai">
	  <div class="card-body p-4">
		<h5 class="card-title">Pesanan Selesai</h5>
		<div class="row align-items-center">
		  <div class="col-8">
			<h4 class="fw-semibold mb-1"><?php echo($row_selesai) ;  ?> Pesanan</h4>
			<div class="d-flex align-items-center mb-3">
			  <span
				class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
				<i class="ti ti-arrow-up-left text-success"></i>
			  </span>
			  <p class="text-dark me-1 fs-3 mb-0">Pesanan Telah Selesai  </p> 
			</div> 
		  </div>
		  <div class="col-4">
			<h1> <i class="ti ti-check">  </i></h1> 
		  </div>
		</div>
	  </div>
	</a>
	</div>
	
	
	
	
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 ">
	<a class="card overflow-hidden shadow"  href="<?php echo($site) ?>master/invoice_selesai">
	  <div class="card-body p-4">
		<h5 class="card-title">Produk</h5>
		<div class="row align-items-center">
		  <div class="col-8">
			<h4 class="fw-semibold mb-1"><?php echo($row_produk) ;  ?> Data</h4>
			<div class="d-flex align-items-center mb-3">
			  <span
				class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
				<i class="ti ti-arrow-up-left text-success"></i>
			  </span>
			  <p class="text-dark me-1 fs-3 mb-0">Total Data Produk  </p> 
			</div> 
		  </div>
		  <div class="col-4">
			<h1> <i class="ti ti-capture">  </i></h1> 
		  </div>
		</div>
	  </div>
	</a>
	</div>
	
	
	
	
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 ">
	<a class="card overflow-hidden shadow"  href="<?php echo($site) ?>master/invoice_selesai">
	  <div class="card-body p-4">
		<h5 class="card-title">Wisata/ Trip</h5>
		<div class="row align-items-center">
		  <div class="col-8">
			<h4 class="fw-semibold mb-1"><?php echo($row_wisata) ;  ?> Data</h4>
			<div class="d-flex align-items-center mb-3">
			  <span
				class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
				<i class="ti ti-arrow-up-left text-success"></i>
			  </span>
			  <p class="text-dark me-1 fs-3 mb-0">Total Data Wisata  </p> 
			</div> 
		  </div>
		  <div class="col-4">
			<h1> <i class="ti ti-capture">  </i></h1> 
		  </div>
		</div>
	  </div>
	</a>
	</div>
	
	
	
	
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 ">
	<a class="card overflow-hidden shadow"  href="<?php echo($site) ?>master/invoice_selesai">
	  <div class="card-body p-4">
		<h5 class="card-title">Homestay </h5>
		<div class="row align-items-center">
		  <div class="col-8">
			<h4 class="fw-semibold mb-1"><?php echo($row_homestay) ;  ?> data</h4>
			<div class="d-flex align-items-center mb-3">
			  <span
				class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
				<i class="ti ti-arrow-up-left text-success"></i>
			  </span>
			  <p class="text-dark me-1 fs-3 mb-0">Total Data Homestay  </p> 
			</div> 
		  </div>
		  <div class="col-4">
			<h1> <i class="ti ti-capture">  </i></h1> 
		  </div>
		</div>
	  </div>
	</a>
	</div>
	
	
	
	
</div>
</div>
</div>

