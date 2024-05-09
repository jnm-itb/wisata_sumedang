$(document).ready(function() {
	
	var h = $('header').height() ;
	var px = h+'px!important;';
	
	$('.section-mobile').attr('style' , 'padding-top: '+px+';');
	$('header').addClass('fixed');
	
	
}); 

/* 

$("a[href]").not('.noevent').click(function(event) {      
event.preventDefault();     
var url = "";
var url = $(this).attr('href'); 
window.history.pushState({},null, url);
});
 */

function check_phone_login(){
phone = String($('#phone').val());
len = phone.length;

phone2 = "#"+phone;
pos = phone2.indexOf("08");

if(pos >= 1){
if(len >= 10){
	var url = "./login-phone/"+$('#phone').val();
	window.history.pushState({},null, url);		
} else {
	show_alert('Nomor Telepon yang Anda masukkan sepertinya tidak valid , Periksa Kembali ', 'danger');
}
} else {
	show_alert('Nomor Telepon Wajib Diawali <b>08</b> ', 'danger');
}
}




function get_html(url){
$.ajax({
  type: "POST",
  url: url, 
  cache: true,
  data: {}, 
  success: function(htmlx){ 
	
	
	$('body').html(htmlx);
	tt = $(htmlx).filter('meta[name="title"]').attr("content");
	window.history.pushState({},null, url);
	document.title = tt;  
  
  }
});
}






var old = window.location.href; 

$(document).ready(function() {
	
    var pushState = history.pushState;
    var replaceState = history.replaceState;

    history.pushState = function() {
        pushState.apply(history, arguments);
        window.dispatchEvent(new Event('pushstate'));
        window.dispatchEvent(new Event('locationchange'));
    };

    history.replaceState = function() {
        replaceState.apply(history, arguments); 
        window.dispatchEvent(new Event('replacestate'));
        window.dispatchEvent(new Event('locationchange'));
    };

    window.addEventListener('popstate', function() {
        if(old !== window.location.href){
		old = window.location.href;
		get_html(old);
		}  
    }); 

	window.addEventListener('locationchange', function(event){ 
		if(old !== window.location.href){
		old = window.location.href;
		get_html(old);
		} 
	})


});  




function close_alert(){
	$('.alert').remove();
}


function show_alert(message_alert , alert_type){
	$('#section-mobile').append('<div class="alert alert-fixed alert-'+alert_type+' border-0 alert-dismissable"> <div class="relative w-100 d-flex card-flex"> <div class="w-100-30" id="alert-respon"> '+message_alert+' </div>  <a class="close w-30p" onclick="close_alert()">x</a> </div> </div>  ');
}

 