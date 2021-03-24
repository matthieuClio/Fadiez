<?php
	
	$url = '';

	if (isset($_GET['url']) )
	{
		$url = explode('/', $_GET['url']);
	}

	// Maintenance page (url 1)
	if ($url === '')
	{
		require('../src/controller/front/Maintenance.php');
	}

	// Maintenance page (url 2)
	else if ($url[0] === 'maintenance')
	{
		require('../src/controller/front/Maintenance.php');
	}

	// Connexion maintenance page
	else if ($url[0] === 'admin')
	{
		require('../src/controller/front/ConnexionMaintenance.php');
	}

	// Backoffice
	// ..........


	// Backoffice slider page
	else if ($url[0] === 'backoffice' && !empty($url[1]) && $url[1] === 'slider' && !empty($_SESSION['pseudoUser']))
	{
		require('../src/controller/back/BackofficeSlider.php');
	}

	// Backoffice music page
	else if ($url[0] === 'backoffice' && !empty($url[1]) && $url[1] === 'musique' && !empty($_SESSION['pseudoUser']))
	{
		require('../src/controller/back/BackofficeMusic.php');
	}

	// Backoffice info account page
	else if ($url[0] === 'backoffice' && !empty($url[1]) && $url[1] === 'info' && !empty($_SESSION['pseudoUser']))
	{
		require('../src/controller/back/BackofficeCompteInfo.php');
	}

	// Backoffice account page
	else if ($url[0] === 'backoffice' && !empty($url[1]) && $url[1] === 'compte' && !empty($_SESSION['pseudoUser']))
	{
		require('../src/controller/back/BackofficeCompte.php');
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

	// Front
	// .....

	// Home page
	else if ($url[0] === 'accueil')
	{
		require('../src/controller/front/Home.php');
	}

	// Pricing page
	else if($url[0] === 'tarification') {
		require('../src/controller/front/Pricing.php');
	}	

	// Music upload page
	else if($url[0] === 'upload') {
		require('../src/controller/front/Upload.php');
	}

	// Music page
	else if($url[0] === 'music') {
		require('../src/controller/front/Music.php');
	}

	// Inscription compte page
	else if($url[0] === 'inscription') {
		require('../src/controller/front/CreateAccount.php');
	}

	// Login page
	else if($url[0] === 'connexion') {
		require('../src/controller/front/Login.php');
	}

	// Account user page
	else if($url[0] === 'compte') {
		require('../src/controller/front/Account.php');
	}

	// Error page
	else 
	{
		require('../src/controller/front/ErrorPage.php');
	}
?>