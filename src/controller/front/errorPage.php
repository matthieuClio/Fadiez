<?php

	class ErrorPage {

		// Property
		// ...

		// Constructor
		// ...

	    // Function
		// ...
	    public function display()
	    {
	    	// Load the view
	    	require('../src/view/frontView/errorPageView.php');
	    }

	} // End class Home


	// Object
	$objectPageError = new ErrorPage();

	// Display the homeView page
	$objectPageError->display();