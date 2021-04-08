<?php
	require('../core/BddConnexion.php');
	require('../src/model/SliderModel.php');

	class Slider {

		// Property
		// ...
		private $bddObj;
		private $connexion;
		private $sliderObj;
		private $infoMessage;
		private $description;
		private $title;
		private $idSlider;

		// Files
		private $files;
		private $targetFile;
		private $maxSize;
		private $targetFolder;
		private $type;
		private $acceptedType;
		private $fileSize;
		
		// Constructor
		// ...
		function __construct() {
			// Object
			$this->bddObj = new BddConnexion();
            $this->sliderObj = new SliderModel();
			$this->connexion = $this->bddObj->Start();

			// POST - FILES variables
			if(!empty($_POST['title1']))
			{
				$this->title = $_POST['title1'];
			}
			if(!empty($_POST['title2']))
			{
				$this->title = $_POST['title2'];
			}
			if(!empty($_POST['title3']))
			{
				$this->title = $_POST['title3'];
			}
			if(!empty($_POST['description1']))
			{
				$this->description = $_POST['description1'];
			}
			if(!empty($_POST['description2']))
			{
				$this->description = $_POST['description2'];
			}
			if(!empty($_POST['description3']))
			{
				$this->description = $_POST['description3'];
			}
			if(!empty($_POST['idSlider1']))
			{
				$this->idSlider = $_POST['idSlider1'];
			}
			if(!empty($_POST['idSlider2']))
			{
				$this->idSlider = $_POST['idSlider2'];
			}
			if(!empty($_POST['idSlider3']))
			{
				$this->idSlider = $_POST['idSlider3'];
			}
			if(!empty($_FILES['upload']))
			{
				$this->files = $_FILES['upload'];
				$this->targetFolder = '../public/images/homePage/slider';
				$this->targetFile = $this->targetFolder.'/'.basename($this->files["name"]);
				$this->maxSize = 20048576; // 20MO
				$this->type = new finfo(FILEINFO_MIME_TYPE);
				$this->acceptedType = array(
					'jpeg' => 'image/jpeg',
				);  
				$this->fileSize = filesize($this->files['tmp_name']);
			}

			$this->uploadAuthorized = true;

			// Message Error/success : upload
			// infoMessage[0] For error
			// infoMessage[1] For succes
			$this->infoMessage = array('', '');
		}

	    // Function
		// ...
		public function modification()
		{
			if(!empty($_POST['description1'])
			&& !empty($_POST['title1'])
			&& !empty($_FILES['upload'])
			|| !empty($_POST['description2'])
			&& !empty($_POST['title2'])
			&& !empty($_FILES['upload'])
			|| !empty($_POST['description3'])
			&& !empty($_POST['title3'])
			&& !empty($_FILES['upload'])
			)
			{
				// Verification file size
				if ($this->fileSize > $this->maxSize)
				{
					$this->infoMessage[0] = 'La taille du fichier est trop importante';
					$this->uploadAuthorized = false;
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
						$this->infoMessage[0] = 'Le format du fichier est incorrecte (seul les fichiers jpeg/jpg sont autorisés).';
					}
					
					$this->uploadAuthorized = false;
				}

				// Upload
				if($this->uploadAuthorized)
				{
					// Update into database
					$this->sliderObj->sliderUpload($this->files['name'], $this->description, $this->title, $this->idSlider, $this->connexion);
					
					// Upload the file
					if(move_uploaded_file($this->files["tmp_name"], $this->targetFile))
					{
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

		public function data()
	    {
			$data = $this->sliderObj->sliderDataAll($this->connexion);
			return $data;
		}

	} // End class Home


	// Object
	$objectSlider = new Slider();

	// Slider modification
	$infoMessage = $objectSlider->modification();
	
    // Slider info
	$dataSlider = $objectSlider->data();

	// Use in front
	$counter = 1;
	
	// Load the view
	require('../src/view/backView/backofficeSliderView.php');
?>