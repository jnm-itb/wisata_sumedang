

function check_datatables(){
	
if($('#sponsor_all')){		
var id_user = $('#sponsor_all').attr('data_id_user');
var tablex = $('#sponsor_all').dataTable( {
	"bProcessing": true,
	"bServerSide": true,  
	"order" : [[0 , 'desc']],
	
	"ajax" : { 
		url:  site+"server/sponsor_all.php?id_user="+id_user, 
		type:"POST"
	} ,
	"aoColumns": [
		null,  
		null,  
		{ "mclass":"wall", "mData": "2", "mRender": function ( data, type, full ) {
			if(data == "No"){
				return "Belum Aktif";
			} else {
				return "Sudah Aktif";			
			}
		}}
	]
} );
} 


if($('#sponsor_aktif')){		
var id_user = $('#sponsor_aktif').attr('data_id_user');
var tablex = $('#sponsor_aktif').dataTable( {
	"bProcessing": true,
	"bServerSide": true,  
	"order" : [[0 , 'desc']],
	"ajax" : { 
		url:  site+"server/sponsor_aktif.php?id_user="+id_user, 
		type:"POST"
	} ,
	"aoColumns": [
		null,  
		null,  
		{ "mclass":"wall", "mData": "2", "mRender": function ( data, type, full ) {
			if(data == "No"){
				return "Belum Aktif";
			} else {
				return "Sudah Aktif";			
			}
		}}
	]
} );
} 

if($('#sponsor_tidakaktif')){		
var id_user = $('#sponsor_tidakaktif').attr('data_id_user');
var tablex = $('#sponsor_tidakaktif').dataTable( {
	"bProcessing": true,
	"bServerSide": true,  
	"order" : [[0 , 'desc']],
	"ajax" : { 
		url:  site+"server/sponsor_tidakaktif.php?id_user="+id_user, 
		type:"POST"
	} ,
	"aoColumns": [
		null,  
		null,  
		{ "mclass":"wall", "mData": "2", "mRender": function ( data, type, full ) {
			if(data == "No"){
				return "Belum Aktif";
			} else {
				return "Sudah Aktif";			
			}
		}}
	]
} );
} 




if($('#pemasukan')){		
var id_user = $('#pemasukan').attr('data_id_user');
var tablex = $('#pemasukan').dataTable( {
	"bProcessing": true,
	"bServerSide": true,  
	"order" : [[0 , 'desc']],
	"ajax" : { 
		url:  site+"server/pemasukan.php?id_user="+id_user, 
		type:"POST"
	} ,
	"aoColumns": [
	{ "mclass":"wall", "mData": "0", "mRender": function ( data, type, full ) {
		//$aColumns = array('date','keterangan','jenis','total','active');
		
		date = full[0];
		keterangan = full[1];
		jenis = full[2];
		total = full[3];
		id = full[4];
		
		div = '';
		div += '<div class="pemasukan_card"> <small> <i class="fa fa-calendar-alt mr-2">  </i>'+date+' - '+jenis+'</small> ';
		div += '<p class="mb-0 fs-14"> <b> Rp. '+uang(total)+' </b> </p> ';
		div += '<p class="fs-13 mb-0"> '+keterangan+' </p></div> ';
		return div ;
		
	}}
		
	]
} );
} 


if($('#invoice_all')){	
var id_user = $('#invoice_all').attr('data_id_user');
var tablex = $('#invoice_all').dataTable( {
	"bProcessing": true,
	"bServerSide": true,  
	"order" : [[0 , 'desc']],
	"ajax" : { 
		url:  site+"server/invoice_all.php?id_user="+id_user, 
		type:"POST"
	} ,
	"aoColumns": [
	{ "mclass":"wall", "mData": "0", "mRender": function ( data, type, full ) {
		
		
		
		//$aColumns = array('date','invoice','status','total','nama_penerima','telepon_penerima','id');
		date = full[0]
		invoice = full[1]
		status_p = full[2]
		total = full[3]
		nama_penerima= full[4]
		telepon_penerima = full[5]
		id = full[6]
		keterangan = 'Penerima : '+nama_penerima + ' ('+telepon_penerima+')'
		
		
		bayar = "";
		if(status_p == "Menunggu Pembayaran"){
			status_p = '<span class="text-danger">'+status_p+'</span>';
			bayar = '<span class="btn btn-primary fs-11 btn-sm"> Bayar Sekarang </span> ';
		} 
		
		 
		div = '';
		div += '<a class="pemasukan_card" data_page="new_invoice" data_id_invoice="'+id+'" > <small class="small"> <i class="fa fa-calendar-alt mr-2">  </i>'+date+'</small> ';
		div += '<p class="mb-0 fs-14 pemasukan_card_invoice"> <b> '+(invoice)+' - '+status_p+' </b> </p> ';
		div += '<p class="mb-0 fs-14 pemasukan_card_total"><b>Rp. '+uang(total)+'</b> '+bayar+' </p> ';
		div += '<p class="fs-13 mb-0 pemasukan_card_keterangan"> '+keterangan+' </p></a> ';
		return div ;
		
	}}
		
	]
} );
} 








if($('#tb_withdraw')){	
var id_user = $('#tb_withdraw').attr('data_id_user');
var tablex = $('#tb_withdraw').dataTable( {
	"bProcessing": true,
	"bServerSide": true,  
	"order" : [[0 , 'desc']],
	"ajax" : { 
		url:  site+"server/withdraw.php?id_user="+id_user, 
		type:"POST"
	} ,
	"aoColumns": [
	{ "mclass":"wall", "mData": "0", "mRender": function ( data, type, full ) {
		 
		
		
		//$aColumns = array('date','status','total','bank_jenis','bank_rekening','bank_nama','id');

		date = full[0]; 
		status_wd = full[1]; 
		total = full[2]; 
		bank_jenis = full[3]; 
		bank_rekening = full[4]; 
		bank_nama = full[5]; 
		id= full[6]; 
		
		 
		if(status_wd == "Dalam Antrian"){
			status_wd = '<span class="text-danger"> '+status_wd+'</span> ';
		} else {
			status_wd = '<span class="text-primary"> '+status_wd+'</span> ';
		}
		 
		div = '';
		div += '<a class="pemasukan_card"> <small class="small"> <i class="fa fa-calendar-alt mr-2">  </i>'+date+' - '+status_wd+'</small> ';
		div += '<p class="mb-0 fs-14 pemasukan_card_total"><b>Rp. '+uang(total)+'</b> </p> ';
		div += '<p class="fs-13 mb-0 pemasukan_card_keterangan"> '+bank_jenis+' <br />'+bank_rekening+' ('+bank_nama+')  </p></a> ';
		return div ;
		
	}}
		
	]
} );
} 


if($('#tb_withdraw_bonus')){	
var id_user = $('#tb_withdraw_bonus').attr('data_id_user');
var tablex = $('#tb_withdraw_bonus').dataTable( {
	"bProcessing": true,
	"bServerSide": true,  
	"order" : [[0 , 'desc']],
	"ajax" : { 
		url:  site+"server/withdraw_bonus.php?id_user="+id_user, 
		type:"POST"
	} ,
	"aoColumns": [
	{ "mclass":"wall", "mData": "0", "mRender": function ( data, type, full ) {
		 
		
		//$aColumns = array('date','status','total','bank_jenis','bank_rekening','bank_nama','text','alamat_lengkap','jenis_bonus','id');


		date = full[0]; 
		status_wd = full[1];  
		bank_jenis = full[2]; 
		bank_rekening = full[3]; 
		bank_nama = full[4]; 
		deskripsi = full[5]; 
		alamat_lengkap = full[6]; 
		jenis_bonus= full[7]; 
		id= full[8]; 
		
		 
		if(status_wd == "Sedang Di Proses"){
			status_wd = '<span class="text-danger"> '+status_wd+'</span> ';
		} else {
			status_wd = '<span class="text-primary"> '+status_wd+'</span> ';
		}
		
		
		div = '';
		div += '<a class="pemasukan_card"> <small class="small"> <i class="fa fa-calendar-alt mr-2">  </i>'+date+' - '+status_wd+' - <b> '+jenis_bonus+' </b></small> ';
		div += '<p class="mb-0 fs-14 "><b>'+(deskripsi)+'</b> </p> ';
		div += '<p class="fs-13 mb-0 pemasukan_card_keterangan"> '+bank_jenis+' <br />'+bank_rekening+' ('+bank_nama+')  <br /> '+alamat_lengkap+' </p></a> ';
		return div ;
		
	}}
		
	]
} );
} 




}

