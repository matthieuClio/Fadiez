<?php
	require('../core/Bdd_connexion.php');
	require('../src/model/Home.php');

	class Home {

		// Property
		// ...
		private $bddObj;
		private $connexion;

		// Constructor
		// ...
		function __construct() {
			// Object
		 	$this->bddObj = new bdd_connexion();
		 	$this->connexion = $this->bddObj->Start();
	    }

	    // Function
		// ...
	    public function display()
	    {
	    	// Load the view
	    	require('../src/view/front/homeView.php');
	    }

	} // End class Home


	// Object
	$objectHome = new Home();

	// Operation
	$objectHome->display();