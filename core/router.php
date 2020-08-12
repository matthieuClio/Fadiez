<?php
	
	$url = '';

	if (isset($_GET['url']) )
	{
		$url = explode('/', $_GET['url']);
	}

	// Maintenance page
	if ($url === '')
	{
		require('../src/controller/front/Maintenance.php');
	}

	// Maintenance page
	else if ($url[0] === 'maintenance')
	{
		require('../src/controller/front/Maintenance.php');
	}

	// Connexion maintenance page
	else if ($url[0] === 'admin')
	{
		require('../src/controller/front/connexionMaintenance.php');
	}

	// Home page
	else if ($url[0] === 'home')
	{
		require('../src/controller/front/Home.php');
	}

	// Pricing page
	else if($url[0] === 'pricing') {
		require('../src/controller/front/Pricing.php');
	}	

	// Error page
	else 
	{
		//require('../src/controller/');
	}
?>