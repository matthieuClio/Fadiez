<?php

	class Maintenance {

		// Property
		// ...

		// Constructor
		// ...

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