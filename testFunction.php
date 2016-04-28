<?php
	include 'functions.php';

	// GLOBAL ERRORS
	$e100 = "ERROR RETURED" ; // e #100 will be used to represent the error return from the function

	// echo snmpget("192.168.1.200", "cisco", ".1.3.6.1.2.1.2.2.1.21.1")
	$ip = "10.10.10.100";
	$comm = "cisco";
	$core = new SnmpCore($ip,$comm);

//	$core->testclass();
	echo snmpget($core->getIP(),$core->getWCommunity(), ".1.3.6.1.2.1.1.1.0", 20000);
?>
