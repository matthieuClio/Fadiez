<?php
	class SliderModel
	{
		public function sliderDataAll($connexion)
		{
			$requete = $connexion->prepare('SELECT * FROM slider');
			$requete->execute();

            return $requete;
		}

		public function sliderUpload($files, $description, $idSlider, $connexion)
		{
			// Request
			$requete = $connexion->prepare('UPDATE slider SET url = :files, description = :description WHERE id = :idSlider');
			$requete->execute(array('files' => $files, 'description' => $description, 'idSlider' => $idSlider));
		}
    }
?>