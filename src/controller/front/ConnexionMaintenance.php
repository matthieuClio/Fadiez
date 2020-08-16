<?php

	class ConnexionMaintenance {

		// Property
		// ...
		private $psw;

		// Constructor
		// ...
		function __construct() {
			// Object
		 	$this->psw = 'fadiezcomingsoon';
	    }

	    // Function
		// ...
	    public function display()
	    {
	    	// Load the view
	    	require('../src/view/frontView/connexionMaintenanceView.php');
		}
		
		public function connexion()
	    {
	    	// Create the connexion
	    	if(!empty($_POST['passwordMaintenance']) && $_POST['passwordMaintenance'] === $this->psw) {
				if(empty($_SESSION['admin'])){
					$_SESSION['admin'] = 'connected';
					header('location: accueil');
				}
			}
			else if(!empty($_POST['passwordMaintenance']) && $_POST['passwordMaintenance'] != $this->psw) {
				?> <script type="text/javascript"> alert('Mot de passe incorrecte')</script>  <?php
			}
		}
		
		public function disconnection()
	    {
			// Deconnexion
	    	if(!empty($_SESSION['admin']) && !empty($_POST['disconnectionMaintenance'])) {
				// End the session
	    		$_SESSION = array();
				session_unset();
				session_destroy();
			}
		}
	} // End class Home


	// Object
	$objectConnexionMaintenance = new ConnexionMaintenance();

	// Connexion
	$objectConnexionMaintenance->connexion();

	// deconnexion
	$objectConnexionMaintenance->disconnection();

	// Display the homeView page
	$objectConnexionMaintenance->display();