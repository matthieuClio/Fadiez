<?php
	//require('../core/BddConnexion.php');
    
	class Pricing {

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
			require('../src/view/frontView/pricingView.php');
			}
	    	else {
				header('location: maintenance');
			}
	    }

	} // End class Home


	// Object
	$objectPricing = new Pricing();

	// Operation
	$objectPricing->display();