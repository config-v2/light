<?php  include('config.php'); 
		include('config/data/def_light.php');
require_once('config/data/array.php');
 if ($mail_type==1) require_once("config/class/libmail.class.php");
$name = stripslashes(htmlspecialchars($_POST['name']));
$phone = stripslashes(htmlspecialchars($_POST['phone']));
$email_client = $_POST['email'];
$_SESSION['name']=$name;
$_SESSION['phone']=$phone;
$_SESSION['email']=$email_client;
$commentform=$_POST['comment'];
if ($comment!="") $comment.='<br>'.$commentform; else $comment=$commentform;


if(empty($phone)) { echo('<meta http-equiv="refresh" content="2; url=http://'.$_SERVER['SERVER_NAME'].'">');
echo('<h1 style="color:red;">Пожалуйста заполните все поля</h1>'); }
else{
	
	$mess_tele=""; // Комментарий в telegram
	if ($key_crm!="")		require_once('config/include/key_crm.php');
	if ($user_api_key!="")	require_once('config/include/api_key.php');
	if ($mess_tele!="") $mess_tele.='%0A'.$commentform; else $mess_tele=$commentform;
	$remote_addr=$remote_addr." ({$_POST['org']})";
	if ($tele_id!="") 		require_once('config/include/tele_id.php');
	if ($logs=="1") require_once('config/include/add_log.php');
		
	$success_url = 'form-ok.php';
	if ($_POST['formname']!="") $formname="<tr><td><b>Форма заказа:</b></td><td>{$_POST['formname']}</td></tr>";
	$message1 = "<table border=\"0\">
	<tr><td colspan=\"2\" ><b>{$config['email']['prod']}:</b><font size=\"5\" color=\"#FF0000\"> {$product}</font></td></tr><tr><td><b>{$config['email']['price']}:&nbsp; </b></td><td ><font size=\"5\" color=\"#FF0000\">{$price_new} {$valuta}</font></td></tr><tr><td><b>{$config['email']['oldprice']}:&nbsp; </b></td><td ><strike>{$price_old} {$valuta}</strike></td></tr>
	<tr><td><b>{$config['email']['skidka']}:&nbsp; </b></td><td >{$skidka} %</td></tr><tr><td ><b>{$config['email']['pokup']}:</b></td><td><font size=\"4\" >{$name}</font></td></tr><tr><td ><b>{$config['email']['phone']}: </b></td><td><font size=\"4\" >{$phone}</font></td></tr><tr><td ><b>Сайт продажи:</b></td><td><a href='{$server}' target='_blank'>{$server}</a></td></tr><tr><td ><b>Дата заказа: </b></td><td>{$date}</td></tr><tr><td ><b>Время заказа: </b></td><td>{$time} ({$timezone})</td></tr><tr><td><b>Комментарий к заказу:</b></td><td>{$comment}</td></tr><tr>{$formname}</tr></table>";
	
	$message = $message1.$message.$mess."<br><hr><br>\n<small> {$config['email']['footer']} <strong>{$config['name']} v.{$config['ver']}</strong>.<br>Подробнее: <a target='_blank' href='{$config['site_conf']}'>{$config['site_conf']}</a>, &copy; 2015-".date("Y").", <a target='_blank' href='{$config['site_gg']}'>{$config['powered']}</a></small>";
	//echo $message;

	  if ($mail_type!=1) $verify = mail($email,$subject,$message,$header);
	 else {
		   if ($smtp_prot!="") $smtp="ssl://{$smtp}";
		//	echo "Sender: {$sender_smtp};<br> server: {$smtp}<br>email:{$email}<br>smtp_log:{$smtp_log}<br>smtp_pass:{$smtp_pass}<br> port:{$port}<br>subject:{$subject}<br>message:{$message}";
			$m= new Mail('UTF-8');  // можно сразу указать кодировку, можно ничего не указывать ($m= new Mail;)
			$m->From( $sender_smtp ); // от кого Можно использовать имя, отделяется точкой с запятой
			$m->To( $email );   // кому, в этом поле так же разрешено указывать имя
			$m->Subject( $subject );
			$m->Body($message, "html");
			$m->Priority(3) ;	// установка приоритета
			$m->smtp_on($smtp, $smtp_log, $smtp_pass, $port); // используя эту команду отправка пойдет через smtp
			//$m->log_on(true); // включаем лог, чтобы посмотреть служебную информацию
			$m->Send();	// отправка
		//	echo "Письмо отправлено, вот исходный текст письма:<br><pre>", $m->Get(), "</pre>";
			$verify =true;
	 }
	if ($verify == 'true'){
		include('config/include/info.php');
	 header('Location: '.$success_url);
		echo '<h1 style="color:green;">Поздравляем! Ваш заказ принят!</h1>';
		exit;
	}
	else 
    {
    echo '<h1 style="color:red;">Произошла ошибка отправки заказа на E-mail!<br>'.$verify.'</h1>';
    }
}
?>
</body>
</html>
