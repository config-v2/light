<? 		require_once("config/class/browser.class.php");
		require_once("config/class/functions.class.php");
		if ($_SESSION['referer']!="") $referer=$_SESSION['referer']; else
		if ($_POST['referer']!="") $referer=$_POST['referer']; else $referer="Не определен.";
		$browser_class = new Browser();
		$browser=$browser_class->getBrowser()." v.".$browser_class->getVersion();

		$os=$browser_class->getPlatform();
		$proxy=Config::isProxy();
		$remote_addr=Config::GetRealIp();
		$date=Config::date_rus();
		$time=date('H:i:s');
		if ($browser_class->isMobile()) $device="Mobile"; else
		if ($browser_class->isTablet()) $device="Tablet"; else $device="Desktop";
			$remote_host=@gethostbyaddr($remote_addr);
		if ($remote_host==$remote_addr) $remote_host="Не определен";
		if ($remote_addr=="127.0.0.1") $remote_addr="localhost";
		$host_path=str_ireplace('index.php','', $_SERVER['PHP_SELF']);
		$domen=str_ireplace("www.", "", $_SERVER['HTTP_HOST']);
				$scheme=Config::scheme();
		
		$lang_array=explode(";", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
		$lang=$lang_array[0];
		$host=$domen.$host_path;
		$url="{$scheme}://{$domen}";
		$server="{$scheme}://{$host}";
		$server_request_uri="{$scheme}://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
		$user_agent=$_SERVER['HTTP_USER_AGENT'];
		?>