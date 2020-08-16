<?php
	require('../core/BddConnexion.php');
	require('../src/model/Identification.php');

	
	class Backoffice {

		private $bddObj;
		private $login;
		private $connexion;
		private $pseudo;
		private $password;

		// Constructor
		function __construct() {
			// Object
		 	$this->bddObj = new BddConnexion();
		 	$this->login = new Identification();
		 	$this->connexion = $this->bddObj->Start();

		 	if(!empty($_POST['pseudo'])) {
		 		$this->pseudo = $_POST['pseudo'];
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
				$salt = $this->login->SaltUser($this->pseudo, $this->connexion);

				// We encrypt the password
				$passwordCrypte = crypt($this->password, $salt);

				// Check the nickname and password entered
				$verification = $this->login->UserInformation($this->pseudo, $passwordCrypte, $this->connexion);

				// Login information is correct
				if($verification[0] == 1) {	
					// Check statut then stock in a $_SESSION
					$_SESSION['statut' ] = $this->login->UserStatut($this->pseudo, $this->connexion);

					// Stock the user in a variable $_SESSION
					$_SESSION['pseudoUser'] = $this->pseudo;

					// Update the user ip
					$this->login->IpAddressStorage($this->pseudo, $this->connexion);

					// Load the view
					require('../src/view/backView/backofficeView.php');

				} // End verification

				// Login information is false
				else if($verification[0] != 1) {
					$_SESSION['error'] = "Erreur d'identification";

					// Redirect the user to the connexion page
					header('location:backoffice');
				}
			} // End conditions
			else {
				// Already connected
			}

	    } // End function
	} // End class Backoffice


	// Object BackofficeBillet
	$objectBackoffice = new Backoffice();

	// Disconnection
	$objectBackoffice->disconnection();

	// The user is already logged in
	$objectBackoffice->alreadylogIn();

	// The user accesses the page from the form
	$objectBackoffice->logInConnexion();
?>