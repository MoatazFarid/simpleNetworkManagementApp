<?php 
	include 'commands.php';
	include 'header.php';
		
	//running Session
	session_start();


	// testing that the file included
	// echo $COMMUNITY;

	// //+++++++++++++++++++++++++++++=
	// // setting Configuration 
	// setIP("192.168.1.200");
	// setCommunity("cisco");
	// //+++++++++++++++++++++++++++++=

	// cisco CLI Command
?>	
	<h1>Cisco CLI Command</h1>

	<h3>Show Commands </h3> <!-- head title -->
	<!-- table to Handle commands -->
	<table class="table table-hover">
	<tr><!-- table header -->
		<td><h4>Command</h4></td>
		<td><h4>Option</h4></td>
	</tr>
	<form method="GET" action="handler.php">
		<tr>
			<td>
				<?php 
				//get router name
				$Routername = getRouterName();
				echo $Routername."# Show ip interface brief";
				?>
			</td>
			<td>
				<input type="submit" name="shIpInterBr" value="Run" class="btn btn-success">
			</td>
		</tr>
	</form>
	</table>
