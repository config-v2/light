<?php 
if (file_exists('../index.php')) {
require_once('data/data.php');
if ($product=='') {
	$site=file_get_contents('../index.php');
 if (preg_match("~<title>(.*?)</title>~iu", $site, $out)) {$product = $out[1];}
}

if ($desc=='') {
	$tags = get_meta_tags('../index.php');
	$desc=$tags['description'];
} } else {?>
    <div class="alert alert-danger alert-dismissable text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link "></a><strong>Очевидно Вы забыли переименовать INDEX.HTML в INDEX.PHP</strong><br>Это необходимо исправить, иначе конфигуратор не будет работать<br>После исправления обновите страницу</div>
	<script> $('document').ready(function() {$('.btn-primary').prop('disabled',true).prop('title','Переименуйте Index.html в index.php').attr('value','Сохранение не возможно');});</script><?php  } ?>


	<form id="form_conf" class="form-horizontal" action="options/config_save.php" enctype="multipart/form-data"  role="form" method="POST" >
	<div id="product_group" class="form-group">
		<label class="col-sm-3 control-label">Название продукта <em>*</em></label>
	   <div class="col-sm-9">
		<input class="form-control" required id="product" type="text" name="product" value="<?php echo  $product; ?>" placeholder="Название продукта">
		<span class="help-block">Название продукта, которое будет отображаться в заявках</span>
</div>
</div>
<div id="logs_group" class="form-group">
		<label class="col-sm-3 control-label">Журнал заказов <em>*</em></label>
	   <div class="col-sm-9">
	   <select required class="form-control" name="logs" id="logs" onchange="log_func(this.value)">
	   <?php  if (!$logs!='') { ?>
	   <option selected disabled value="">Укажите, хотите ли Вы сохранять информацию о заказах в <?php echo  $config['name'] ?>е.</option> <?php  } ?>
	   <option <?php  if ($logs=='1') echo ('selected') ?> value="1">Включено</option>
	   <option <?php  if ($logs=='0') echo ('selected') ?> value="0">Выключено</option>
	   </select>
	<span class="help-block">Обратите внимание, что сохранение заявок влечет за собой увеличение занимаемого лендингом объема.<br>Поэтому не забывайте удалять старые журналы заказов.</span>
</div>
</div>
	<div class="panel-group" id="accordion">
	<!--
 <div class="panel panel-default">
  <div class="panel-heading">
   <h4 class="panel-title"><i class="fa fa-picture-o"></i>&#160;
       <a data-toggle="collapse" data-parent="#accordion" href="#og_block">OpenGraph теги:</a>&#160;<i class="fa fa-caret-down" aria-hidden="true"></i><span id="og" class="panel-heading-info hidden"><small>Есть не заполненные поля!</small></span>
      </h4>
			
  </div>
  <div id="og_block" class="panel-collapse collapse">
   <div class="panel-body">
    <fieldset>
	<legend><small>Информация для анонса страницы, при размещении ссылки в социальных сетях и мессенджерах</small></legend>
			<div class="form-group">
	  <label class="col-sm-3 control-label">Активность: </label>
	   <div class="col-sm-9">
     <select id="og_tag" name="og_tag" class="form-control" onchange="og(); return true;" >
		 
			<option <?php  if ($og_tag == "1") echo("selected");?> value="1">Включено</option>
			<option <?php  if ($og_tag != "1") echo("selected");?> value="0">Выключено</option>
		 
		</select><span class="help-block">Включать или не включать OpenGraph теги</span>
		</div>
		</div>
		<div id="og_inp" <?php  if ($og_tag!='1') echo('class="hidden"'); ?>>
		<div id="og_title_group" class="form-group">
		<label class="col-sm-3 control-label">Название: <em>*</em></label>
	   <div class="col-sm-9">
		<input group="og" class="form-control" required id="og_title" type="text" name="og_title" value="<?php  if ($og_title!="") echo $og_title; else echo $product; ?>" <?php  if ($og_tag!="1") echo ('disabled');  ?> placeholder="Название продукта">
		<span class="help-block">Название, которое отобразится в анонсе</span>
</div>
</div>

<div  id="og_desc_group" class="form-group">
		<label class="col-sm-3 control-label">Описание: <em>*</em></label>
	   <div class="col-sm-9">
		<input group="og" class="form-control" <?php  if ($og_tag!="1") echo ('disabled');  ?> required id="og_desc" type="text" name="og_desc" value="<?php  if ($og_desc!="") echo $og_desc; else echo $desc; ?>" placeholder="Описание продукта">
		<span class="help-block">Описание, которое отобразится в анонсе</span>
</div>
</div>

<div id="og_pic_group" class="form-group">
		<label  class="col-sm-3 control-label">Картинка: <em>*</em></label>
	   <div class="col-sm-9">
		<input class="form-control <?php  if ($og_pic!="") echo('hidden'); ?>" <?php  if (($og_tag!="1") OR ($og_pic!="")) echo('disabled'); ?>  group="og" class="form-control" required type="file" id="og_pic" name="og_pic" accept="image/*" placeholder="Картинка">
		<?php  if ($og_pic!="") {echo ("<p id=\"og_pic_p\" "); if ($og_tag!='1') echo ("disabled"); echo(">Выбранная картинка:<br><img width=\"100\" src=\"../{$og_pic}\"></p>\n<input id=\"ogph\" type=\"hidden\" name=\"og_pic\" value=\"{$og_pic}\"><br>" );
echo('<span id="on_og_pic" onclick="ogpicscr(); return false;" class="btn btn-default">Заменить картинку</span>');
		} ?><span class="help-block">Картинка, которая отобразится в анонсе</span>
</div>
</div> 
</div>
	<div class="form-group text-center">
		<input type="submit"  value="Сохранить" class="btn btn-primary">
	</div>
		</fieldset>
   </div>
  </div>
 </div> -->
 
 
 
  <div class="panel panel-default">
  <div class="panel-heading">
   <h4 class="panel-title"><i class="fa fa-money"></i>&#160;
       <a data-toggle="collapse" data-parent="#accordion" href="#price_block">Ценообразование:</a>&#160;<i class="fa fa-caret-down" aria-hidden="true"></i><span id="price" class="panel-heading-info hidden"><small>Есть не заполненные поля!</small></span>
      </h4>
			
  </div>
  <div id="price_block" class="panel-collapse collapse">
   <div class="panel-body">
    <fieldset>
	<legend><small>Данные для ценообразования товара на одностраничнике</small></legend>
		<div id="valuta_group"  class="form-group">
	  <label class="col-sm-3 control-label">Валюта:  <em>*</em></label>
	   <div class="col-sm-9">
     <select group="price" id="valuta" name="valuta" required class="form-control" onchange="valuta_func(); return true;" >
	    <?php  if ($valuta=="") { ?> <option  selected disabled value="">Укажите валюту товара</option> <?php  } ?>
		 <?php  foreach($config['valuta'] as $key => $value) { ?>
			<option <?php  if ($valuta==$value) echo("selected")?> value="<?php echo  $value ?>"><?php echo  $value ?></option>
		 <?php  } ?>
		</select>
		</div>
		</div>
		
		<div id="price_new_group" class="form-group">
		<label class="col-sm-3 control-label">Новая цена: <em>*</em></label>
	   <div class="col-sm-9"><div class="input-group">
		<input group="price" class="form-control" required id="price_new" type="number" name="price_new" value="<?php echo  $price_new ?>" placeholder="Новая цена. Размещается во всех местах ленда">
		<span class="input-group-addon vlt"><?php  if ($valuta!="") echo $valuta; else echo ('<i class="fa fa-spinner fa-pulse fa-fw"></i>') ?></span>
</div>
</div>
</div>


		<div class="form-group">
	  	<label class="col-sm-3 control-label">Установка старой цены: </label>
		 <div class="col-sm-9">
		<select group="price" class="form-control" id="price_old_select" name="price_old_select" onchange="price(); return true;">
 
  <option <?php  if ($price_old_select == "1") echo("selected");?> value="1">Считать автоматически, по скидке</option>
  <option <?php  if ($price_old_select != "1") echo("selected");?> value="0">Задать старую цену вручную</option>
   </select>
</div>
		</div>
		
		
		<div id="skidka_group" class="form-group">
		<label class="col-sm-3 control-label">Скидка (%): </label>
		<div class="col-sm-9">
		<div class="input-group">
 		<input group="price" class="form-control" required id="skidka" type="number" min="1" max="99" name="skidka" <?php  if ($price_old_select!='1') echo('disabled') ?> value="<?php echo  $skidka ?>" placeholder="Скидка. Старая цена будет считаться автоматически">
		<span class="input-group-addon">%</span>
</div>
	</div></div>
	
	<div id="price_old_group" class="form-group">
		<label class="col-sm-3 control-label">Cтарая цена: <em>*</em></label>
	<div class="col-sm-9">
	<div class="input-group">
	<input group="price" class="form-control" required id="price_old" type="number" name="price_old" <?php  if ($price_old_select=='1') echo('disabled') ?> value="<?php echo  $price_old ?>" placeholder="Старая цена. Размещается во всех местах ленда">
	<span class="input-group-addon vlt"><?php  if ($valuta!="") echo $valuta; else echo ('<i class="fa fa-spinner fa-pulse fa-fw"></i>') ?></span>
</div>
</div></div> 

	<div class="form-group text-center">
		<input type="submit"  value="Сохранить" class="btn btn-primary">
	</div>
		</fieldset>
   </div>
  </div>
 </div>
 
 
 <div class="panel panel-default">
  <div class="panel-heading">
   <h4 class="panel-title"><i class="fa fa-map-marker"></i>&#160;
       <a data-toggle="collapse" data-parent="#accordion" href="#geo_block">Гео-локализация:</a>&#160;<i class="fa fa-caret-down" aria-hidden="true"></i>
	   <span id="geo" class="panel-heading-info hidden"><small>Есть не заполненные поля!</small></span>
      </h4>
  </div>
  <div id="geo_block" class="panel-collapse collapse">
   <div class="panel-body">
	  <fieldset>
<legend><small>Гео-локализация лендинга</small></legend>
		<div class="form-group">
	  	<label class="col-sm-3 control-label">Страна: </label>
		 <div class="col-sm-9">
     <select group="geo" id="country_script" name="country_script" class="form-control" >
		<option <?php  if (($country_script=="") OR ($country_script=="auto")) echo "selected"; ?> value="auto">Авто (по IP посетителя)</option>
		 <?php  foreach($config['geo'] as $key => $value) { ?>
		
		<option <?php  if ($country_script==$key) echo "selected" ?> value="<?php echo  $key ?>"><?php echo  $value ?></option>
		
		 <?php  } ?>
		</select>
		<span class="help-block">Страна гео-локализации посетителя</span>
		</div>
		</div>
		
		
		 <div class="form-group">
    <label for="timezone" class="col-sm-3 control-label">Часовой пояс<br><small>На этом компьютере определятся таймзона «<span id="tzs"></span>»</small></label>
    <div class="col-sm-9">
     
	  <select group="geo" class="form-control" name="timezone" id="timezone">
<?php  if ($timezone=='') $timezone=$config['timezone'];
 foreach($timezone_array as $key => $value)  if ($value['timezone']!='') { ?>	
  	  <option <?php  if ($value['timezone']==$timezone) echo ('selected') ?> value="<?php echo  $value['timezone'] ?>"><?php echo  $value['options'] ?></option>
<?php  } ?>
	  </select>
	  <span class="help-block">Необходимо для правильного отображение времени заказов, сделанных на лендинге</span>
    </div>
  </div>
		
		
	 
	  <div class="form-group">
	  	<label class="col-sm-3 control-label">Маска номера: </label>
		 <div class="col-sm-9">
     <select  group="geo" id="mask_phone" name="mask_phone" class="form-control" >
		 <option <?php  if ($mask_phone=='-') echo "selected" ?> value="-">Отключено</option>
		 <?php  foreach($config['mask'] as $key => $value) { ?>
		
		<option <?php  if ($mask_phone==$key) echo "selected" ?> value="<?php echo  $key ?>"><?php echo  $value ?></option>
		
		 <?php  } ?>
		</select>
		<span class="help-block">Маска для ввода номера пользователем</span>
		</div>
		</div>
		
		
		<div  id="send_group" class="form-group">
		<label class="col-sm-3 control-label">Доставка: </label>
	   <div class="col-sm-9">
	   <textarea group="geo" id="sending" class="form-control" name="sending_html"  cols="30" rows="3"><?php  if ($sending_html!="") echo htmlspecialchars_decode($sending_html); else echo($config['dop']['sending']) ?></textarea>
		<span class="help-block">Информации о способе доставки</span>
</div>
</div>
		
		
		
		<div class="form-group text-center">
		<input type="submit"  value="Сохранить" class="btn btn-primary">
	</div>
 </fieldset>
   </div>
  </div>
 </div>
 
 <div class="panel panel-default">
  <div class="panel-heading">
   <h4 class="panel-title"><i class="fa fa-code"></i>&#160;
       <a data-toggle="collapse" data-parent="#accordion" href="#code_block">
        Коды, пиксели, метрики:
       </a>&#160;<i class="fa fa-caret-down" aria-hidden="true"></i>
	   <span id="pixel" class="panel-heading-info hidden"><small>Есть не заполненные поля!</small></span>
      </h4>
  </div>
  <div id="code_block" class="panel-collapse collapse">
   <div class="panel-body">
    <fieldset>
	<legend><small>Дополнительные коды, пиксели, метрики, боты и пр.</small></legend>
	<div class="panel panel-default">
	 <div class="panel-heading">Дополнительные коды, устанавливаемые на <strong>ГЛАВНОЙ СТРАНИЦЕ (index.php)</strong></div>
  <div class="panel-body">
	  <div class="form-group">
	  	<label class="col-sm-3 control-label">Блок <strong>head</strong> для Index:</label><div class="col-sm-9"><textarea class="form-control" rows="5" id="head_index64" name="head_index64" cols="70"><?php echo  base64_decode($head_index64); ?></textarea> 
		<span class="help-block">Код для размещения на ГЛАВНОЙ СТРАНИЦЕ в тегах <code><strong>&#8249;head&#8250; Ваш код &#8249;&#47;head&#8250;</strong></code> индексной страницы. Здесь размещают пиксели Facebook и Вконтакте, Google-аналитику, дополнительные META-теги, ссылки на JS для аналитики и пр.</span>
		</div>
  </div>
  <div class="form-group">
		<label class="col-sm-3 control-label">Верхний блок <strong>body</strong> для Index:<br><small>Сразу после тега &#8249;body&#8250;</small>  </label><div class="col-sm-9"><textarea class="form-control" rows="5" id="body_index64" name="body_index64" cols="70"><?php echo  base64_decode($body_index64); ?></textarea> 
		<span class="help-block">Код для размещения на ГЛАВНОЙ СТРАНИЦЕ в тегах <code><strong>&#8249;body&#8250; Ваш код ....</strong></code> индексной страницы. Здесь можно разместить код счетчиков (Яндекс-метрики, Mail.Top)</span>
		</div>
  </div>
  
  <div class="form-group">
		<label class="col-sm-3 control-label">Нижний блок <strong>body</strong> для Index:<br><small>Перед тегом &#8249;&#47;body&#8250;</small>  </label><div class="col-sm-9"><textarea class="form-control" rows="5" id="body2_index64" name="body2_index64" cols="70"><?php echo  base64_decode($body2_index64); ?></textarea> 
		<span class="help-block">Код для размещения на ГЛАВНОЙ СТРАНИЦЕ в тегах <code><strong>..... Ваш код &#8249;&#47;body&#8250;</strong></code> индексной страницы. Здесь можно разместить код счетчиков (Яндекс-метрики, Mail.Top), мессенджеры, боты и пр.</span>
		</div>
  </div>
		
  </div>
  </div>
  <br>
  <div class="panel panel-default"><div class="panel-heading">Дополнительные коды, устанавливаемые на <strong>Страницe БЛАГОДАРНОСТИ (form-ok.php)</strong></div>
  <div class="panel-body">
		<div class="form-group">
	 	<label class="col-sm-3 control-label">Блок <strong>head</strong> для Thanks: </label><div class="col-sm-9"><textarea class="form-control" rows="5" id="head_thanks64" name="head_thanks64" cols="70"><?php echo  base64_decode($head_thanks64); ?></textarea> 
		<span class="help-block">Код для размещения на СТРАНИЦЕ "СПАСИБО" (form-ok.php) в тегах <code><strong>&#8249;head&#8250; Ваш код &#8249;&#47;head&#8250;</strong></code> страницы благодарности. Здесь размещают пиксели Facebook и Вконтакте, Google-аналитику, дополнительные META-теги, ссылки на JS для аналитики и пр.</span>
		</div>
  </div>
		<div class="form-group">
	 	<label class="col-sm-3 control-label">Верхний блок <strong>body</strong> для Thanks:<br><small>Сразу после тега &#8249;body&#8250;</small> </label><div class="col-sm-9"><textarea class="form-control" rows="5" id="body_thanks64" name="body_thanks64" cols="70"><?php echo  base64_decode($body_thanks64); ?></textarea> <span class="help-block">Код для для размещения на СТРАНИЦЕ "СПАСИБО" (form-ok.php) в тегах <code><strong>&#8249;body&#8250; Ваш код ....</strong></code> страницы благодарности. Здесь можно разместить код реагирование на совершение лида (покупка), счетчиков (Яндекс-метрики, Mail.Top)</span></div>
  </div>
  <div class="form-group">
	 	<label class="col-sm-3 control-label">Нижний блок <strong>body</strong> для Thanks:<br><small>Перед тегом &#8249;&#47;body&#8250;</small></label><div class="col-sm-9"><textarea class="form-control" rows="5" id="body2_thanks64" name="body2_thanks64" cols="70"><?php echo  base64_decode($body2_thanks64); ?></textarea> <span class="help-block">Код для для размещения на СТРАНИЦЕ "СПАСИБО" (form-ok.php) в тегах <code><strong>..... Ваш код &#8249;&#47;body&#8250;</strong></code> страницы благодарности. Здесь можно разместить код реагирование на совершение лида (покупка), счетчиков (Яндекс-метрики, Mail.Top), мессенджеры, боты и пр.</span></div>
  </div>
  </div>
  </div><br>
	<div class="form-group text-center">
		<input type="submit"  value="Сохранить" class="btn btn-primary">
	</div>
	 </fieldset>
   </div>
  </div>
 </div>
 
 
 <div class="panel panel-default">
  <div class="panel-heading">
   <h4 class="panel-title"><i class="fa fa-tags"></i>&#160;
       <a data-toggle="collapse" data-parent="#accordion" href="#dop_value">
        Дополнительные поля:
       </a>&#160;<i class="fa fa-caret-down" aria-hidden="true"></i>
	   <span id="dv" class="panel-heading-info hidden"><small>Есть не заполненные поля!</small></span>
      </h4>
  </div>
  <div id="dop_value" class="panel-collapse collapse">
   <div class="panel-body">
    <fieldset>
	<legend><small>Дополнительные поля, для использования в лендинге <i>(опционально!)</i></small></legend>
	  <div class="form-group">
	  	<label class="col-sm-3 control-label">Дополнительное поле 1:</label><div class="col-sm-9"><textarea class="form-control" rows="3" id="value1" name="value1_html" cols="70"><?php  if($value1_html!="") echo htmlspecialchars_decode($value1_html); else echo($config['dop']['val1']); ?></textarea> 
		<span class="help-block">Дополнительное поле 1 для размещения информации на лендинге</span>
		</div>
  </div>
  
  <div class="form-group">
	  	<label class="col-sm-3 control-label">Дополнительное поле 2:</label><div class="col-sm-9"><textarea class="form-control" rows="3" id="value2" name="value2_html" cols="70"><?php  if($value2_html!="") echo htmlspecialchars_decode($value2_html); else echo($config['dop']['val2']); ?></textarea> 
		<span class="help-block">Дополнительное поле 2 для размещения информации на лендинге</span>
		</div>
  </div>
  
  <div class="form-group">
	  	<label class="col-sm-3 control-label">Дополнительное поле 3:</label><div class="col-sm-9"><textarea class="form-control" rows="3" id="value3" name="value3_html" cols="70"><?php  if($value3_html!="") echo htmlspecialchars_decode($value3_html); else echo($config['dop']['val3']); ?></textarea> 
		<span class="help-block">Дополнительное поле 3 для размещения информации на лендинге</span>
		</div>
  </div>
		
	<div class="form-group text-center">
		<input type="submit"  value="Сохранить" class="btn btn-primary">
	</div>
	 </fieldset>
   </div>
  </div>
 </div>
 
  <div class="panel panel-default">
  <div class="panel-heading">
   <h4 class="panel-title"> <i class="fa fa-envelope-o"></i>&#160;
       <a data-toggle="collapse" data-parent="#accordion" href="#email-block">
        Отправка на e-mail:
       </a>&#160;<i class="fa fa-caret-down" aria-hidden="true"></i>
	   <span id="eml" class="panel-heading-info hidden"><small>Есть не заполненные поля!</small></span>
      </h4>
  </div>
  <div id="email-block" class="panel-collapse collapse">
   <div class="panel-body">
	  <fieldset>
 	 <legend><small>Настройки отправки заказа на электронную почту</small></legend>
	 <div id="type_group" class="form-group">
	  	<label class="col-sm-3 control-label">Способ отправки: <em>*</em></label><div class="col-sm-9">
		
		
		<select group="eml" class="form-control" name="mail_type" id="mail_type" >
		 <option <?php  if ($mail_type!='1') echo('selected') ?> value="">Прямая отправка (по умолчанию) </option>
		 <option <?php  if ($mail_type=='1') echo('selected') ?> value="1">Отправка через SMTP</option>
		
		</select>
		<span class="help-block">Если вы не знаете, что это такое - возьмите способ отправки <strong>"Прямая отправка"</strong> </span>
		</div></div>
		
		<div id="smtp_group" class="form-group <?php  if ($mail_type!='1') echo('hidden') ?>" >
	  	<label class="col-sm-3 control-label">SMTP-сервер: <em>*</em></label>
		<div class="col-sm-2">
		<select class="form-control" name="smtp_prot" id="smtp_prot" <?php  if ($mail_type!='1') echo('disabled') ?> onchange="mailtype(this.value)">
		<option <?php  if ($smtp_prot=='') echo('selected') ?>  value="">Без сертификата</option>
		<option <?php  if ($smtp_prot!='') echo('selected') ?> value="ssl">SSL</option>
		</select>
		<span class="help-block">Сертификат</span>
		</div>
		
		<div class="col-sm-6"><input group="eml" <?php  if ($mail_type!='1') echo('disabled') ?> class="form-control" required id="smtp" type="text" name="smtp" value="<?php echo  $smtp ?>" placeholder="Адрес SMTP сервера."><span class="help-block">Адрес SMTP сервера</span></div>
		<div class="col-sm-1"><input group="eml" <?php  if ($mail_type!='1') echo('disabled') ?> class="form-control" required id="port" type="text" name="port" value="<?php  if ($port!="") echo $port; else echo ("25"); ?>" placeholder="Порт"><span class="help-block">Порт</span></div>
		
		</div>
		
		  <div id="smtp_log_group" class="form-group <?php  if ($mail_type!='1') echo('hidden') ?>">
	  	<label class="col-sm-3 control-label">Доступ: <em>*</em></label>
		<div class="col-sm-5"><input group="eml" <?php  if ($mail_type!='1') echo('disabled') ?> class="form-control" required id="smtp_log" type="text" name="smtp_log" value="<?php echo  $smtp_log ?>" placeholder="Логин к SMPT-серверу" oninput="tologin(this.value)"></div>
		<div class="col-sm-4"><input group="eml" <?php  if ($mail_type!='1') echo('disabled') ?> class="form-control" required id="smtp_pass" type="text" name="smtp_pass" value="<?php echo  $smtp_pass?>" placeholder="Пароль к SMTP-серверу"></div>
		</div>
		
		
   <div id="email_group" class="form-group ">
	  	<label class="col-sm-3 control-label">E-mail: <em>*</em></label><div class="col-sm-9"><input group="eml" class="form-control" required id="email" type="text" name="email" value="<?php  if ($email!="") echo $email; else echo ($config['email']['email']) ?>" placeholder="E-mail, на который будут приходить уведомления о покупке."></div></div>
	 <div id="sender_group" class="form-group <?php  if ($mail_type=='1') echo('hidden') ?>">
	  	<label class="col-sm-3 control-label">Отправитель: <em>*</em></label><div class="col-sm-9"><input group="eml" <?php  if ($mail_type=='1') echo('disabled') ?> class="form-control" required id="sender" type="text" name="sender" value="<?php  if ($sender!="") echo $sender; else echo ($config['email']['sender']); ?>" placeholder="Имя и адрес отправителя, от которого будут приходить уведомления о покупке.">
		<span class="help-block"><i>Формат: </i> <strong>Имя_отправителя &lt;noreply@site.com&gt;</strong>. Имя сайта можно подставлять автоматически, используя шаблон '%domen%'. Например:  <strong>Имя_отправителя &lt;noreply@%domen%&gt;</strong></span>
	 	 </div></div>
		 
	<div id="sender_group_smtp" class="form-group <?php  if ($mail_type!='1') echo('hidden') ?>">
	  	<label class="col-sm-3 control-label">Отправитель: <em>*</em></label><div class="col-sm-9"><input group="eml" <?php  if ($mail_type!='1') echo('disabled') ?> class="form-control" required id="sender_smtp" type="text" name="sender_smtp" value="<?php  if ($sender_smtp!="") echo $sender_smtp; else echo ($config['email']['sender_smtp']); ?>" placeholder="Имя и адрес отправителя, от которого будут приходить уведомления о покупке.">
		<span class="help-block"><i>Формат: </i>Имя_отправителя;e-mail_отправителя (<u>через ;</u>)<br><strong>Важно! E-mail отправителя должен быть указан именно тот, который принадлежит указаннлму SMTP-серверу!</strong></span>
	 	 </div></div>
		 
	 <div id="subject_group" class="form-group">
	  	<label class="col-sm-3 control-label">Заголовок письма: <em>*</em></label><div class="col-sm-9"><input group="eml" class="form-control" required id="subject" type="text" name="subject" value="<?php  if ($subject!="") echo $subject; else echo($config['email']['subject']); ?>" placeholder="Заголовок письма, которое будет уведомлять Вас о покупке.">
	 </div></div>
	 
  
	<div class="form-group">
	  	<label class="col-sm-3 control-label">Текст письма:</label> <div class="col-sm-9"><textarea rows="8" id="message" name="message" cols="70">
		<?php  if ($message!="") echo $message; else echo $config['email']['message'];   ?></textarea>
		<span class="help-block">Текст письма, который будет добавлен к оповещению о покупателе. Может содержать дополнительные переменные.<br><strong>Инструкция в документации <a href="https://config-v2.github.io/#eml" target="_blank">https://config-v2.github.io/</a></strong></span>
</div></div>
<div class="form-group">
	  	<label class="col-sm-3 control-label">Комментарий: </label><div class="col-sm-9"><textarea class="form-control" rows="3" id="comment" name="comment" cols="70"><?php echo  $comment ?></textarea>
		<span class="help-block">Комментарий к заказу, который автоматически добавится в письмо о покупке<br>А также добавлен в Вашу СРМ систему, (Если ленд подключен) </span>
	</div></div>
	
<div class="form-group text-center">
		<input type="submit"  value="Сохранить" class="btn btn-primary">
	</div>
	 </fieldset>
   </div>
  </div>
 </div>
 
  <div class="panel panel-default">
  <div class="panel-heading">
   <h4 class="panel-title"> <i class="fa fa-telegram"></i>&#160;
       <a data-toggle="collapse" data-parent="#accordion" href="#telegram-block">
        Отправка на  Telegram:
       </a>&#160;<i class="fa fa-caret-down" aria-hidden="true"></i>
	   <span id="tlg" class="panel-heading-info hidden"><small>Есть не заполненные поля!</small></span>
      </h4>
  </div>
  <div id="telegram-block" class="panel-collapse collapse">
   <div class="panel-body">
	  <fieldset>
	  <fieldset>
	   	 <legend><small>Настройки отправки заказа на Telegram-мессенджер</small></legend>
	  <div class="form-group">
    <label class="col-sm-3 control-label">ID @CollLead_Bot: </label><div class="col-sm-9"><input group="tlg" class="form-control" id="tele_id" type="number" name="tele_id" value="<?php echo  $tele_id ?>" placeholder="Ваш ID в телеграм-боте @CoolLeadBot">
	 <span class="help-block">Для получения кода подключитесь к телеграм-боту <a title="@CoolLeadBot Telegram" href="https://t.me/CoolLead_bot?start=<?php echo  base64_encode($_SERVER['SERVER_NAME']); ?>" target="_blank">@CoolLeadBot</a> и дайте команду <b>/start</b>.<br>Полученный ID в пишите в поле</span></div>
</div>
<div id="tele_mess_group" class="form-group <?php  if ($tele_id=="") echo "hidden"; ?>">
    <label class="col-sm-3 control-label">Сообщение:</label><div class="col-sm-9"><input required group="tlg" class="form-control" id="tele_mess" type="text" name="tele_mess" value="<?php  if ($tele_mess!="") echo $tele_mess; else echo $config['tele_mess']; ?>" disabled placeholder="Сообщение о заявке">
	 </div>
</div>
		
		<div class="form-group text-center">
		<input type="submit"  value="Сохранить" class="btn btn-primary">
	</div>
		 </fieldset>
   </div>
  </div>
 </div>
 
  <div class="panel panel-default">
  <div class="panel-heading">
   <h4 class="panel-title"><i class="fa fa-info-circle"></i>&#160;
       <a data-toggle="collapse" data-parent="#accordion" href="#info-block">
        Информация о продавце:
       </a>&#160;<i class="fa fa-caret-down" aria-hidden="true"></i>
	   <span id="info" class="panel-heading-info hidden"><small>Есть не заполненные поля!</small></span>
      </h4>
  </div>
  <div id="info-block" class="panel-collapse collapse">
   <div class="panel-body">
	  <fieldset>
	   	 <legend><small>Исходные данные о продавце (обычно внизу ленда)</small></legend>
	  <div class="form-group">
    <label class="col-sm-3 control-label" for="seller">Продавец: </label><div class="col-sm-9"><input class="form-control" id="seller" type="text" name="seller" value="<?php echo  $seller ?>" placeholder="Информация о продавце, ИНН, ОГРН и пр. "></div></div>
		 <div class="form-group">
	<label class="col-sm-3 control-label" for="seller_adress">Адрес продавца: </label><div class="col-sm-9"><input class="form-control" id="seller_adress" type="text" name="seller_adress" value="<?php echo  $seller_adress ?>" placeholder="Адрес продавца (опционально)"></div></div>
	 <div class="form-group">
	 <label class="col-sm-3 control-label" for="contact_phone1">Контактный телефон 1: </label><div class="col-sm-9"><input class="form-control" id="contact_phone1" type="text" name="contact_phone1" value="<?php echo  $contact_phone1 ?>" placeholder="Контактный телефон продавца 1"></div></div>
	 <div class="form-group">
	 <label class="col-sm-3 control-label" for="contact_phone2">Контактный телефон 2: </label><div class="col-sm-9"><input class="form-control" id="contact_phone2" type="text" name="contact_phone2" value="<?php echo  $contact_phone2 ?>" placeholder="Контактный телефон продавца 2"></div></div>
	 <div class="form-group">
	 <label class="col-sm-3 control-label" for="contact_phone3">Контактный телефон 3: </label><div class="col-sm-9"><input class="form-control" id="contact_phone3" type="text" name="contact_phone3" value="<?php echo  $contact_phone3 ?>" placeholder="Контактный телефон продавца 3"></div></div>
	 <div class="form-group">
	 <label class="col-sm-3 control-label" for="contact_email">Контактный E-mail:<br> </label><div class="col-sm-9"><input class="form-control" id="contact_email" type="text" name="contact_email" value="<?php echo  $contact_email ?>" placeholder="Контактный E-mail продавца"></div></div>
	 
	 	<div class="form-group">
	  	<label class="col-sm-3 control-label">Политика конфиденциальности:</label> <div class="col-sm-9"><textarea rows="8" id="polit" name="polit" cols="70">
		<?php  if ($polit!="") echo $polit; else echo $config['polit']; ?></textarea>
		<span class="help-block">Текст "Политики Конфиденциальности"</span>
</div></div>
		
		<div class="form-group text-center">
		<input type="submit"  value="Сохранить" class="btn btn-primary">
	</div>
		 </fieldset>
   </div>
  </div>
 </div>
 
 
 <!--
  <div class="panel panel-default">
  <div class="panel-heading">
   <h4 class="panel-title"><i class="fa fa-flag"></i>&#160;
       <a data-toggle="collapse" data-parent="#accordion" href="#pokup-block">Тригер "Покупатели на сайте":</a>&#160;<i class="fa fa-caret-down" aria-hidden="true"></i>
	   <span id="inst" class="panel-heading-info hidden"><small>Есть не заполненные поля!</small></span>
      </h4>
  </div>
  <div id="pokup-block" class="panel-collapse collapse">
   <div class="panel-body">
	  <fieldset>
	   	 <legend><small>Тригер, показывающий количество посетителей и совершенных покупок</small></legend>
    <div class="form-group">
    <label class="col-sm-3 control-label" for="script_pokup">Активность: </label><div class="col-sm-9">
	 <select id="script_pokup" class="form-control" name="script_pokup" onchange="insite(); return true;">
 
  <option <?php  if ($script_pokup==1) echo "selected"; ?> value="1">Включено</option>
  <option <?php  if ($script_pokup==0) echo "selected"; ?> value="0">Выключено</option>
   </select></div> </div>
	 <div id="insite_block" <?php  if ($script_pokup!='1') echo('class="hidden"'); ?>>
	 <div id="pokup1_group" class="form-group">
	  <label class="col-sm-3 control-label" for="pokup1">На сайте <em>*</em></label><div class="col-sm-9"><input group="inst" class="form-control" <?php  if ($script_pokup!='1') echo ("disabled") ?> id="pokup1" type="number" required name="pokup1" value="<?php  if ($pokup1=='') echo ($config['pokup']['pokup1']); else echo $pokup1 ?>" placeholder="На сайте"></div></div>
	  <div id="pokup1n_group" class="form-group"><label class="col-sm-3 control-label" for="pokup1n">Обновление, сек <em>*</em></label><div class="col-sm-9"><input group="inst" class="form-control"<?php  if ($script_pokup!='1') echo ("disabled") ?> id="pokup1n" type="number"  required name="pokup1n" value="<?php  if ($pokup1n=='') echo ($config['pokup']['pokup1n']); else echo $pokup1n ?>" placeholder="Обновление покупателей"></div></div>
	 <div id="pokup2_group" class="form-group"> <label class="col-sm-3 control-label" for="pokup2">Покупок сегодня <em>*</em></label><div class="col-sm-9"><input group="inst"  class="form-control" <?php  if ($script_pokup!='1') echo ("disabled") ?> id="pokup2" type="number"  required name="pokup2" value="<?php  if ($pokup2=='') echo ($config['pokup']['pokup2']); else echo $pokup2 ?>" placeholder="Покупок сегодня"></div></div>
<div id="pokup2n_group" class="form-group"><label class="col-sm-3 control-label" for="pokup2n">Обновление, сек <em>*</em></label><div class="col-sm-9"><input class="form-control" group="inst"  <?php  if ($script_pokup!='1') echo ("disabled") ?> id="pokup2n" type="number"  required name="pokup2n" value="<?php  if ($pokup2n=='') echo ($config['pokup']['pokup2n']); else echo $pokup2n ?>" placeholder="Обновление совершенных покупок"></div></div></div>
		
		<div class="form-group text-center">
		<input type="submit"  value="Сохранить" class="btn btn-primary">
	</div>
		 </fieldset>
   </div>
  </div>
 </div> -->
 <!--
  <div class="panel panel-default">
  <div class="panel-heading">
   <h4 class="panel-title"><i class="fa fa-line-chart"></i>&#160;
       <a data-toggle="collapse" data-parent="#accordion" href="#script-block">
       Тригер "Совершенные покупки: </a>&#160;<i class="fa fa-caret-down" aria-hidden="true"></i>
	   <span id="sovp" class="panel-heading-info hidden"><small>Есть не заполненные поля!</small></span>
      </h4>
  </div>
  <div id="script-block" class="panel-collapse collapse">
   <div class="panel-body">
	  <fieldset>
	   	 <legend><small>Тригер, генерирующий всплывающие блоки о покупках на сайте</small></legend>
	  <div class="form-group">
	  	 <label class="col-sm-3 control-label" for="script">Активность: </label>
		 <div class="col-sm-9">
	 <select class="form-control" id="script" name="script"  onchange="pscript(); return true;">
 
  <option <?php  if ($script==1) echo "selected"; ?> value="1">Включено</option>
  <option <?php  if ($script==0) echo "selected"; ?> value="0">Выключено</option>
   </select>
	  </div></div>
	  <div id="pscr" <?php  if ($script!="1") echo('class="hidden"');?>>
	  <div class="form-group">
	 <label class="col-sm-3 control-label" <?php if ($script!='1') echo ("disabled") ?> for="auditoria">Аудитория: </label>
	 <div class="col-sm-9">
	 <select class="form-control" <?php if ($script!='1') echo ("disabled") ?> id="auditoria" name="auditoria">
  <option <?php  if (($auditoria=="") OR ($auditoria=="all")) echo "selected"; ?> value="all">Смешанная</option>
  <option <?php  if ($auditoria=="m") echo "selected"; ?> value="m">Мужчины</option>
  <option <?php  if ($auditoria=="w") echo "selected"; ?> value="w">Женщины</option>
   </select>
	</div></div>
	 <div id="title_group" class="form-group">
	
	<label class="col-sm-3 control-label" for="title">Наименование: <em>*</em> </label><div class="col-sm-9"><input group="sovp" class="form-control" id="title" <?php if ($script!='1') echo ("disabled") ?> type="text" required name="title" value="<?php 
if ($title=="") echo $product; else echo $title; ?>" placeholder="Наименование продукта во всплывающем окне"></div></div>
 <div id="tovar_group" class="form-group">
<label class="col-sm-3 control-label" for="tovar">Колличество шт в покупке:  <em>*</em></label><div class="col-sm-9"><input group="sovp" class="form-control" <?php if ($script!='1') echo ("disabled") ?> id="tovar" type="number" required name="tovar" value="<?php 
if ($tovar=="") echo $config['sovp']['tovar']; else echo $tovar;	 ?>" placeholder="Максимaльное количество шт товара в покупке"></div></div>
 <div id="vsego_group" class="form-group">
<label class="col-sm-3 control-label" for="vsego">Колличество окон: <em>*</em></label><div class="col-sm-9"><input group="sovp" class="form-control" id="vsego" <?php if ($script!='1') echo ("disabled") ?> type="number" required name="vsego" value="<?php 
if ($vsego=="") echo $config['sovp']['vsego']; else echo $vsego; ?>" placeholder="Количество сгенерированных покупателей"></div></div>
 <div id="delay2_group" class="form-group">
<label class="col-sm-3 control-label" for="delay2">Задержка в секундах перед первым показом: <em>*</em></label><div class="col-sm-9"><input group="sovp"  class="form-control" id="delay2" <?php if ($script!='1') echo ("disabled") ?> type="number" required name="delay2" value="<?php  if ($delay2=="") echo $config['sovp']['delay2']; else echo $delay2;	 ?>" placeholder="задержка в секундах перед показом первого уведомления"></div></div>
 <div id="delay1_group" class="form-group">
<label id="pokup1_group" class="col-sm-3 control-label" for="delay1">Задержка в сeкундах между показами: <em>*</em></label><div class="col-sm-9"><input group="sovp"  class="form-control" <?php if ($script!='1') echo ("disabled") ?> id="delay1" type="number" required name="delay1" value="<?php  if ($delay1=="") echo $config['sovp']['delay1']; else echo $delay1;	 ?>" placeholder="Задержка в секундах между показами уведомлений"></div></div>
</div>
		
		<div class="form-group text-center">
		<input type="submit"  value="Сохранить" class="btn btn-primary">
	</div>
		 </fieldset>
   </div>
  </div>
 </div> -->
 
 <!--
  <div class="panel panel-default">
  <div class="panel-heading">
   <h4 class="panel-title"><strong style="font-size: 18px">&#9990;</strong>&#160;
       <a data-toggle="collapse" data-parent="#accordion" href="#modal-block">
       Скрипт "Перезвоните мне":&#160; </a>&#160;<i class="fa fa-caret-down" aria-hidden="true"></i>
	   <span id="przv" class="panel-heading-info hidden"><small>Есть не заполненные поля!</small></span>
      </h4>
  </div>
  <div id="modal-block" class="panel-collapse collapse">
   <div class="panel-body">
	  <fieldset>
	   	 <legend><small>Скрипт в виде телефонной трубки в нижнем правом углу сайта, приглашающий заказать звонок</small></legend>
	  <div class="form-group">
		<label class="col-sm-3 control-label" for="modal">Активность: </label> <div class="col-sm-9">
    <select class="form-control" id="modal" name="modal" onchange="smodal(); return true;">
 
  <option <?php  if ($modal==1) echo "selected"; ?> value="1">Включено</option>
  <option <?php  if ($modal==0) echo "selected"; ?> value="0">Выключено</option>
   </select></div></div>
   <div id="przvb" <?php  if ($modal!='1') echo('class="hidden"'); ?>>
	  <div id="modal_title_group" class="form-group">
	 <label class="col-sm-3 control-label" for="modal_title">Заголовок окна: <em>*</em></label><div class="col-sm-9"><input group="przv" class="form-control" required id="modal_title" <?php if ($modal!='1') echo ("disabled") ?> type="text" name="modal_title" value="<?php 
if ($modal_title=="") echo $config['modal']['modal_title']; else echo $modal_title;	 ?>" placeholder="Заголовок окна"></div></div>
 <div id="modal_text_group"  class="form-group">
<label class="col-sm-3 control-label" for="modal_text">Текст окна: <em>*</em></label><div class="col-sm-9"><input group="przv" class="form-control" <?php if ($modal!='1') echo ("disabled") ?> id="modal_text" type="text" name="modal_text" required value="<?php 
if ($modal_text=="") echo $config['modal']['modal_text']; else echo $modal_text;	 ?>" placeholder="Текст окна"></div></div>
 <div id="modal_text2_group"  class="form-group">
<label class="col-sm-3 control-label" for="modal_text2">Подпись окна: <em>*</em></label><div class="col-sm-9"><input group="przv" class="form-control" <?php if ($modal!='1') echo ("disabled") ?> id="modal_text2" type="text" name="modal_text2"required  value="<?php 
if ($modal_text2=="") echo $config['modal']['modal_text2']; else echo $modal_text2; ?>" placeholder="Подпись окна"></div></div>
 <div id="button_group"  class="form-group">
<label class="col-sm-3 control-label" for="button">Призыв к действию: <em>*</em></label><div class="col-sm-9"><input group="przv" class="form-control" id="button" <?php if ($modal!='1') echo ("disabled") ?> type="text" required name="button" value="<?php 
if ($button=="") echo $config['modal']['button']; else echo $button;	 ?>" placeholder="Кнопка призыва к действию"></div></div>
 <div id="modal_delay_group"  class="form-group">
<label class="col-sm-3 control-label" for="modal_delay">Задержка перед показом (сек.): <em>*</em></label><div class="col-sm-9"><input group="przv" class="form-control" id="modal_delay" <?php if ($modal!='1') echo ("disabled") ?> type="number" required name="modal_delay" value="<?php  if ($modal_delay=="") echo $config['modal']['modal_delay']; else echo $modal_delay;	 ?>" placeholder="задержка в секундах перед первым показом">
	</div></div></div>
		<div class="form-group text-center">
		<input type="submit"  value="Сохранить" class="btn btn-primary">
	</div>
		 </fieldset>
   </div>
  </div>
 </div>
 -->
 
  <div class="panel panel-default">
  <div class="panel-heading">
   <h4 class="panel-title"><i class="fa fa-check-square-o"></i>&#160;
       <a data-toggle="collapse" data-parent="#accordion" href="#thanks-block">
        Страница "Спасибо"
       </a>&#160;<i class="fa fa-caret-down" aria-hidden="true"></i>
	   <span id="thanks" class="panel-heading-info hidden"><small>Есть не заполненные поля!</small></span>
      </h4>
  </div>
  <div id="thanks-block" class="panel-collapse collapse">
   <div class="panel-body">
	  <fieldset>
	   	 <legend><small>Тексты на странице "Спасибо" </small></legend>
	  <div id="thanks1_group" class="form-group">
    <label class="col-sm-3 control-label" for="thanks1">Поздравление: </label><div class="col-sm-9"><input group="thanks" class="form-control" id="thanks1" type="text" name="thanks1" required value="<?php echo  $config['thanks']['text1']; ?>" placeholder="Поздравление с покупкой"></div></div>
		 <div id="thanks2_group" class="form-group">
	<label class="col-sm-3 control-label" for="thanks2">Оповещение: </label><div class="col-sm-9"><input required value="<?php echo  $config['thanks']['text2']; ?>"group="thanks" class="form-control" id="thanks2" type="text" name="thanks2" placeholder="Оповещение о звонке оператора"></div></div>
	 <div id="thanks3_group" class="form-group">
	 <label class="col-sm-3 control-label" for="thanks3">Ссылка на повтор: </label><div class="col-sm-9"><input group="thanks" class="form-control" id="thanks3" type="text" name="thanks3" required value="<?php echo  $config['thanks']['text3']; ?>" placeholder="Ссылка на повтор ввода, в случае ошибки">
<span class="help-block">	  Для указания ссылки используйте переменную <strong><i>%back_link%</i></strong>.</span>
	 </div>
	
	 </div>
	
		<div class="form-group text-center">
		<input type="submit"  value="Сохранить" class="btn btn-primary">
	</div>
		 </fieldset>
   </div>
  </div>
 </div>
 
  <div class="panel panel-default">
  <div class="panel-heading">
   <h4 class="panel-title"> <i class="fa fa-cart-plus"></i>&#160;
       <a data-toggle="collapse" data-parent="#accordion" href="#upsell-block">
       Допродажа на странице "СПАСИБО." :&#160;</a>&#160;<i class="fa fa-caret-down" aria-hidden="true"></i>
	   <span id="upsell" class="panel-heading-info hidden"><small>Есть не заполненные поля!</small></span>
      </h4>
  </div>
  <div id="upsell-block" class="panel-collapse collapse">
   <div class="panel-body">
	  <fieldset>
	   	 <legend><small>Блок допродажи на странице "спасибо"</small></legend>
	  <div class="form-group">
    <label class="col-sm-3 control-label" for="upsel">Активность: </label><div class="col-sm-9">
	 <select class="form-control" id="upsel" name="upsel" onchange="upscr(); return true;">
 
  <option <?php  if ($upsel==1) echo "selected"; ?> value="1">Включено</option>
  <option <?php  if ($upsel==0) echo "selected"; ?> value="0">Выключено</option>
   </select></div></div>
   <div id="ups" <?php  if ($upsel!='1') echo('class="hidden"'); ?>>
	 <div  id="upsel_title_group" class="form-group">
	 <label class="col-sm-3 control-label" for="upsel_title">Заголовок допродажи: <em>*</em></label><div class="col-sm-9"><input required group="upsell" class="form-control" id="upsel_title" <?php  if ($upsel!='1') echo ("disabled") ?> type="text" name="upsel_title" value="<?php  if ($upsel_title=="") echo $config['upsel']['upsel_title']; else echo $upsel_title;	 ?>" placeholder="Заголовок допродажи"></div></div>
 <div  id="upsel_pic_group" class="form-group">
 <label class="col-sm-3 control-label" for="upsel_pic">Картинка: <em>*</em></label>
<div class="col-sm-9"><input group="upsell" class="form-control <?php  if ($upsel_pic!="") echo "hidden" ?>" <?php  if ($upsel_pic!="") echo "disabled" ?> id="upsel_pic" <?php  if ($upsel!='1') echo ("disabled") ?> type="file" name="upsel_pic" accept="image/*" size="20" required >
 <?php  if ($upsel_pic!="") {echo ("<p id=\"upsel_pic_p\" "); if ($upsel!='1') echo ("disabled"); echo(">Выбранная картинка:<br><img width=\"100\" src=\"upsel_img/{$upsel_pic}\"></p>\n<input id=\"ups_pic\" type=\"hidden\" name=\"upsel_pic\" value=\"{$upsel_pic}\"><br>" ); echo('<span id="on_upsell_pic" onclick="upspicscr(); return false;" class="btn btn-default">Заменить картинку</span>');} ?></div></div>
<div  id="upsel_pic_h_group" class="form-group">
 <label class="col-sm-3 control-label" for="upsel_pic_h">Высота картинки: <em>*</em></label><div class="col-sm-9"><input group="upsell" class="form-control" <?php if ($upsel!='1') echo ("disabled") ?> id="upsel_pic_h" required type="text" name="upsel_pic_h" value="<?php  if ($upsel_pic_h=="") echo $config['upsel']['upsel_pic_h']; else echo $upsel_pic_h;	 ?>" placeholder="Высота картинки"></div></div>
 <div  id="upsel_url_group" class="form-group">
<label class="col-sm-3 control-label" for="upsel_url">Ссылка на сайт допродажи: </label><div class="col-sm-9"><input class="form-control" <?php if ($upsel!='1') echo ("disabled") ?> id="upsel_url" type="text" name="upsel_url" group="upsell" value="<?php echo $upsel_url; ?>" placeholder="Ссылка на сайт допродажи. Если ссылка не нужна - оставьте поле пустым"></div></div>
<div  id="upsel_url_title_group" class="form-group">
<label class="col-sm-3 control-label" for="upsel_url_title">Подпись ccылки: <em>*</em></label><div class="col-sm-9"><input group="upsell" class="form-control" required <?php if ($upsel!='1') echo ("disabled") ?> id="upsel_url_title" type="text" name="upsel_url_title" value="<?php  if (($upsel_url=="") AND ($upsel_url_title=="")) echo $config['upsel']['upsel_url_title']; else echo $upsel_url_title;	 ?>" placeholder="Подпись ccылки на сайт с допродажей"></div></div>
<div  id="upsel_delay_group" class="form-group">
<label class="col-sm-3 control-label" for="upsel_delay">Задержка в секундах переадресации: </label><div class="col-sm-9"><input class="form-control" id="upsel_delay" group="upsell" <?php if ($upsel!='1') echo ("disabled") ?> type="number" name="upsel_delay" value="<?php  if ($upsel_delay!="") echo $upsel_delay;	 ?>" placeholder="Задержка в секундах переадресации на сайт допродажи. Пусто - отключено"></div>
</div>
		</div>
		<div class="form-group text-center">
		<input type="submit"  value="Сохранить" class="btn btn-primary">
	</div> 
		 </fieldset>
   </div>
  </div>
 </div>
 
   <div class="panel panel-default">
  <div class="panel-heading">
   <h4 class="panel-title"> <i class="fa fa-bug"></i>&#160;
       <a data-toggle="collapse" data-parent="#accordion" href="#ip-block">
        Заблокированные IP-адреса
       </a>&#160;<i class="fa fa-caret-down" aria-hidden="true"></i>
	   <span id="ip" class="panel-heading-info hidden"><small>Есть не заполненные поля!</small></span>
      </h4>
  </div>
  <div id="ip-block" class="panel-collapse collapse">
   <div class="panel-body">
	  <fieldset>
	   	 <legend><small>IP-адреса, запрещенные для посещения</small></legend>
	  <div class="form-group">
    <label class="col-sm-3 control-label">Перечень ip-адресов: </label><div class="col-sm-9"><textarea class="form-control" name="ip_block" id="ip_block" cols="30" rows="10"><?php echo  $ip_block ?></textarea>
	 <span class="help-block">Напишите IP-адреса через запятую или каждый в отдельной строке</span></div>
</div>

		
		<div class="form-group text-center">
		<input type="submit"  value="Сохранить" class="btn btn-primary">
	</div>
		 </fieldset>
   </div>
  </div>
 </div>
 
  <div class="panel panel-default">
  <div class="panel-heading">
   <h4 class="panel-title"> <i class="fa fa-connectdevelop"></i>&#160;
       <a data-toggle="collapse" data-parent="#accordion" href="#crm-block">
       Интеграция с СRМ:&#160;</a>&#160;<i class="fa fa-caret-down" aria-hidden="true"></i>
	   <span id="crmt" class="panel-heading-info hidden"><small>Есть не заполненные поля!</small></span>
      </h4>
  </div>
   <div id="crm-block" class="panel-collapse collapse">
   <div class="panel-body">
	  <fieldset>
	     	 <legend><small>Интеграции с СРМ</small></legend>
    <div class="form-group">
    <label class="col-sm-3 control-label" for="crm">Ваша СРМ: </label><div class="col-sm-9">
	 <select class="form-control" id="crm" name="crm" onchange="crmfunc(this.value); return true;">
 
  <option <?php  if ($crm=='') echo "selected"; ?> value="">Не используется</option>
  <option <?php  if ($crm=='lpcrm') echo "selected"; ?> value="lpcrm">LP-CRM</option>
  <option <?php  if ($crm=='crm1top') echo "selected"; ?> value="crm1top">CRM1.TOP</option>
  <option <?php  if ($crm=='eautopay') echo "selected"; ?> value="eautopay">e-autopay</option>
   </select></div></div>
   
   <div  id="crm_block"><?php  if ($crm!='') include('include/'.$crm.'.php'); ?></div>
   
   
   
		<!--
		<div class="form-group text-center">
		<input type="submit"  value="Сохранить" class="btn btn-primary">
	</div> -->
		 </fieldset>
   </div>
  </div>
 </div> 
 

 
</div>
<div class="form-group text-center">
		<input  type="submit"  value="Сохранить" class="btn btn-primary">
	</div>
</form>
</div>
<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Ошибка заполнения!</h4>
      </div>
      <div id="err" class="modal-body"> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
       
      </div>
    </div>
  </div>
</div>

<script>function log_func(l){if (l==1) $('#lilog').removeClass('hidden');else $('#lilog').addClass('hidden');};</script> 
<script src="js/jstz.min.js"></script>
<script src="js/tz.js"></script>
<script src="js/script_form.js"></script>

<script> 
	 $('document').ready(function() {
		
	<?php  if ($timezone=='') { ?>	 $('#timezone option[value="'+timezone.name()+'"]').prop('selected', true); <?php  } ?>
		 $('#tzs').html(timezone.name());

});
	</script>
<?php  
	if ($_GET['save']=='1') { ?>
	<div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="savebody" aria-hidden="true">
 <div class="modal-dialog modal-sm">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="savebody">Сохранение</h4>
   </div>
   <div class="modal-body text-center">
    Данные успешно сохранены
   </div>
   <div class="modal-footer">
  <a href="<?php echo  $server ?>" type="button" class="btn btn-primary">Ok</a>
   </div>
  </div>
 </div>
</div>
	<script> 
	 $('document').ready(function() {
		 $('#save').modal('show');
		 setTimeout(function() { $('#save').modal('hide'); document.location.href = '<?php echo  $server ?>'; }, 3000);

});
	</script>
	<?php  } 