<?php
	require('../core/BddConnexion.php');
	require('../src/model/AccountModel.php');

	class AccountUser {

		// Property
		// ...
		private $bddObj;
		private $accountObj;
		private $connexion;
		private $mailAccount;
		private $idAccount;
		private $name;
		private $firstName;
		private $email;

		// Constructor
		// ...
		function __construct() {
			// Object
			$this->bddObj = new BddConnexion();
			$this->accountObj = new Account();
			$this->connexion = $this->bddObj->Start();
			
			if(!empty($_SESSION['pseudoUser'])) {
				$this->mailAccount = $_SESSION['pseudoUser'];
			}
			if(!empty($_POST['idUser'])) {
				$this->idAccount = $_POST['idUser'];
			}
			if(!empty($_POST['name'])) {
				$this->name = $_POST['name'];
			}
			if(!empty($_POST['firstName'])) {
				$this->firstName = $_POST['firstName'];
			}
			if(!empty($_POST['email'])) {
				$this->email = $_POST['email'];
			}
		}

	    // Function
		// ...
		public function data()
	    {
            $data = $this->accountObj->InfoAccountUserByName($this->mailAccount, $this->connexion);
			return $data;
		}
		
		public function modification()
	    {
			if(!empty($_POST['modification'])) {
				$this->accountObj->ModificationAccountUser($this->idAccount, $this->name, $this->firstName, $this->email, $this->connexion);

				// Update the Pseudo user session
				if(!empty($_POST['email'])) {
					$_SESSION['pseudoUser'] = $this->email;
					header('location: compte');
				}
			}
        }
		
		public function disconnection() {
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
	$objectAccount = new AccountUser();

	// Modification
	$objectAccount->modification();

	// Disconnection
	$objectAccount->disconnection();

	// Info user
	$dataUser = $objectAccount->data();
	$info = $dataUser->fetch();
	
	// Display the accountView page
	if(!empty($_SESSION['admin'])) {
		// Load the view
		require('../src/view/frontView/accountView.php');
	}
	else {
		header('location: maintenance');
	}