<?php 
class Lands{
	
	public function currency($country)
	{
		switch ($country) {
		case 'UA': 	$currency='UAH';	break;
		case 'RU': 	$currency='RUB';	break;
		case 'BY': 	$currency='BYN';	break;
		case 'KZ': 	$currency='KZT';	break;
		
		default: { $currency='RUB';	}
		}
		return $currency;
	}
	
	
	
	
	
	
	public function head($head_index64)
	{
		
		?>
		<!-- Head Index -->
		<?php echo(base64_decode($head_index64)); ?>
		<!-- /Head Index -->
		<?php
	}
	
	public function body($body_index64)
	{
		?>
		
		
		<!-- Body Index -->
		<?php  echo(base64_decode($body_index64)); ?>
		<!-- /Body Index -->
		<?php
	}
	
	
	
	public function form($formname)
	{
		echo('<input type="hidden" name="formname" value="'.$formname.'">');
		
	}
	
	
	
	
    
	
	
	public function footer($body2_index64, $polit="", $mask_phone='-')
	{
		?>
		<!-- Footer index -->
		<?php  if ($mask_phone!="-"){ ?><link rel="preload" href="config/js/jquery.maskedinput.js" as="script"><script src="config/js/jquery.maskedinput.js"></script><script src="config/js/mask<?php echo  $mask_phone ?>.js"></script><? } ?><script src="config/js/conf.js"></script><link rel="stylesheet" href="config/css/conf.css">
		
	
<div class="hidden-conf">
            <div class="conf-overlay close-conf"></div>
            <div class="conf-info">
                <div class="conf-head">Политика конфиденциальности</div>
				<?php echo  $polit ?>
				<div class="close-conf closeconf-but"></div>
            </div>
        </div>
		<!-- Body Index2 -->
<?php echo(base64_decode($body2_index64)); ?>
		<!-- Конфигуратор Версия 2.4, http://config-v2.github.io -->
		<?php 
	}
	
	public function politics($color=""){
	
	?>
		
		
	  <div style="text-align: center;<?php  if ($color!='') echo ("color: {$color};");?>;">
	  <div class="confident-link">Политика конфиденциальности</div></div>




		
	<?php 	
		
	}
	public function link_phone($phone, $class="")
	{
		if ($class!="") $classinc='class="'.$class.'"'; 
		echo('<a '.$classinc.' href="tel:'.preg_replace('![^0-9]+!', '', $phone).'">'.$phone."</a>");
	}
	
	public function link_email($contact_email,$class="")
	{
		if ($class!="") $classinc='class="'.$class.'"';
		echo('<a '.$classinc.' href="mailto:'.$contact_email.'">'.$contact_email."</a>");
	}
	
	public function seller($color=''){
		if (file_exists("config/data/value.php")) include("config/data/value.php"); ?>
		<address style="text-align: center;<?php  if ($color!='') echo ("color: {$color};");?>">   
		<?php  	if ($seller!="") echo ("<strong>{$seller}</strong>"); 
			if ($seller_adress!="") echo ("<br>".$seller_adress); 
			if ($contact_phone1!="") { echo('<br>'); lands::link_phone($contact_phone1); } 
			if ($contact_phone2!="") { echo('&nbsp;|&nbsp;'); lands::link_phone($contact_phone2); } 
			if ($contact_phone3!="") { echo('&nbsp;|&nbsp;'); lands::link_phone($contact_phone3); } 
			if ($contact_email!="")  { echo('<br>'); lands::link_email($contact_email); } 
		?>
		</address>
	
			
<?php  }

	

 } ?>