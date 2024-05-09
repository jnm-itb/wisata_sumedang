<script>
function showdel(id,nama){
 $('#del_id').val(id);
 $('#del_name').val(nama);
 
 $('#modal_delete').modal('show'); 
}
function cancel_delete(){ $('#modal_delete').modal('hide'); }
</script>

<div class="modal fade"  style="z-index:9999!important;"  id="modal_delete" role="dialog" style="display: none; margin-top:0px;">
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
			<input type="text" required class="form-control" id="del_name" name="data" value="" placeholder="Your Data "    />
			<br />
			<button type="submit" name="delete" class="btn btn-primary" >Hapus Data</button> 
		 </form>
		 </div> 
	 </div>
 </div>
</div>


