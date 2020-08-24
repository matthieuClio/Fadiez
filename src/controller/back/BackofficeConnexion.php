<?php

	class BackofficeConnexion {

		// Property
		// ...

		// Constructor
		// ...

	    // Function
		// ...
	    public function display()
	    {
			require('../src/view/backView/backofficeConnexionView.php');
	    }

	} // End class Home


	// Object
	$objectBackofficeConnexion = new BackofficeConnexion();

	// Display the homeView page
	$objectBackofficeConnexion->display();
?>