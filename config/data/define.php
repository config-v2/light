<?php  
if (stripos($_SERVER['PHP_SELF'], "index"))
	{	define('YEAR',date("Y"));
		define('TODAY', date("d.m.Y"));
		
		require_once("config/include/session.php");
	}


