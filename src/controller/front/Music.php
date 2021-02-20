<?php
	require('../core/BddConnexion.php');
	require('../src/model/MusicModel.php');

	class MusicPublished {

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

		// Property
		// ...

		// Constructor
		// ...

	    // Function
		// ...

		public function data()
	    {
            $data = $this->musicObj->MusicList( $this->connexion);
			return $data;
		}

	} // End class Home


	// Object
	$objectMusicPublished = new MusicPublished();

	// Music info
	//$dataMusic = $objectHome->data();
	//$counter = 0; // Used for the view

	// Display the musicView page
	if(!empty($_SESSION['admin'])) {
		// Load the view
		require('../src/view/frontView/musicView.php');
	}
	else {
		header('location: maintenance');
	}