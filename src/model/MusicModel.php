<?php

    class Music
    {
        public function MusicList($connexion)
        {
            $requete = $connexion->prepare('SELECT * FROM music');
            $requete->execute();
            
            return $requete;
        }

        public function MusicName($musicName, $connexion)
        {
            // Select Music name of music
			$requete = $connexion->prepare('SELECT COUNT(music_name) FROM music WHERE music_name = :musicName');
			$requete->execute(array('musicName' => $musicName));

            // Store the array in a variable
            $verification = $requete->fetch();

            // Returns the result number following the request
            return $verification[0];
        }

        public function MusicAdd($musicName, $artistName, $fileName, $idUser, $connexion)
        {
            // Request
			$requete = $connexion->prepare('INSERT INTO music(music_name, artist_name, file_name, uploaded, id_compte) VALUES(?, ?, ?, "traitement", ?)');
			$requete->execute(array($musicName, $artistName, $fileName, $idUser));
        }
    } // End class
?>