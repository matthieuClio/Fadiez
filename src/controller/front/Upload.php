<?php

	class Upload {

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
				require('../src/view/frontView/uploadView.php');
			}
	    	else {
				header('location: maintenance');
			}
	    }

	} // End class Home


	// Object
	$objectUpload = new Upload();

	// Operation
	$objectUpload->display();