<div class="padding pb-3" id="cart_product_all">
	<?php 
$reseller = "No";
if(!empty($login)){
	if($user->reseller == "Yes"){
		$reseller = "Yes";
	}  
} 

$total_weight = 0 ;


	$table = "cart_view";
	$sql = "kode_user='$kode_user' or id_user='$id_user' ";
	$row = $this->model->row($table,$sql);
	$total = 0; 
		if($row >= 1){
			$data_list = $this->model->get_obj($table,$sql);
			foreach($data_list as $cart){
			
			$total_weight += ($cart->berat * $cart->qty);  
			
			$qty = $cart->qty;	
			if($reseller <> "Yes"){
						
					
					$harga = $cart->price;
					$harga_promo = 0 ;
					
					if($cart->cut_discount >= 1){
						$harga_promo = $cart->price - $cart->cut_discount ;
					}  
					
					$sub_totalx = $qty * $cart->price;

					$potongan = 0 ;
					$discount = 0 ;
					if($cart->cut_discount >=1 ){
						$potongan = $cart->cut_discount ;
					}

					if(($cart->max_discount_day >= 1) and ($cart->max_discount_day < 99)){
						$discount_day = $cart->max_discount_day;
						if($discount_day >= $qty){
							$discount_day = $qty;
						} 
					} else if($cart->max_discount_day >= 99){
						$discount_day = $qty;
					} 

					if(($potongan >= 1) and ($discount_day >= 1)){
						$discount = $potongan * $discount_day;
					} 
					
					$sub_total = $sub_totalx - $discount;
			
			} else {
				$harga = $cart->price_reseller;
				$price = $cart->price_reseller;
				$sub_total = $price * $qty; 
				$discount = 0;
			}
			

			$total += $sub_total;
			$sub_total = "Rp. ".uang($sub_total);
			
			
			
			?> 
			
	<div class="cart-item" id="box_cart_<?php echo($cart->id_varian) ;  ?>">
		<div class="cart-block"><strong><?php echo($cart->title) ;  ?></strong>
		<span><?php echo($cart->title_pack) ;  ?></span>
		
		
		<?php if($reseller <> 'Yes'){?> 
		<span class="fst-italic mt-2"><?php if($harga_promo >= 1){?> Harga Promo : <strong>Rp <?php echo uang($harga_promo) ;  ?></strong> ,  <?php }  ?>
		Harga Normal : <strong><?php echo(uang($harga)) ;  ?></strong><br></span>
		<?php } else {?> 
		<span class="fst-italic mt-2"> Harga Reseller : <strong><?php echo(uang($harga)) ;  ?></strong><br></span>
		<?php }  ?>
		
		
		<?php if($reseller <> 'Yes'){?> 
		<?php if(($cart->max_discount_day >= 1) and ($cart->max_discount_day < 99)){?> 
		<span class="fst-italic fs-10"><strong>Promo maks <?php echo($cart->max_discount_day) ;  ?> per hari</strong></span> 
		<?php }
		if($cart->max_discount_day >= 99){?> 
		<span class="fst-italic fs-10"><strong>Harga Promo Aktif Tanpa Batasan Belanja</strong></span> 
		<?php }  ?>
		<?php } ?>
		</div>
		
		
		<div class="cart-item-flex pt-2">
		<div class="w-100-100"><small class="d-block">Sub Total&nbsp;</small>
		<span class="fs-14"><strong id="total_<?php echo($cart->id_varian) ;  ?>"><?php echo($sub_total) ;  ?></strong></span></div>			
		<div id="update_<?php echo($cart->id_varian) ;  ?>" class="card-product-button-incart w-100p">
			<button class="btn btn-minus" onclick="minus_cart('<?php echo($cart->id_varian) ;  ?>')"  type="button"><i class="fas fa-minus"></i></button>
			<strong class="card-product-in-cart" id="update_val_<?php echo($cart->id_varian) ;  ?>" ><?php echo($cart->qty) ;  ?></strong>
			<button class="btn btn-plus" onclick="plus_cart('<?php echo($cart->id_varian) ;  ?>')" type="button"><i class="fas fa-plus"></i></button>
		</div>
		</div>
	<hr>
	</div>
	


<?php 	 
}
} 
?> 

	<div class="cart-item-flex pt-2"><small class="d-block">Total Belanja</small>
	<span class="fs-14"><strong id="cart_total">Rp. <?php echo(uang($total)) ;  ?></strong></span></div>
	
	<input type="hidden" class="form-control" name="total" value="<?php echo($total) ;  ?>" placeholder=""    />
</div>

