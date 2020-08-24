<?php
	require('../core/BddConnexion.php');
	require('../src/model/Identification.php');

	
	class Backoffice {

		private $bddObj;
		private $loginObj;
		private $connexion;
		private $pseudo;
		private $password;
		private $statut;

		// Constructor
		function __construct() {
			// Object
		 	$this->bddObj = new BddConnexion();
		 	$this->loginObj = new Identification();
		 	$this->connexion = $this->bddObj->Start();
			$this->statut = 'admin';

		 	if(!empty($_POST['email'])) {
		 		$this->email = $_POST['email'];
		 	}
		 	if(!empty($_POST['password'])) {
		 		$this->password = $_POST['password'];
		 	}
	    }

	    function disconnection() {
	    	if(!empty($_SESSION['pseudoUser']) && !empty($_POST['disconnection'])) {

	    		// End the session
	    		$_SESSION = array();
				session_unset();
				session_destroy();

				// Redirect the user to the connexion page
				header('location:backoffice');
	    	}
	    }

	    function alreadylogIn() {
			if(!empty($_SESSION['pseudoUser'])) {
				
				// Load the view
				require('../src/view/backView/backofficeView.php');
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
					// Put the statut user in a $_SESSION
					$_SESSION['statut' ] = $this->loginObj->UserStatut($this->email, $this->connexion);

					// Check statut
					if($_SESSION['statut'] === $this->statut) {
						// Stock the user in a variable $_SESSION
						$_SESSION['pseudoUser'] = $this->email;

						// Update the user ip
						$this->loginObj->IpAddressStorage($this->email, $this->connexion);

						// Load the view
						require('../src/view/backView/backofficeView.php');
					}
					else {
						$_SESSION['error'] = "Vous n'êtes pas un admin";

						// Redirect the user to the connexion page
						header('location:backoffice');
					}

				} // End verification

				// Login information is false
				else if($verification[0] != 1) {
					$_POST['error'] = "Erreur d'identification";

					// Redirect the user to the connexion page
					header('location:backoffice');
				}
			} // End conditions
			else {
				// Already connected
			}

	    } // End function
	} // End class Backoffice


	// Object Backoffice
	$objectBackoffice = new Backoffice();

	// Disconnection
	$objectBackoffice->disconnection();

	// The user is already logged in
	$objectBackoffice->alreadylogIn();

	// The user accesses the page from the form
	$objectBackoffice->logInConnexion();
?>