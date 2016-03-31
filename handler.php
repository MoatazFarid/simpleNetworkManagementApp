<tr></tr>
<?php
	//running Session
	session_start();

	//including files
	include 'commands.php';

	// GLOBAL ERRORS
	$e100 = "ERROR RETURED" ; // e #100 will be used to represent the error return from the function

	// preparing output style
	$tableHead = '<table class="table table-hover">';
	$tableFoot = '</table>';

	if(isset($_GET["shIpInterBrRun"])){

		$output = showIpInterBr(); // get output

		SendToView("index.php","showOutput",$output);

	}elseif (isset($_GET["shIpInterBrHide"])) {
		$output = NULL;
		SendToView("index.php","showOutput",$output);
	}

	/**
	*	apply command "sh ip inter br " + view number of interfaces
	*	Return output to be displayed
	*/
	function showIpInterBr()
	{
		// no of interfaces
		$noOfInterfaces = noOfInterfaces();

		//filling output
		$output = "<tr><h4>No. of interfaces : $noOfInterfaces</h4></tr>";

		if($noOfInterfaces != $e100 ){ // no error

			// loop to get the data of each interface
			// NOTE : the no of interface is ( $noOfInterfaces - 1 ) starting from index 1
			for ($i=1; $i < $noOfInterfaces; $i++) {

					$res = interName($i);
					$output = $output."<tr><td><h4>Interface information for </h4></td><td><h4> $res</h4></td></tr>";

					// interface type
					$res = interType($i);
					$output = $output."<tr><td>Type </td><td> $res</td></tr>";

					//admin and operation state
					$res1 = interAdminState($i); // admin
					$res2 = interOperState($i); // operation
					$output = $output."<tr><td>Admin / Operational State </td><td> $res1 / $res2</td></tr>";

					// interface MTU
					$res = interMTU($i);
					$output = $output."<tr><td>MTU </td><td> $res</td></tr>";

					// interface Speeds
					$res = interSpeed($i);
					$output = $output."<tr><td>Speeds </td><td> $res</td></tr>";

					// interface Physical Address
					$res = interPhysicalAddress($i);
					$output = $output."<tr><td>Physical Address </td><td> $res</td></tr>";

					// interface Last Change
					$res = interLastActiveDate($i);
					$output = $output."<tr><td>Last Change </td><td> $res</td></tr>";

					//interface In/Out Octets
					$res1 = interInOctet($i); // admin
					$res2 = interOutOctet($i); // operation
					$output = $output."<tr><td>In/Out Octets </td><td> $res1 / $res2</td></tr>";

					// interface In/Out Unicast
					$res1 = interInUnicast($i); // admin
					$res2 = interOutUnicast($i); // operation
					$output = $output."<tr><td>In/Out Unicast </td><td> $res1 / $res2</td></tr>";

					// interface In/Out Non Unicasts
					$res1 = interInNUnicast($i); // admin
					$res2 = interOutNUnicast($i); // operation
					$output = $output."<tr><td>In/Out Non Unicasts </td><td> $res1 / $res2</td></tr>";

					// interface In/Out Discards
					$res1 = interInDiscard($i); // admin
					$res2 = interOutDiscard($i); // operation
					$output = $output."<tr><td>In/Out Discards </td><td> $res1 / $res2</td></tr>";

					// interface In/Out Errors
					$res1 = interInErrors($i); // admin
					$res2 = interOutErrors($i); // operation
					$output = $output."<tr><td>In/Out Errors </td><td> $res1 / $res2</td></tr>";

					// interface In Unknown Protocols
					$res = interInUnknownProtocols($i);
					$output = $output."<tr><td>In Unknown Protocols </td><td> $res</td></tr>";

					// interface Out Queue Length
					$res = interOutQueueLen($i);
					$output = $output."<tr><td>Out Queue Length </td><td> $res</td></tr>";

			}
			return $output;

		}else{ // incase of error
			return "Can't get Output :(e100) ";
		}
	}

	/**
	*	Used to send data to view
	*	args : newURL : is my new URL to redirect to
	*	name : is the name of Session
	*	value : is the value send attached to that name using session
	*	Auther Moataz Farid
	*	Return : void
	*/
	function SendToView($newURL , $name , $value)
	{
		$_SESSION[$name] = $value;
	    header('Location: '.$newURL);
	}

?>
