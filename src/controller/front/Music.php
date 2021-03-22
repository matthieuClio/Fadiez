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
			$this->accountObj = new Account();
			$this->musicObj = new Music();
            $this->connexion = $this->bddObj->Start();

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
		}

	    // Function
		// ...
		public function infoUser()
	    {
            $this->requete = $this->accountObj->InfoAccountAll($_SESSION['pseudoUser'], $this->connexion);
			$this->infoCompte = $this->requete->fetch();
		}

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

		public function paginationData()
	    {
            $paginationData = $this->musicObj->MusicListIdAll($this->infoCompte['id'], $this->connexion);
			return $paginationData;
		}

		public function data()
	    {
            $data = $this->musicObj->MusicListId($this->infoCompte['id'], $this->limiteOne, $this->limiteTwo, $this->connexion);
			return $data;
		}

	} // End class MusicPublished


	// Object
	$objectMusicPublished = new MusicPublished();

	// Info user
	$objectMusicPublished->infoUser();

	// Pagination
	$currentPage = $objectMusicPublished->pagination();
	$dataMusicPagination = $objectMusicPublished->paginationData();

	// Music info
	$data = $objectMusicPublished->data();

	// Use for the view
	$counter = 0;
	$counterPagination = 1;
	$nbPage = $dataMusicPagination / 10;

	// Display the musicView page
	if(!empty($_SESSION['admin']))
	{
		// Load the view
		require('../src/view/frontView/musicView.php');
	}
	else 
	{
		header('location: maintenance');
	}