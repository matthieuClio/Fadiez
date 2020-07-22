<?php
	
	$url = '';

	if (isset($_GET['url']) )
	{
		$url = explode('/', $_GET['url']);
	}

	// Home page
	if ($url == '')
	{
		require('../src/controller/home.php');
	}

	// Error page
	else 
	{
		//require('../src/controller/');
	}
?>