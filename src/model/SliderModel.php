<?php
	class SliderModel
	{
		public function sliderDataAll($connexion)
		{
			$requete = $connexion->prepare('SELECT * FROM slider');
			$requete->execute();

            return $requete;
		}

		public function sliderUpload($files, $description, $title, $idSlider, $connexion)
		{
			// Request
			$requete = $connexion->prepare('UPDATE slider SET url = :files, description = :description, title = :title WHERE id = :idSlider');
			$requete->execute(array('files' => $files, 'description' => $description, 'title' => $title, 'idSlider' => $idSlider));
		}
    }
?>