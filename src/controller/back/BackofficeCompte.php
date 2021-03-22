<?php
	require('../core/BddConnexion.php');
	require('../src/model/AccountModel.php');

	class BackofficeCompte {

		// Property
		// ...
		private $bddObj;
		private $connexion;
		private $accountObj;

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
            $paginationData = $this->accountObj->InfoAccountNb($this->connexion);
			return $paginationData;
		}

		public function data()
	    {
			$data = $this->accountObj->InfoAccount($this->limiteOne, $this->limiteTwo, $this->connexion);
			return $data;
		}
	} // End class Home


	// Object
	$objectBackofficeCompte = new BackofficeCompte();

	// Pagination
	$currentPage = $objectBackofficeCompte->pagination();
	$dataMusicPagination = $objectBackofficeCompte->paginationData();

	// InfoUser
	$dataUser = $objectBackofficeCompte->data();

	// Use for the view
	$counter = 0;
	$counterPagination = 1;
	$nbPage = $dataMusicPagination / 10;
	
	// Load the view
	require('../src/view/backView/backofficeCompteView.php');
?>