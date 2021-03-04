<?php
	require('../core/BddConnexion.php');
	require('../src/model/AccountModel.php');
	require('../src/model/MusicModel.php');

	class MusicPublished {

		// Property
        // ...
        private $bddObj;
		private $musicObj;
		private $accountObj;
        private $connexion;
		private $requete;
		private $infoCompte;

		// Constructor
		// ...
		function __construct() {
			// Object
			$this->bddObj = new BddConnexion();
			$this->accountObj = new Account();
			$this->musicObj = new Music();
            $this->connexion = $this->bddObj->Start();
		}

	    // Function
		// ...
		public function data()
	    {
			$this->requete = $this->accountObj->InfoAccountAll($_SESSION['pseudoUser'], $this->connexion);
			$this->infoCompte = $this->requete->fetch();

			?><script>console.log('<?php echo $this->infoCompte['id'];?>');</script> <?php

            $data = $this->musicObj->MusicListId($this->infoCompte['id'], $this->connexion);
			return $data;
		}

	} // End class Home


	// Object
	$objectMusicPublished = new MusicPublished();

	// Music info
	$dataMusic = $objectMusicPublished->data();
	$counter = 0; // Used for the view

	// Display the musicView page
	if(!empty($_SESSION['admin'])) {
		// Load the view
		require('../src/view/frontView/musicView.php');
	}
	else {
		header('location: maintenance');
	}