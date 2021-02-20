<?php
	require('../core/BddConnexion.php');
	require('../src/model/AccountModel.php');
	require('../src/model/MusicModel.php');

	class Upload 
	{
		// Property
		// ...
		private $bddObj;
		private $accountObj;
		private $musicObj;
		private $music;
		private $artist;
		private $files;
		private $fileSize;
		private $maxSize;
		private $targetFolder;
		private $type;
		private $acceptedType;
		private $infoMessage;
		private $uploadAuthorized;
		private $accountRequest;
		private $musicUse;
		private $dataUser;
		private $dataMusic;

		// Constructor
		// ...
		function __construct() 
		{
			// Object
			$this->bddObj = new BddConnexion();
			$this->accountObj = new Account();
			$this->musicObj = new Music();
			$this->connexion = $this->bddObj->Start();

			// POST - FILES variables
			if(!empty($_POST['music']))
			{
				$this->music = $_POST['music'];
			}
			if(!empty($_POST['artist']))
			{
				$this->artist = $_POST['artist'];
			}
			if(!empty($_FILES['upload']))
			{
				$this->files = $_FILES['upload'];
			}
			if(!empty($_FILES['upload']))
			{
				$this->fileSize = $this->files['tmp_name'];
			}
			
			$this->maxSize = 20048576; // 20MO
			$this->targetFolder = '../public/music/musicValidation';
			$this->targetFile = $this->targetFolder.'/'.basename($this->files["name"]);
			$this->type = new finfo(FILEINFO_MIME_TYPE);
			$this->acceptedType = array(
				'mp3' => 'audio/mpeg',
			);
			$this->uploadAuthorized = true;

			// Request
			$this->accountRequest = $this->accountObj->InfoAccountAll($_SESSION['pseudoUser'], $this->connexion);
			$this->dataUser = $this->accountRequest->fetch();

			$this->musicUse = $this->musicObj->MusicName($this->music, $this->connexion);

			// Message Error/success : upload
			// infoMessage[0] For error
			// infoMessage[1] For succes
			$this->infoMessage = array('', '');
		}

	    // Function
		// ...
		public function upload()
		{
			if(!empty($_POST['submitButton'])
			&& !empty($_POST['music'])
			&& !empty($_POST['artist'])
			&& !empty($_FILES['upload'])
			) 
			{
				// Verification file size
				if ($this->fileSize > $this->maxSize)
				{
					$this->infoMessage[0] = 'La taille du fichier est trop importante';
					$this->uploadAuthorized = false;
				}

				// Verification file name already taken
				if($this->musicUse != 0)
				{
					// Not other error message
					if(empty($this->infoMessage[0])) {
						$this->infoMessage[0] = 'Le nom de la musique est déjà pris';
					}
					$this->uploadAuthorized = false;
				}

				// Verification file existence
				if(file_exists($this->targetFolder.'/'.$this->files['name']))
				{
					// Not other error message
					if(empty($this->infoMessage[0])) {
						$this->infoMessage[0] = 'Un fichier possédant le même nom existe déjà';
					}
					$this->uploadAuthorized = false;
				}
				else
				{
					?> <script type="text/javascript">console.log('not already exist');</script><?php
				}

				// Verification type file
				if(false === $ext = array_search(
					$this->type->file($this->files['tmp_name']),
	
					// File accpeted
					$this->acceptedType,
					true
				))
				{
					// Not other error message
					if(empty($this->infoMessage[0])) {
						$this->infoMessage[0] = 'Le format du fichier est incorrecte (seul les fichiers mp3 sont autorisés).';
					}
					
					$this->uploadAuthorized = false;
				}

				// Upload
				if($this->uploadAuthorized)
				{
					// Insert into database
					$this->musicObj->MusicAdd($this->music, $this->artist, $this->files['name'], $this->dataUser['id'], $this->connexion);
					
					// Upload the file
					if(move_uploaded_file($this->files["tmp_name"], $this->targetFile))
					{
						$this->dataUser = $this->accountObj->InfoAccountAll($_SESSION['pseudoUser'], $this->connexion);
						$this->infoMessage[1] = 'Le fichier à été correctement chargé';
					}
					else
					{
						$this->infoMessage[0] = 'Le fichier séléctionné ne peut pas être mis en ligne.';
					}
				}
			} // End main if condition

			return $this->infoMessage;
		}

	} // End class Home


	// Object
	$objectUpload = new Upload();

	// Upload
	$infoMessage = $objectUpload->upload();

	// Display
	if(!empty($_SESSION['admin']))
	{
		if(!empty($_SESSION['pseudoUser']))
		{
			// Load the view
			require('../src/view/frontView/uploadView.php');
		}
		else if(empty($_SESSION['pseudoUser']))
		{
			header('location: connexion');
		}
	}
	else
	{
		header('location: maintenance');
	}