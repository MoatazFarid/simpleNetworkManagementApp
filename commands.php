<?php
	include 'functions.php';

	// GLOBAL ERRORS
	$e100 = "ERROR RETURED" ; // e #100 will be used to represent the error return from the function


	function getRouterName(){
		//get router name
		$oid = ".1.3.6.1.2.1.1.5.0";
		$RName = snmpGetandTrim($oid,"STRING");
		if($RName != "ERROR"){
			return $RName;
		}else{
			return $e100;
		}

	}

	/**
	*	no of interfaces
	*	State : Tested
	*/
	function noOfInterfaces()
	{
		//get no of Interfaces
		$oid = ".1.3.6.1.2.1.2.1.0";
		$out = snmpGetandTrim($oid,"INTEGER");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}

	/**
	*	get interface no from certain interfaces
	*	State :
	**/
	function interNo($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.1.".$inter;
		$out = snmpGetandTrim($oid,"INTEGER");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}
	/**
	*	get interface name from certain interfaces
	*	state :
	**/
	function interName($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.2.".$inter;
		$out = snmpGetandTrim($oid,"STRING");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}

	/**
	*	get type from certain interfaces
	**/
	function interType($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.3.".$inter;
		$out = snmpGetandTrim($oid,"INTEGER");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}
	/**
	*	get admin state from certain interfaces
	**/
	function interAdminState($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.7.".$inter;
		$out = snmpGetandTrim($oid,"INTEGER");
		if($out != "ERROR"){
			if($out==1)
				return "Up";
			else if ($out == 0) {
				return "Down";
			}
		}else{
			return $e100;
		}
	}
	/**
	*	get operation state from certain interfaces
	**/
	function interOperState($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.8.".$inter;
		$out = snmpGetandTrim($oid,"INTEGER");
		if($out != "ERROR"){
			if($out==1)
				return "Up";
			else if ($out == 0) {
				return "Down";
			}
		}else{
			return $e100;
		}
	}

	/**
	*	get MTU from certain interfaces
	**/
	function interMTU($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.4.".$inter;
		$out = snmpGetandTrim($oid,"INTEGER");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}

	/**
	*	get speed from certain interfaces
	**/
	function interSpeed($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.5.".$inter;
		$out = snmpGetandTrim($oid,"Gauge32");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}

	/**
	*	get physical address from certain interfaces
	**/
	function interPhysicalAddress($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.6.".$inter;
		$out = snmpGetandTrim($oid,"Hex-STRING");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}

	/**
	*	get last login from certain interfaces
	**/
	function interLastActiveDate($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.9.".$inter;
		$out = snmpGetandTrim($oid,"Timeticks");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}
	/**
	*	IN octets from certain interfaces
	**/
	function interInOctet($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.10.".$inter;
		$out = snmpGetandTrim($oid,"Counter32");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}
	/**
	*	OUT octets from certain interfaces
	**/
	function interOutOctet($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.16.".$inter;
		$out = snmpGetandTrim($oid,"Counter32");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}
	/**
	*	IN unicast from certain interfaces
	**/
	function interInUnicast($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.11.".$inter;
		$out = snmpGetandTrim($oid,"Counter32");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}
	/**
	*	OUT unicast from certain interfaces
	**/
	function interOutUnicast($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.17.".$inter;
		$out = snmpGetandTrim($oid,"Counter32");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}
	/**
	*	IN non unicast from certain interfaces
	**/
	function interInNUnicast($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.12.".$inter;
		$out = snmpGetandTrim($oid,"Counter32");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}
	/**
	*	OUT non unicast from certain interfaces
	**/
	function interOutNUnicast($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.18.".$inter;
		$out = snmpGetandTrim($oid,"Counter32");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}

	/**
	*	get in discards from certain interfaces
	**/
	function interInDiscard($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.13.".$inter;
		$out = snmpGetandTrim($oid,"Counter32");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}
	/**
	*	get out discards from certain interfaces
	**/
	function interOutDiscard($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.19.".$inter;
		$out = snmpGetandTrim($oid,"Counter32");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}
	/**
	*	get IN errors from certain interfaces
	**/
	function interInErrors($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.14.".$inter;
		$out = snmpGetandTrim($oid,"Counter32");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}
	/**
	*	get Out errors from certain interfaces
	**/
	function interOutErrors($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.20.".$inter;
		$out = snmpGetandTrim($oid,"Counter32");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}
	/**
	*	get IN unknown protocols from certain interfaces
	**/
	function interInUnknownProtocols($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.15.".$inter;
		$out = snmpGetandTrim($oid,"Counter32");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}

	/**
	*	OUT Queue Length from certain interfaces
	**/

	function interOutQueueLen($inter)
	{
		$oid = ".1.3.6.1.2.1.2.2.1.21.".$inter;
		$out = snmpGetandTrim($oid,"Gauge32");
		if($out != "ERROR"){
			return $out;
		}else{
			return $e100;
		}
	}

?>
