<script>
function show_alert(alert,message){
$('#alert').removeClass('alert-danger');
$('#alert').removeClass('alert-primary');
$('#alert').removeClass('alert-success');
$('#alert').removeClass('bg-danger');
$('#alert').removeClass('bg-primary');
$('#alert').removeClass('bg-info');
$('#alert').removeClass('bg-success');
$('#alert').removeClass('alert-info');


$('#alert_data').html(message);
$('#alert').addClass("alert-"+alert);
$('#alert').addClass("bg-"+alert);
$('#alert').removeClass('d-none');
$('#alert').show();
}




function showdel(id,nama){ 
 $('#del_name').val(nama); 
 $('#del_id').val(id); 
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
		 <form method="post"  enctype="multipart/form-data"> 
			<span> Data  </span> 
			<input type="hidden" required class="form-control" id="del_table" name="table" value="" placeholder=""    />
			<input type="hidden" required class="form-control" id="del_id" name="id" value="" placeholder=""    />
			<textarea readonly type="text" required class="form-control" id="del_name" name="data" value="" placeholder="Your Data "    ></textarea>
			<br />
			<button type="submit" name="delete" class="btn btn-primary" >Hapus Sekarang</button> 
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
			 <span class="modal-title">Apakah Anda Yakin Ingin Konfirmasi Data Ini</span>
			 <button type="button" class="close" data-dismiss="modal">x</button>
		 </div>
		 <div class="modal-body">
		 <form method="post"   enctype="multipart/form-data"> 
			<span> Data </span> 
			<input type="hidden" required class="form-control" id="conf_id" name="id" value="" placeholder=""    />
			<textarea readonly type="text" required class="form-control" id="conf_name" name="data" value="" placeholder="Your Data "   ></textarea>
			<br />
			<button type="submit" name="konfirmasi" class="btn btn-primary" >Konfirmasi</button> 
		 </form>
		 </div> 
	 </div>
 </div>
</div>

<script>
function showconf2(id,nama){
 $('#conf_id2').val(id);
 $('#conf_name2').val(nama); 
 $('#modal_conf2').modal('show'); 
}
function cancel_conf(){ $('#modal_conf2').modal('hide'); }
</script>

<div class="modal fade" id="modal_conf2" role="dialog" style="display: none; margin-top:0px;">
 <div class="modal-dialog"style="border-radius:0px !Important ">
	 <div class="modal-content"style="border-radius:0px !Important ">
		 <div class="modal-header" style="border-radius:0px !Important ">
			 <span class="modal-title">Apakah Anda Yakin Ingin Konfirmasi Data Ini</span>
			 <button type="button" class="close" data-dismiss="modal">x</button>
		 </div>
		 <div class="modal-body">
		 <form method="post"   enctype="multipart/form-data"> 
			<span> Data </span> 
			<input type="hidden" required class="form-control" id="conf_id2" name="id" value="" placeholder=""    />
			<textarea readonly type="text" required class="form-control" id="conf_name2" name="data" value="" placeholder="Your Data "   ></textarea>
			<br />
			<button type="submit" name="konfirmasi2" class="btn btn-primary" >Konfirmasi</button> 
		 </form>
		 </div> 
	 </div>
 </div>
</div>



<script>
function showrej(id,nama){
 $('#reject_id').val(id);
 $('#reject_name').val(nama);
 
 $('#modal_reject').modal('show'); 
}
function cancel_delete(){ $('#modal_reject').modal('hide'); }
</script>

<div class="modal fade" id="modal_reject" role="dialog" style="display: none; margin-top:0px;">
 <div class="modal-dialog"style="border-radius:0px !Important ">
	 <div class="modal-content"style="border-radius:0px !Important ">
		 <div class="modal-header" style="border-radius:0px !Important ">
			 <span class="modal-title">Anda Yakin ingin menolak data ini</span>
			 <button type="button" class="close" data-dismiss="modal">x</button>
		 </div>
		 <div class="modal-body">
		 <form method="post" enctype="multipart/form-data"> 
			<span> Data </span> 
			<input type="hidden" required class="form-control" id="reject_id" name="id" value="" placeholder=""    />
			<textarea type="text" readonly required class="form-control" id="reject_name" name="data" value="" placeholder="Your Data "    ></textarea>
			<br /> 
			<button type="submit" name="reject" class="btn btn-primary" >Tolak / Reject</button> 
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



<script>
function showdel2(id,nama){
 $('#modal_delete2').modal('show'); 
}
</script>

<div class="modal fade" id="modal_delete2" role="dialog" style="display: none; margin-top:0px;">
 <div class="modal-dialog"style="border-radius:0px !Important ">
	 <div class="modal-content"style="border-radius:0px !Important ">
		 <div class="modal-header" style="border-radius:0px !Important ">
			 <span class="modal-title">Are You sure delete all question </span>
			 <button type="button" class="close" data-dismiss="modal">x</button>
		 </div>
		 <div class="modal-body">
		 <form method="post" enctype="multipart/form-data"> 
			
			<p> If you delete all question , system automatic delete all answer/survey from users</p> 
			<br />
			<input id="c1" type="checkbox" required class="" name="delete" value="" placeholder=""    />
			<label for="c1"> Confirm and delete</label> 
			<br />
			<br />
			<button type="submit" name="delete" class="btn btn-primary" >Delete This Data</button> 
		 </form>
		 </div> 
	 </div>
 </div>
</div>

 <script>  
function filters(data){ 
	data = data.toLowerCase();
	data = data.replace(/  /g,' '); 
	data = data.replace(/ /g,'-'); 
	data = data.replace(/#/g,'-');  
	data = data.replace(/&/g,'-and-');  
	data = data.replace(/--/g,'-');  
	data = data.replace(/--/g,'-');  
	data = data.replace(/\//g,'');   
	data = data.replace(/\\/g,'');   
	data = escape(data); 
	
	data = "ltrings" +data+'rtrings'; 
	data = data.replace(/ltrings-/g,'');  
	data = data.replace(/-rtrings/g,'');  
	data = data.replace(/rtrings/g,'');  
	data = data.replace(/ltrings/g,'');  
	
	return data; 
}






	
function uang(nums) {
var vals = nums;
vals = String(vals);

if (vals == null){
	vals = "0";
}
    vals = vals.replace(/,/g, "");
    vals += '';
    x = vals.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';

    var rgx = /(\d+)(\d{3})/;

    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }

	xx = x1 + x2;
	
if (xx == "0"){
	xx = "0";
}
	
    return xx;


}







function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}


function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}



function numbers(inputString){
    var regex=/\d+\.\,\d+|\.\d+|\d+/g, 
        results = "",
        n;
    while(n = regex.exec(inputString)) {
        results += n[0];
    }
    return results;
}


$('.currency').keyup(function(event){
	v = $(this).val();
	v = numbers(v);
	u = uang(v+'');
	$(this).val(u);
})
  </script> 