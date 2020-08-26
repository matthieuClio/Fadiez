<?php
	require('../core/BddConnexion.php');
	require('../src/model/Account.php');

	class BackofficeCompte {

		// Property
		// ...
		private $bddObj;
		private $connexion;
		private $accountObj;
        private $idAccount;
        private $blockAccount;
        private $unblockAccount;

		// Constructor
		// ...
		function __construct() {
			// Object
			$this->bddObj = new BddConnexion();
			$this->accountObj = new Account();
            $this->connexion = $this->bddObj->Start();
            
            if(!empty($_POST['idAccount'])) {
                $this->idAccount = $_POST['idAccount'];
            }
            if(!empty($_POST['blockAccount'])) {
                $this->blockAccount = $_POST['blockAccount'];
            }

            if(!empty($_POST['unblockAccount'])) {
                $this->unblockAccount = $_POST['unblockAccount'];
            }
		}
        
	    // Function
        // ...
        public function blockUser()
	    {
            if(!empty($_POST['blockAccount'])) {
                $data = $this->accountObj->BlockUser($this->idAccount, $this->connexion);
                return $data;
            }
        }

        public function unblockUser()
	    {
            if(!empty($_POST['unblockAccount'])) {
                $data = $this->accountObj->unblockUser($this->idAccount, $this->connexion);
                return $data;
            }
        }

		public function data()
	    {
            $data = $this->accountObj->InfoAccountUser($this->idAccount, $this->connexion);
			return $data;
        }
        
	} // End class Home


	// Object
	$objectBackofficeCompte = new BackofficeCompte();

    // Block user
	$objectBackofficeCompte->blockUser();
    
    // Unblock user
    $objectBackofficeCompte->unblockUser();
    
	// Info user
	$dataUser = $objectBackofficeCompte->data();
    $info = $dataUser->fetch();
    
    // Load the view
    require('../src/view/backView/backofficeCompteInfoView.php');
?>