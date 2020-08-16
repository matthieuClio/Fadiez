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
		require('../src/controller/front/ConnexionMaintenance.php');
	}

	// Backoffice page
	else if ($url[0] === 'backoffice' && !empty($_SESSION['pseudoUser']) || $url[0] === 'backoffice' && !empty($_POST['submitConnexion']))
	{
		require('../src/controller/back/Backoffice.php');
	}

	// Backoffice connexion page
	else if ($url[0] === 'backoffice' && empty($_SESSION['pseudoUser']))
	{
		require('../src/controller/back/BackofficeConnexion.php');
	}

	// Home page
	else if ($url[0] === 'accueil')
	{
		require('../src/controller/front/Home.php');
	}

	// Pricing page
	else if($url[0] === 'tarification') {
		require('../src/controller/front/Pricing.php');
	}	

	// Error page
	else 
	{
		//require('../src/controller/');
	}
?>