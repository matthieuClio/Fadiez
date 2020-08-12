<?php

	class Maintenance {

		// Property
		// ...
		// private $bddObj;
		// private $connexion;

		// Constructor
		// ...
		function __construct() {
			// Object
		 	//$this->bddObj = new bdd_connexion();
		 	//$this->connexion = $this->bddObj->Start();
	    }

	    // Function
		// ...
	    public function display()
	    {
	    	// Load the view
	    	require('../src/view/frontView/maintenanceView.php');
	    }

	} // End class Home


	// Object
	$objectMaintenance = new Maintenance();

	// Display the homeView page
	$objectMaintenance->display();