<?php 
	$title = str_replace('.',' ',$data->title);
	$title = str_replace($data->type,' ',$title);
			
	$image = "user.jpg";
	$name = "Anonymous";
	$bio = "Anonymous is a mysterious person ";
	
	if(!empty($user)){
		$image = $user->image;
		$name = $user->name;
		$bio = $user->bio;
	} 
	
	$waktumulai  =  date('Y-m-d H:i:s'); 
	$expired =  date ( 'Y-m-d H:i:s' , strtotime ( '+1 hour' , strtotime ( $waktumulai ))); 
	$expired = strtotime($expired);
?>  

<div class="h-100 w-100"  style="background: #001527;overflow:hidden;  " >
	<div class=""  style="padding-top:80px; padding-bottom:50px; width : 100%; height: 100%; overflow:auto" >
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 ">
				<div class="text-light">
				<h4 class="mb-0"> Watch <?php echo($title) ;  ?></h4> 
				<p class=""> Upload At <?php echo(date_format( date_create($data->date) , 'd M Y h:i:s' )) ;  ?>, Total Watch : <?php echo($data->watch) ;  ?>x, Total Download : <?php echo($data->download) ;  ?>x </p> 
				</div>			
			</div>
			
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-12  "> 
				<video id="player" class="w-100" src="<?php echo($site) ?><?php echo($data->filename) ;  ?>"></video> 
			</div>
			
			
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 ">
			<div class="text-light pt-5 pb-5"  style="background: rgba(0,0,0,0.3); padding:1rem; border-radius:10px "  align="center">
				<img src="<?php echo($site) ?>images/crop/100/100/<?php echo($image) ;  ?>"  style="border-radius:100%;  " />
				<p class="mb-0">Upload By <?php echo($name) ;  ?></p> 
				<p class="fs-12"> <?php echo($bio) ;  ?></p> 
				
				<div class="btn-group">
					<a class="btn btn-light btn-sm" href="<?php echo($site) ?>download/<?php echo base64_encode(base64_encode($data->id)) ;  ?>/?v=<?php echo base64_encode(base64_encode($expired)) ;  ?>" > Download </a> 				
					<a class="btn btn-primary btn-sm" onclick="$('#embed').slideToggle('slow');" style="border-top-right-radius:5px; border-bottom-right-radius:5px;"  > Embed Video</a>		
					<div class="ml-1"><div class="sharethis-inline-share-buttons"></div> </div>
				</div> 
			</div>
			
			<div class="bg-white p-3" id="embed"  style="display:none;" >
				<h5> Embed Code For HTML </h5> 
				<code> 
					<?php echo(htmlentities('<video width="100%" height="auto" controls > <source src="'.$site.$data->filename.'" type="video/'.$data->type.'"></source> </video>')) ;  ?>
				</code> 
			</div>
			
			</div>
		
		</div>
		</div>
	</div>
	
	
	
	

</div>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=662db0f2529556001975b06f&product=inline-share-buttons' async='async'></script>


<link href="https://cdn.jsdelivr.net/npm/vlitejs@6/dist/vlite.css" rel="stylesheet" crossorigin />
<script type="module">
  import Vlitejs from 'https://cdn.jsdelivr.net/npm/vlitejs@6';
  
  new Vlitejs('#player', {
  options: {
	  poster : '<?php echo($site) ?>image/<?php echo($data->image) ;  ?>',
  },
  onReady: function (player) {}, 
  provider: 'html5',
  plugins: []
});

</script>


