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
		private $oldPassword;
		private $newPassword;
		private $infoMessage;
		private $infoMessageDataUser;

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

			// Modification data
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
			// Modification password
			if(!empty($_POST['oldPassword'])) {
				$this->oldPassword = $_POST['oldPassword'];
			}
			if(!empty($_POST['newPassword'])) {
				$this->newPassword = $_POST['newPassword'];
			}

			// Message Error/success : User
			// infoMessage[0] For error
			// infoMessage[1] For succes
			$this->infoMessageDataUser = array('', '');

			// Message Error/success : Password
			// infoMessage[0] For error
			// infoMessage[1] For succes
			$this->infoMessage = array('', '');

			
		}

	    // Function
		// ...
		public function data()
	    {
            $data = $this->accountObj->InfoAccountUserByName($this->mailAccount, $this->connexion);
			return $data;
		}
		
		public function modificationUserData()
	    {
			if(!empty($_POST['modification'])) {
				$verification = $this->accountObj->EmailExist($this->email, $this->connexion);

				// Email is not already taken
				if($verification == 0) {
					$this->accountObj->ModificationAccountUser($this->idAccount, $this->name, $this->firstName, $this->email, $this->connexion);
					$this->infoMessageDataUser[1] = "Les modifications ont bien été effectués";
					
					// Update the Pseudo user session
					if(!empty($_POST['email'])) {
						$_SESSION['pseudoUser'] = $this->email;
					}
				} else {
					$this->infoMessageDataUser[0] = "L'email rentré est déjà pris";
				}
			}
			return $this->infoMessageDataUser;
		} // End function modificationUserData
		
		public function modificationUserPassword()
	    {
			if(!empty($_POST['modificationPassword'])) {
				// Stock user info account
				$requete = $this->accountObj->InfoAccountUser($this->idAccount, $this->connexion);
				$userInfo = $requete->fetch();

				// We encrypt password entered by user
				$oldPasswordCrypte = crypt($this->oldPassword, $userInfo['salt']);

				// Check if old password is correct
				if($oldPasswordCrypte == $userInfo['password']) {

					// Verification complexity new password (Maj, 12 caracteres, special caracteres)
                    if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{12,}$#', $this->newPassword)) {
						
						// We define the unique salt per user
                        $text = substr(str_shuffle('0123456789abcdefghjkmnpqrstuvwxyz'), 0, 20);
						$salt = '$2a$07$'.$text.'$';
						
						// We encrypt the new password
						$newPasswordCrypt = crypt($this->newPassword, $salt);
						
						// Update password user account
						$this->accountObj->ModificationAccountUserPassword($this->idAccount, $newPasswordCrypt, $salt, $this->connexion);

						$this->infoMessage[1] = "Le mot de passe à bien été mis à jour";
					} else {
						$this->infoMessage[0] = "La complexité du nouveau password est insuffisant.";
					}
				} else {
					$this->infoMessage[0] = "L'ancien mot de passe entré ne correspond pas.";
				}
			}
			return $this->infoMessage;
        } // End function modificationUserPassword
		
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

	// Modification data user
	$infoMessageDataUser = $objectAccount->modificationUserData();

	// Modification password user
	$infoMessage = $objectAccount->modificationUserPassword();

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