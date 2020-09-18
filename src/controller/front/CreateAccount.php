<?php
    require('../core/BddConnexion.php');
	require('../src/model/AccountModel.php');

	class CreateAccount {

		// Property
        // ...
        private $bddObj;
        private $accountObj;
        private $connexion;

		// Constructor
		// ...
		function __construct() {
            // Object
            $this->bddObj = new BddConnexion();
            $this->accountObj = new Account();
            $this->connexion = $this->bddObj->Start();

            // Variable
            // POST Creation account
			if(!empty($_POST['name'])) {
				$this->name = $_POST['name'];
			}
			if(!empty($_POST['firstName'])) {
				$this->firstName = $_POST['firstName'];
			}
			if(!empty($_POST['email'])) {
				$this->email = $_POST['email'];
            }
            if(!empty($_POST['password'])) {
				$this->password = $_POST['password'];
            }
            if(!empty($_POST['passwordConfirmation'])) {
				$this->passwordConfirmation = $_POST['passwordConfirmation'];
            }

            if(!empty($_POST['registrationValidation'])) {
				$this->registrationValidation = $_POST['registrationValidation'];
            }
	    }

	    // Function
		// ...
	    public function display()
	    {
            if(!empty($_SESSION['admin'])) {
				// Load the view
                require('../src/view/frontView/createAccountView.php');
			}
	    	else {
				header('location: maintenance');
			}
        }
        
        public function createAccount()
	    {
            // Verification fields
            if(!empty($_POST['registrationValidation'])
            && !empty($_POST['name']) 
            && !empty($_POST['firstName']) 
            && !empty($_POST['email']) 
            && !empty($_POST['password']) 
            && !empty($_POST['passwordConfirmation'])) {
                
                // Both password are the same
                if($_POST['password'] == $_POST['passwordConfirmation']) {

                    // Verification complexity password (Maj, 12 caracteres, special caracteres)
                    if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{12,}$#', $this->password)) {

                        // We define the unique salt per user
                        $text = substr(str_shuffle('0123456789abcdefghjkmnpqrstuvwxyz'), 0, 20);
                        $salt = '$2a$07$'.$text.'$';

                        // We encrypt the password
                        $newPassword = crypt($this->password, $salt);

                        // Store the same email
                        $checkEmail = 
                            $this->accountObj->EmailExist($this->email, $this->connexion);

                        // Email is not already taked
                        if($checkEmail == 0) {

                            // Ip address of the user
                            $ipAdressUser = $_SERVER['REMOTE_ADDR'];
                
                            // Create the new account
                            $this->accountObj->CreationCompte(
                                $this->name, 
                                $this->firstName, 
                                $this->email, 
                                $newPassword,
                                $salt, 
                                $ipAdressUser,
                                $this->connexion);
                            
                            // Hide error message
                            if(!empty($_SESSION['erreurCreateAccount'])){ 
                                $_SESSION['erreurCreateAccount'] = "";
                            }

                            // Redirect on the account page
                            header('location:compte');

                        // Email is already taked
                        } else if($checkEmail != 0) {
                            $_SESSION['erreurCreateAccount'] = "L'email est déjà utilisé";
                        }
                    } // End verification complexity 
                    else {
                        $_SESSION['erreurCreateAccount'] = "Le mot de passe n'est pas conforme";
                    }
                    
                // Both password are differents
                } else if($_POST['password'] != $_POST['passwordConfirmation']) {
                    $_SESSION['erreurCreateAccount'] = "Le mot de passe et la confirmation ne sont pas identiques";
                }
                
            } // End verification all fields
               
        } // End createAccount function

    } // End class Home
    

	// Object
	$objectCreateAccount = new CreateAccount();

    // Create an account
	$objectCreateAccount->createAccount();

	// Display the createAccountView page
    $objectCreateAccount->display();