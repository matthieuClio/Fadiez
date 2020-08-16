<?php
	class Home {

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