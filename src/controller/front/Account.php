<?php
	class Account {

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
				require('../src/view/frontView/accountView.php');
			}
	    	else {
				header('location: maintenance');
			}
		}
		
		function disconnection() {
	    	if(!empty($_SESSION['pseudoUser']) && !empty($_POST['disconnection'])) {

	    		// End the session
	    		// $_SESSION = array();
				// session_unset();
				// session_destroy();
				$_SESSION['pseudoUser'] = array();

				// Redirect the user to the connexion page
				header('location:connexion');
	    	}
	    }

	} // End class Home


	// Object
	$objectAccount = new Account();

	// Disconnection
	$objectAccount->disconnection();

	// Display the homeView page
	$objectAccount->display();