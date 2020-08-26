<?php

	class Pricing {

		// Property
		// ...

		// Constructor
		// ...

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