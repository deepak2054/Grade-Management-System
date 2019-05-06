<?php
	require_once("variables.php");
	$connection=mysqli_connect(SERVER,USERNAME,PASSWORD,DBNAME);
	if(!$connection)
	{
		die('Cannot Connect: '.(mysqli_error($connection)));
	}

?>