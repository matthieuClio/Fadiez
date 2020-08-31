<?php
	require('../core/BddConnexion.php');
	require('../src/model/Identification.php');


	class Login {

		private $bddObj;
		private $loginObj;
		private $connexion;
		private $email;
		private $password;

		// Property
		// ...

		// Constructor
		// ...
		function __construct() {
			// Object
		 	$this->bddObj = new BddConnexion();
		 	$this->loginObj = new Identification();
		 	$this->connexion = $this->bddObj->Start();

		 	if(!empty($_POST['email'])) {
		 		$this->email = $_POST['email'];
		 	}
		 	if(!empty($_POST['password'])) {
		 		$this->password = $_POST['password'];
		 	}
	    }

	    // Function
		// ...
	    public function display()
	    {
			if(!empty($_SESSION['admin'])) {
				// Load the view
				require('../src/view/frontView/loginView.php');
			}
	    	else {
				header('location: maintenance');
			}
		}
		
		function logInConnexion() {
	    	// The user accesses the page from the form
	    	if(!empty($_POST['submitConnexion']) && empty($_SESSION['pseudoUser'])) {

	    		// We get the unique salt per user
				$salt = $this->loginObj->SaltUser($this->email, $this->connexion);

				// We encrypt the password
				$passwordCrypte = crypt($this->password, $salt);

				// Check the email and password entered
				$verification = $this->loginObj->UserInformation($this->email, $passwordCrypte, $this->connexion);

				// Login information is correct
				if($verification[0] == 1) {	

					// Stock the user in a variable $_SESSION
					$_SESSION['pseudoUser'] = $this->email;

					// Update the user ip
					$this->loginObj->IpAddressStorage($this->email, $this->connexion);

					$_SESSION['error'] = "";

					// Redirect on the account page
					header('location:compte');
				} // End verification

				// Login information is false
				else if($verification[0] != 1) {
					$_SESSION['error'] = "Les informations rentrés sont incorrectes";
				}
			} // End conditions
			else if(!empty($_SESSION['pseudoUser'])) {
				// Already connected
				// Redirect on the account page
				header('location:compte');
			}
	    } // End function logInConnexion

	} // End class Home


	// Object
	$objecLogin = new Login();

	// Login
	$objecLogin->logInConnexion();

	// Display the homeView page
	$objecLogin->display();