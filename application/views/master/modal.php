<script>
function showdel(id,nama){
 $('#del_id').val(id);
 $('#del_name').val(nama);
 
 $('#modal_delete').modal('show'); 
}
function cancel_delete(){ $('#modal_delete').modal('hide'); }
</script>

<div class="modal fade" id="modal_delete" role="dialog" style="display: none; margin-top:0px;">
 <div class="modal-dialog"style="border-radius:0px !Important ">
	 <div class="modal-content"style="border-radius:0px !Important ">
		 <div class="modal-header" style="border-radius:0px !Important ">
			 <span class="modal-title">Apakah Anda Yakin Ingin Menghapus Data Ini</span>
			 <button type="button" class="close" data-dismiss="modal">x</button>
		 </div>
		 <div class="modal-body">
		 <form method="post" enctype="multipart/form-data"> 
			<span> Your Data </span> 
			<input type="hidden" required class="form-control" id="del_id" name="id" value="" placeholder=""    />
			<input type="text" required disabled class="form-control" id="del_name" name="data" value="" placeholder="Your Data "    />
			<br />
			<button type="submit" name="delete" class="btn btn-primary" >Hapus Data</button> 
		 </form>
		 </div> 
	 </div>
 </div>
</div>




<script>
function showconf(id,nama){
 $('#conf_id').val(id);
 $('#conf_name').val(nama);
 
 $('#modal_conf').modal('show'); 
}
function cancel_conf(){ $('#modal_conf').modal('hide'); }
</script>

<div class="modal fade" id="modal_conf" role="dialog" style="display: none; margin-top:0px;">
 <div class="modal-dialog"style="border-radius:0px !Important ">
	 <div class="modal-content"style="border-radius:0px !Important ">
		 <div class="modal-header" style="border-radius:0px !Important ">
			 <span class="modal-title">Anda Yakin Ingin Konfirmasi Data Ini</span>
			 <button type="button" class="close" data-dismiss="modal">x</button>
		 </div>
		 <div class="modal-body">
		 <form method="post" enctype="multipart/form-data"> 
			<span> Your Data </span> 
			<input type="hidden" required class="form-control" id="conf_id" name="id" value="" placeholder=""    />
			<input type="text" required disabled class="form-control" id="conf_name" name="data" value="" placeholder="Your Data "    />
			<br />
			<button type="submit" name="konfirmasi" class="btn btn-primary" >Konfirmasi</button> 
		 </form>
		 </div> 
	 </div>
 </div>
</div>




<script>
function showimg(src){
 $('#imgs').attr('src',src);
 $('#hr').attr('href',src);
 $('#modal_img').modal('show'); 
 
}
</script>

<div class="modal fade" id="modal_img" role="dialog" style="display: none; margin-top:0px;">
 <div class="modal-dialog">
	 <div class="modal-content">
		 <div class="modal-header">
			 <span class="modal-title">Image Preview </span>
			 <button type="button" class="close" data-dismiss="modal">x</button>
		 </div>
		 <div class="modal-body" id="isi_img">
			<img src="" id="imgs" class="img-thumbnail" style="width : 100%;" />
		</div>
	 </div>
 </div>
</div>

