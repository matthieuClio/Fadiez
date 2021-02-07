<?php

	class Upload 
	{

		// Property
		// ...
		private $files;
		private $fileSize;
		private $maxSize;
		private $targetFolder;
		private $type;
		private $acceptedType;
		private $infoMessage;
		private $uploadAuthorized;

		// Constructor
		// ...
		function __construct() 
		{
			if(!empty($_FILES['upload']))
			{
				$this->files = $_FILES['upload'];
			}
			if(!empty($_FILES['upload']))
			{
				$this->fileSize = $this->files['tmp_name'];
			}
			$this->maxSize = 20048576; // 20MO
			$this->targetFolder = '../public/music/musicTest';
			$this->targetFile = $this->targetFolder.'/'.basename($this->files["name"]);
			$this->type = new finfo(FILEINFO_MIME_TYPE);
			$this->acceptedType = array(
				'mp3' => 'audio/mpeg',
			);
			$this->uploadAuthorized = true;

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
					?> <script type="text/javascript">console.log('La taille du fichier est trop importante');</script><?php
					$this->infoMessage[0] = 'La taille du fichier est trop importante';
					$this->uploadAuthorized = false;
				}
				else if($this->fileSize <= $this->maxSize)
				{
					?> <script type="text/javascript">console.log('La taille du fichier est accepté');</script><?php
				}

				// Verification file existence
				if(file_exists($this->targetFolder.'/'.$this->files['name']))
				{
					?> <script type="text/javascript">console.log('Already exist');</script><?php
					$this->infoMessage[0] = 'Un fichier possédant le même nom existe déjà';
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
					?> <script type="text/javascript">console.log('format invalid');</script><?php
					$this->infoMessage[0] = 'Le format du fichier est incorrecte (seul les fichiers mp3 sont autorisés)';
					$this->uploadAuthorized = false;
				}
				else 
				{
					?> <script type="text/javascript">console.log('format valide :)');</script><?php
				}

				// Upload the file
				if($this->uploadAuthorized) 
				{
					?> <script type="text/javascript">console.log('dowload ok');</script><?php
					if(move_uploaded_file($this->files["tmp_name"], $this->targetFile)) 
					{
						$this->infoMessage[1] = 'Le fichier à été correctement chargé';
					} 
					else 
					{
						echo "Download failed";
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