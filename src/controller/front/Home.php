<?php
	require('../core/BddConnexion.php');
	require('../src/model/MusicModel.php');
	require('../src/model/SliderModel.php');
	require('../src/model/AccountModel.php');

	class Home {

		// Property
        // ...
        private $bddObj;
        private $musicObj;
        private $accountObj;
        private $connexion;
        private $pseudoUser;

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
			$this->sliderObj = new SliderModel();
			$this->accountObj = new Account();
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
			// Variable SESSION
			if(!empty($_SESSION['pseudoUser'])) 
			{
				$this->pseudoUser = $_SESSION['pseudoUser'];
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

		public function paginationData()
	    {
            $paginationData = $this->musicObj->MusicListNb($this->connexion);
			return $paginationData;
		}

		public function dataMusic()
	    {
            $data = $this->musicObj->MusicList($this->limiteOne, $this->limiteTwo, $this->connexion);
			return $data;
		}

		public function slider() 
		{
			$data = $this->sliderObj->sliderDataAll($this->connexion);
			return $data;
		}

		public function dataAccount() {
			$data = $this->accountObj->InfoAccountAll($this->pseudoUser, $this->connexion);
			$data = $data->fetch();
			return $data['premium'];
		}

	} // End class Home


	// Object
	$objectHome = new Home();

	// Pagination
	$currentPage = $objectHome->pagination();
	$dataMusicPagination = $objectHome->paginationData();

	// Music info
	$dataMusic = $objectHome->dataMusic();

	// Slider info
	$dataSlider = $objectHome->slider();

	// Account info
	if(!empty($_SESSION['pseudoUser']))
	{
		$dataAccount = $objectHome->dataAccount();
	}

	// Use for the view
	$counter = 0;
	$counterPagination = 1;
	$nbPage = $dataMusicPagination / 10;

	// Display the homeView page
	if(!empty($_SESSION['admin'])) {
		// Load the view
		require('../src/view/frontView/homeView.php');
	}
	else {
		header('location: maintenance');
	}
?>