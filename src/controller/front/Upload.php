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
		private $filesImage;
		private $fileSize;
		private $fileSizeImage;
		private $maxSize;
		private $targetFolder;
		private $targetFolderImage;
		private $targetFile;
		private $targetFileImage;
		private $type;
		private $typeImage;
		private $acceptedType;
		private $acceptedTypeImage;
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
			if(!empty($_FILES['upload']['name']))
			{
				$this->files = $_FILES['upload'];
				$this->targetFolder = '../public/music/musicValidation';
				$this->targetFile = $this->targetFolder.'/'.basename($this->files["name"]);
				$this->maxSize = 20048576; // 20MO
				$this->type = new finfo(FILEINFO_MIME_TYPE);
				$this->acceptedType = array(
					'mp3' => 'audio/mpeg',
				);
				$this->fileSize = filesize($this->files['tmp_name']);
			}
			if(!empty($_FILES['image']['name']))
			{
				$this->filesImage = $_FILES['image'];
				$this->targetFolderImage = '../public/images/music/musicValidationImage';
				$this->targetFileImage = $this->targetFolderImage.'/'.basename($this->filesImage["name"]);
				$this->typeImage = new finfo(FILEINFO_MIME_TYPE);
				$this->acceptedTypeImage = array(
					'png' => 'image/png',
					'jpeg' => 'image/jpeg',
					'jpg' => 'image/jpeg',
				);
				$this->fileSizeImage = filesize($this->files['tmp_name']);
			}

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
			&& !empty($_FILES['upload']['name'])
			&& !empty($_FILES['image']['name'])
			)
			{
				// Verification file size
				// Mp3
				if ($this->fileSize > $this->maxSize)
				{
					$this->infoMessage[0] = 'La taille du fichier mp3 est trop importante';
					$this->uploadAuthorized = false;
				}

				// Image
				if ($this->fileSizeImage > $this->maxSize)
				{
					$this->infoMessage[0] = 'La taille du fichier image est trop importante';
					$this->uploadAuthorized = false;
				}

				// Verification file name already taken
				// Mp3
				if($this->musicUse != 0)
				{
					// Not other error message
					if(empty($this->infoMessage[0])) {
						$this->infoMessage[0] = 'Le nom de la musique est déjà pris';
					}
					$this->uploadAuthorized = false;
				}

				// Verification file existence
				// Mp3
				if(file_exists($this->targetFolder.'/'.$this->files['name']))
				{
					// Not other error message
					if(empty($this->infoMessage[0])) {
						$this->infoMessage[0] = 'Un fichier (mp3) possédant le même nom existe déjà';
					}
					$this->uploadAuthorized = false;
				}

				// Image
				if(file_exists($this->targetFolderImage.'/'.$this->filesImage['name']))
				{
					// Not other error message
					if(empty($this->infoMessage[0])) {
						$this->infoMessage[0] = 'Un fichier (image) possédant le même nom existe déjà';
					}
					$this->uploadAuthorized = false;
				}
				
				// Verification type file
				// Mp3
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

				// Image
				if(false === $ext = array_search(
					$this->typeImage->file($this->filesImage['tmp_name']),
	
					// File accpeted
					$this->acceptedTypeImage,
					true
				))
				{
					// Not other error message
					if(empty($this->infoMessage[0])) {
						$this->infoMessage[0] = 'Le format du fichier est incorrecte (seul les fichiers png, jpeg et jpg sont autorisés).';
					}
					
					$this->uploadAuthorized = false;
				}

				// Upload
				if($this->uploadAuthorized)
				{
					// Upload the file mp3 and the file img
					if(move_uploaded_file($this->files["tmp_name"], $this->targetFile) 
					&& move_uploaded_file($this->filesImage["tmp_name"], $this->targetFileImage)
					)
					{
						// Insert into database
						$this->musicObj->MusicAdd($this->music, $this->artist, $this->files['name'], $this->filesImage['name'], $this->dataUser['id'], $this->connexion);
						$this->infoMessage[1] = 'Les fichiers ont été correctement chargés';
					}
					else
					{
						$this->infoMessage[0] = 'Les fichiers séléctionnés ne peut pas être mis en ligne.';
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