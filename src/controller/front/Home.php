<?php
	require('../core/BddConnexion.php');
	require('../src/model/MusicModel.php');

	class Home {

		// Property
        // ...
        private $bddObj;
        private $connexion;

		// Constructor
		// ...
		function __construct() {
			// Object
			$this->bddObj = new BddConnexion();
			$this->musicObj = new Music();
            $this->connexion = $this->bddObj->Start();
		}

	    // Function
		// ...
		public function data()
	    {
            $data = $this->musicObj->MusicList($this->connexion);
			return $data;
		}

	} // End class Home


	// Object
	$objectHome = new Home();

	// Music info
	$dataMusic = $objectHome->data();
	$counter = 0; // Used for the view

	// Display the homeView page
	if(!empty($_SESSION['admin'])) {
		// Load the view
		require('../src/view/frontView/homeView.php');
	}
	else {
		header('location: maintenance');
	}
?>