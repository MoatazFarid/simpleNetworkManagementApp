<?php
	
	GLOBAL $IP ;//= "192.168.1.200"; // router IP 

	GLOBAL $COMMUNITY ;//= "cisco"; // router Community

	// function setIP($value)
	// {
	// 	# code...
	// 	$IP = $value;		
	// }
	function getIP()
	{
		$IP = "192.168.1.200";
		# code...
		if(isset($IP))
			return $IP;
	}
	// function setCommunity($value)
	// {
	// 	# code...
	// 	$COMMUNITY = $value;
	// }
	function getCommunity()
	{	
		$COMMUNITY = "cisco";
		# code...
		if(isset($COMMUNITY))
			return $COMMUNITY;
		
	}

	function snmpGetandTrim($oid, $trimString){

		$out = trim(snmpget(getIP(), getCommunity(), $oid, 20000), $trimString.": ");
		if($trimString == "STRING")
			$out = str_replace('"',"",$out); // removing the double quotes " from the output  
		if(isset($out)){
			return $out;
		}else{
			return "ERROR";
		}
	}

?>