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
		private $submitted;
		private $counter;
		private $counterTwo;
		private $status;
		private $id;
		private $tableColumn;
		private $nbElement;

		// Pagination property
		private $limiteOne;
		private $limiteTwo;
		private $previous;
		private $current;
		private $next;
		private $pageSelect;
		private $validation;
		private $currentPage;
		private $currentPagePost;

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

			// Other variable
			$this->limiteOne = 0;
			$this->limiteTwo = 10;
			$this->currentPage = 1;

			// Variable POST
			if(!empty($_POST['previous'])) 
			{
				$this->previous = $_POST['previous'];
			}
			if(!empty($_POST['current'])) 
			{
				$this->current = $_POST['current'];
			}
			if(!empty($_POST['next'])) 
			{
				$this->next = $_POST['next'];
			}
			if(!empty($_POST['pageSelect'])) 
			{
				$this->pageSelect = $_POST['pageSelect'];
			}
			if(!empty($_POST['validation'])) 
			{
				$this->validation = $_POST['validation'];
			}
			if(!empty($_POST['currentPagePost'])) 
			{
				$this->currentPagePost = $_POST['currentPagePost'];
			}

			if(!empty($_POST['nbMusic'])) 
			{
				$this->nbMusic = $_POST['nbMusic'];
			}

			if(!empty($_POST['submitted'])) 
			{
				$this->submitted = $_POST['submitted'];
			}
		}

	    // Function
		// ...
		public function pagination()
	    {
            if(!empty($_POST['validation'])) 
			{
				$this->currentPage = $_POST['pageSelect'];
				$this->limiteOne = $this->currentPage * 10 -10;
			}
			if(!empty($_POST['next'])) 
			{
				$this->currentPage = $_POST['currentPagePost']+1;
				$this->limiteOne = $this->currentPage * 10 -10;
			}
			if(!empty($_POST['previous'])) 
			{
				$this->currentPage = $_POST['currentPagePost']-1;
				$this->limiteOne = $this->currentPage * 10 -10;
			}
			return $this->currentPage;
		}

		public function data()
	    {
            $data = $this->musicObj->MusicListTreatment($this->limiteOne, $this->limiteTwo, $this->connexion);
			return $data;
		}

		public function nbMusic()
	    {
            $data = $this->musicObj->MusicListTreatmentNb($this->connexion);
			return $data;
		}

		public function validationMusic()
	    {
			if(!empty($_POST['submitted'])) 
			{

				while($this->counter != $this->nbMusic) 
				{

					if(!empty($_POST[$this->counter])) 
					{
						
						// Stock status value and id
						$this->status[$this->tableColumn] = $_POST[$this->counter];
						$this->id[$this->tableColumn] = $_POST['id'.$this->counter];
						$this->tableColumn++;
					}
					$this->counter++;
				}

				// Get all imageName for validate music


				// Nb element
				$this->nbElement = count($this->id);

				// Data modification in the dataBase
				while($this->counterTwo != $this->nbElement) 
				{
					$this->musicObj->MusicUpdate($this->status[$this->counterTwo], $this->id[$this->counterTwo], $this->connexion);
					$this->counterTwo++;
				}
			}
		} // End function validationMusic

	} // End class BackofficeMusic


	// Object
	$objectBackofficeMusic = new BackofficeMusic();

	// Update music status
	$objectBackofficeMusic->validationMusic();

	// Nb music
	$nbMusic = $objectBackofficeMusic->nbMusic();

	// Pagination
	$currentPage = $objectBackofficeMusic->pagination();
	$dataMusicPagination = $nbMusic;

	// Music info
	$dataMusic = $objectBackofficeMusic->data();

	// Use for the view
	$counter = 0;
	$counterPagination = 1;
	$nbPage = $dataMusicPagination / 10;

	// Display the BackofficeMusicView page
	if(!empty($_SESSION['admin'])) {
		// Load the view
		require('../src/view/backView/backofficeMusicView.php');
	}
	else {
		header('location: maintenance');
	}
?>