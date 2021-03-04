<?php
	require('../core/BddConnexion.php');
	require('../src/model/MusicModel.php');

	class BackofficeMusic {

		// Property
		// ...
		private $bddObj;
        private $connexion;
		private $musicObj;
		private $nbMusic;
		private $validation;
		private $counter;
		private $counterTwo;
		private $status;
		private $id;
		private $tableColumn;
		private $nbElement;

		// Constructor
		// ...
		function __construct() {
			// Object
			$this->bddObj = new BddConnexion();
			$this->musicObj = new Music();
            $this->connexion = $this->bddObj->Start();

			$this->counter = 0;
			$this->counterTwo = 0;
			$this->tableColumn = 0;
			$this->status = [];
			$this->id = [];

			if(!empty($_POST['nbMusic'])) {
				$this->nbMusic = $_POST['nbMusic'];
			}

			if(!empty($_POST['validation'])) {
				$this->validation = $_POST['validation'];
			}
		}

	    // Function
		// ...
		public function data()
	    {
            $data = $this->musicObj->MusicListTreatment($this->connexion);
			return $data;
		}

		public function nbMusic()
	    {
            $data = $this->musicObj->MusicListTreatmentNb($this->connexion);
			return $data;
		}

		public function validationMusic()
	    {
			if(!empty($_POST['validation'])) {

				while($this->counter != $this->nbMusic) {

					if(!empty($_POST[$this->counter])) {
						
						// Stock status value and id
						$this->status[$this->tableColumn] = $_POST[$this->counter];
						$this->id[$this->tableColumn] = $_POST['id'.$this->counter];
						$this->tableColumn++;
					}
					$this->counter++;
				}

				// Nb element
				$this->nbElement = count($this->id);

				// Data modification in the dataBase
				while($this->counterTwo != $this->nbElement) {

					$this->musicObj->MusicUpdate($this->status[$this->counterTwo], $this->id[$this->counterTwo], $this->connexion);
					$this->counterTwo++;
				}

			}
			//$this->nbMusic
		}

	} // End class BackofficeMusic


	// Object
	$objectBackofficeMusic = new BackofficeMusic();

	// Update music status
	$objectBackofficeMusic->validationMusic();

	// Music info
	$nbMusic = $objectBackofficeMusic->nbMusic();

	$dataMusic = $objectBackofficeMusic->data();
	$counter = 0; // Used for the view

	// Display the BackofficeMusicView page
	if(!empty($_SESSION['admin'])) {
		// Load the view
		require('../src/view/backView/backofficeMusicView.php');
	}
	else {
		header('location: maintenance');
	}
?>