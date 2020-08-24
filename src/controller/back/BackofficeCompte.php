<?php

	class BackofficeCompte {

		// Property
		// ...

		// Constructor
		// ...

	    // Function
		// ...
	    public function display()
	    {
			require('../src/view/backView/backofficeCompteView.php');
	    }

	} // End class Home


	// Object
	$objectBackofficeCompte = new BackofficeCompte();

	// Display the homeView page
    $objectBackofficeCompte->display();
    
?>