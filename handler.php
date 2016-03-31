<?php
	//running Session
	session_start();

	//including files
	include 'commands.php';
	


	if(isset($_GET["shIpInterBr"])){

		$output = showIpInterBr(); // get output

		SendToView("index.php","showOutput",$output);

	}

	/**
	*	apply command "sh ip inter br " + view number of interfaces 	
	*	Return output to be displayed 
	*/
	function showIpInterBr()
	{
		
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