<?php

	// This is your SNMP Write+ String
	$community = "cisco";
	$ip = "192.168.1.200" ;
	
	// Funcitons used SNMPGET , SNMPSET
	// snmpget ( string $hostname , string $community , string $object_id [, int $timeout = 1000000 [, int $retries = 5 ]] )
	// snmpset ( string $host , string $community , string $object_id , string $type , mixed $value [, int $timeout = 1000000 [, int $retries = 5 ]] )

		
	// Print System_description
	$mib = ".1.3.6.1.2.1.1.1.0";
	$System_description = trim(snmpget($ip, $community, $mib, 20000), "STRING: ");
	echo "<b>System</b> <br /> ".$System_description."<br /><br />";

	// Print System uptine
	$mib = ".1.3.6.1.2.1.1.3.0";
	$System_uptime = trim(snmpget($ip, $community, $mib, 20000), "Timeticks: ");
	echo "<b>System uptime</b> <br /> ".$System_uptime."<br /><br />";
	
	
	// Print device name
	$mib = ".1.3.6.1.2.1.1.5.0";
	$device_name = trim(snmpget($ip, $community, $mib, 20000), "STRING: ");
	echo "<b>Device Name</b> <br /> ".$device_name."<br /><br />";
	
	
	// Get number of interfaces and remove word 
	$mib = ".1.3.6.1.2.1.2.1.0";
	$number_of_interfaces = trim(snmpget($ip, $community, $mib, 20000), "INTEGER: ");
	
	
	
	// Loop to extract interface desctiption
	$i = 1 ;
	echo "<b>Interfaces </b><br />";
	for ($i ; $i <=$number_of_interfaces ; $i++){
		// MIB to get Value of desctiption of an interface
		$mib = ".1.3.6.1.2.1.2.2.1.2.".$i;
		$a = trim(snmpget($ip, $community, $mib, 20000), "STRING: ");
		
		echo $a."<br />";
	}
	
	// set value on device name
	$action  = "Router"; 
	$mib = ".1.3.6.1.2.1.1.5.0";
	$VERIFY = snmpset($ip, $community, $mib,"s", $action);
	if ($VERIFY){
		
		echo "<br />Router name set";
		print $VERIFY ;
	}
/*
i    INTEGER 
u    unsigned INTEGER 
t    TIMETICKS 
a    IPADDRESS 
o    OBJID 
s    STRING 
x    HEX STRING 
d    DECIMAL STRING 
n    NULLOBJ 
b    BITS 
*/
	
// MIB mac address 1.3.6.1.2.1.17.4.3
// Cisco MIBs http://www.oidview.com/mibs/9/md-9-1.html
?>