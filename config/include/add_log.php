<?php 
$log_path="config/logs/";
$year=date("Y");
$month=date("m");
$day=date("d").".php";
$utm='<b>utm_source</b> : '  . $_SESSION['utms']['utm_source'].
    '<br><b>utm_medium</b> : '  . $_SESSION['utms']['utm_medium'].
    '<br><b>utm_term</b> : '    . $_SESSION['utms']['utm_term'].
    '<br><b>utm_content</b> : ' . $_SESSION['utms']['utm_content'].
    '<br><b>utm_campaign</b> : '. $_SESSION['utms']['utm_campaign'];
if (!file_exists($log_path.$year)) mkdir($log_path.$year);
if (!file_exists($log_path.$year."/".$month)) mkdir($log_path.$year."/".$month);
if (file_exists($log_path.$year."/".$month."/".$day)) require_once($log_path.$year."/".$month."/".$day);
$log_day='<?php  $log="'.htmlspecialchars("<tr><td><ul class='fa-ul'><li><i class=\"fa-li fa fa-calendar\" aria-hidden=\"true\"></i>{$date}</li><li><i class=\"fa-li fa fa-clock-o\" aria-hidden=\"true\"></i><strong>{$time}</strong> <small>({$timezone})</small></li></ul></td><td><ul class='fa-ul'><li><i class=\"fa-li fa fa-user-o\" aria-hidden=\"true\"></i><b>{$name}</b></li><li><i class=\"fa fa-li fa-phone\" aria-hidden=\"true\"></i>{$phone}</li>");
if ($email_client!="") $log_day.=htmlspecialchars("<li><i class=\"fa fa-li fa-envelope-open-o\" aria-hidden=\"true\"></i>{$email_client}</li>");
 $log_day.=htmlspecialchars("</ul></td><td><ul class='list-unstyled'><li>{$price_new} {$valuta}</li><li><small><strike>&nbsp;{$price_old} {$valuta}&nbsp;</strike></small></li><li><small>Скидка: {$skidka}%</small></li></ul></td><td><table>{$utm}</table></td></tr>").$log.'";';
file_put_contents($log_path.$year."/".$month."/".$day, $log_day);
?>
