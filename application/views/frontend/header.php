
<nav class="navbar navbar-dark navbar-expand-md fixed-top">
<div class="container"><a class="navbar-brand" href="<?php echo($site) ?>"><img src="<?php echo($site) ?>/image/<?php echo($settings->logo) ;  ?>"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
	<div class="collapse navbar-collapse" id="navcol-1">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item"><a class="nav-link active" href="<?php echo($site) ?>">Homepage</a></li>
			<li class="nav-item"><a class="nav-link active" href="<?php echo($site) ?>page/features">Features</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo($site) ?>page/faq">FAQ</a></li>
			
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Pages
			</a>
			<div class="dropdown-menu  dropdown-menu-right"  style="margin-top: 10px"  aria-labelledby="navbarDropdown">
			<?php $table = "page";
			$sql = "`id`<>-1";
			$row = $this->model->row($table,$sql);
			if($row >= 1){
				$dd = $this->model->get_obj($table,$sql);
				foreach($dd as $data){
					?> 
					
				<a class="dropdown-item" href="<?php echo($site) ?>page/static/<?php echo title($data->title) ;  ?>"><?php echo($data->title) ;  ?></a>
			 
					<?php 
				}
			} 
			 ?>
			</div>
			</li>


			<?php if(empty($user)){?>  
			<li class="nav-item"><a class="nav-link btn btn-outline-light btn-sm" href="<?php echo($site) ?>page/login">Sign In</a></li>
			<li class="nav-item"><a class="nav-link btn btn-light btn-sm text-black" href="<?php echo($site) ?>page/register">Sign Up</a></li>
			<?php } else { ?> 
			<li class="nav-item"><a class="nav-link btn btn-light btn-sm text-black ml-md-3" href="<?php echo($site) ?>dashboard">Dashboard</a></li> 
			<li class="nav-item"><a class="nav-link btn btn-light btn-sm text-black" href="<?php echo($site) ?>page/logout">Keluar</a></li> 
			<?php } ?>
			
		</ul>
	</div>
</div>
</nav>