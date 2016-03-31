<?php
	include 'functions.php';

	// GLOBAL ERRORS
	$e100 = "ERROR RETURED" ; // e #100 will be used to represent the error return from the function 

	echo snmpget("192.168.1.200", "cisco", ".1.3.6.1.2.1.2.2.1.21.1")

?>