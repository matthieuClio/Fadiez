<?php
	//require('../core/BddConnexion.php');
	//require('../src/model/HomeModel.php');

	class Home {

		// Property
		// ...
		private $bddObj;
		private $connexion;

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
			if(!empty($_SESSION['admin'])) {
				// Load the view
				require('../src/view/frontView/homeView.php');
			}
	    	else {
				header('location: maintenance');
			}
	    }

	} // End class Home


	// Object
	$objectHome = new Home();

	// Display the homeView page
	$objectHome->display();