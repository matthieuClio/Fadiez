<?php
	require('../core/BddConnexion.php');
	require('../src/model/AccountModel.php');

	class BackofficeCompte {

		// Property
		// ...
		private $bddObj;
		private $connexion;
		private $accountObj;
        private $idAccount;
        private $name;
		private $firstName;
		private $email;
        private $infoMessageDataUser;
        
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
            if(!empty($_POST['name'])) {
                $this->name = $_POST['name'];
            }
            if(!empty($_POST['firstName'])) {
                $this->firstName = $_POST['firstName'];
            }
            if(!empty($_POST['email'])) {
                $this->email = $_POST['email'];
            }
            
            // Message Error/success : User
			// infoMessage[0] For error
			// infoMessage[1] For succes
            $this->infoMessageDataUser = array('', '');
		}
        
	    // Function
        // ...
        public function blockUser()
	    {
            if(!empty($_POST['blockAccount'])) {
                $data = $this->accountObj->BlockUser($this->idAccount, $this->connexion);
            }
        }

        public function unblockUser()
	    {
            if(!empty($_POST['unblockAccount'])) {
                $data = $this->accountObj->unblockUser($this->idAccount, $this->connexion);
            }
        }

        public function modificationUserData()
	    {
			if(!empty($_POST['modification'])) {
                // Current email user
                $requete = $this->accountObj->InfoAccountUser($this->idAccount, $this->connexion);
                $oldEmail = $requete->fetch();

                // Same email result
				$verification = $this->accountObj->EmailExist($this->email, $this->connexion);
                
				// Email is not already taken or email is the same than email in database
				if($verification == 0 || $oldEmail['email'] == $this->email) {
					$this->accountObj->ModificationAccountUser($this->idAccount, $this->name, $this->firstName, $this->email, $this->connexion);
                    $this->infoMessageDataUser[1] = "Les modifications ont bien été effectués";
                    
				} else {
					$this->infoMessageDataUser[0] = "L'email rentré est déjà pris";
				}
			}
			return $this->infoMessageDataUser;
		} // End function modificationUserData

		public function data()
	    {
            $data = $this->accountObj->InfoAccountUser($this->idAccount, $this->connexion);
			return $data;
        }
        
	} // End class Home


	// Object
    $objectBackofficeCompte = new BackofficeCompte();
    
    // Modication data user
    $infoMessageDataUser = $objectBackofficeCompte->modificationUserData();

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