<?php
	require('../core/BddConnexion.php');
	require('../src/model/AccountModel.php');

	class BackofficeCompte {

		// Property
		// ...
		private $bddObj;
		private $connexion;
		private $accountObj;
		
		// Constructor
		// ...
		function __construct() {
			// Object
			$this->bddObj = new BddConnexion();
			$this->accountObj = new Account();
			$this->connexion = $this->bddObj->Start();
		}

	    // Function
		// ...
		public function data()
	    {
			$data = $this->accountObj->InfoAccount($this->connexion);

			return $data;
		}
	} // End class Home


	// Object
	$objectBackofficeCompte = new BackofficeCompte();

	// InfoUser
	$dataUser = $objectBackofficeCompte->data();
	
	// Load the view
	require('../src/view/backView/backofficeCompteView.php');
    
?>