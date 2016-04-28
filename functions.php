<?php
/**
 *
 */
 global $IP ;//= "192.168.1.200"; // router IP

 global $RCOMMUNITY ;//= "cisco"; // router read Community

 global $WCOMMUNITY ;//= "cisco"; // router write Community

class SnmpCore
{

	function __construct($ip,$Rcomm ="BBNULL" ,$Wcomm ="BBNULL")
	{
		# code...
		$this->setIP($ip); // seting ip address of the router
		if ($Rcomm != "BBNULL" ) {
			$this->setRCommunity($Rcomm); // setting read the community of the router
			echo $Rcomm;
		}
		if ($Rcomm != "BBNULL") {
			$this->setWCommunity($Wcomm); // setting Write the community of the router
			echo $Wcomm;
		}
	}


	public function testclass()
	{
		echo "SNMP CORE CLASS TEST";
	}

	public function setIP($value){
		# code...
		$this->IP = $value;
	}
	public function getIP(){
		// $IP = "192.168.1.200";
		# code...
		if(isset($this->IP))
			return $this->IP;
	}

	public function setRCommunity($value){
		# code...
		$this->RCOMMUNITY = $value;
	}

	public function getRCommunity(){
		// $COMMUNITY = "cisco";
		# code...
		if(isset($this->RCOMMUNITY))
			return $this->RCOMMUNITY;
	}

	public function setWCommunity($value){
		# code...
		$this->RCOMMUNITY = $value;
		$this->WCOMMUNITY = $value;
	}

	public function getWCommunity(){
		// $COMMUNITY = "cisco";
		# code...
		if(isset($this->WCOMMUNITY))
			return $this->WCOMMUNITY;

	}

	public function snmpGetandTrim($oid, $trimString){

		$out = trim(snmpget(getIP(), getRCommunity(), $oid, 20000), $trimString.": ");
		if($trimString == "STRING")
			$out = str_replace('"',"",$out); // removing the double quotes " from the output
		if(isset($out)){
			return $out;
		}else{
			return "ERROR";
		}
	}
	
	public function snmpSet($oid ,$type = "="){

		$out = snmpset(getIP(), getWCommunity(), $oid,$type ,20000);
		if (!$out) {
			return "ERROR";
		}
	}
}

?>
