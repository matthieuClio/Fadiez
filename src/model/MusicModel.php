<?php

    class Music
    {
        public function MusicListNb($connexion)
        {
            $requete = $connexion->prepare('SELECT COUNT(*) FROM music WHERE uploaded = "valide" ');
            $requete->execute();
            $totalNomber = $requete->fetch();

            return $totalNomber[0];
        }

        public function MusicList($limiteOne, $limiteTwo, $connexion)
        {
            $comma =',';
            $limit = strval($limiteOne.$comma.$limiteTwo); // "Number 1, Number2"

            $requete = $connexion->prepare('SELECT * FROM music WHERE uploaded = "valide" ORDER BY id DESC LIMIT '.$limit);
            $requete->execute();
            
            return $requete;
        }

        public function MusicListTreatment($limiteOne, $limiteTwo, $connexion)
        {
            $comma =',';
            $limit = strval($limiteOne.$comma.$limiteTwo); // "Number 1, Number2"

            $requete = $connexion->prepare('SELECT * FROM music WHERE uploaded = "traitement" ORDER BY id DESC LIMIT '.$limit);
            $requete->execute();
            
            return $requete;
        }

        public function MusicListTreatmentNb($connexion)
        {
            $requete = $connexion->prepare('SELECT COUNT(*) FROM music WHERE uploaded = "traitement" ');
            $requete->execute();

            // Store the array in a variable
            $nb = $requete->fetch();

            // Returns the result number following the request
            return $nb[0];
        }

        public function MusicListIdAll($id, $connexion)
        {
            $requete = $connexion->prepare('SELECT COUNT(*) FROM music WHERE id_compte = ? ORDER BY id DESC');
            $requete->execute(array($id));
            $totalNomber = $requete->fetch();

            return $totalNomber[0];
        }

        public function MusicListId($id, $limiteOne, $limiteTwo, $connexion)
        {
            $comma =',';
            $limit = strval($limiteOne.$comma.$limiteTwo); // "Number 1, Number2"

            $requete = $connexion->prepare('SELECT * FROM music WHERE id_compte = ? ORDER BY id DESC LIMIT '.$limit);
            $requete->execute(array($id));

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

        public function MusicAdd($musicName, $artistName, $fileName, $fileImage, $idUser, $connexion)
        {
            // Request
			$requete = $connexion->prepare('INSERT INTO music(music_name, artist_name, file_name, image_name, uploaded, id_compte) VALUES(?, ?, ?, ?, "traitement", ?)');
			$requete->execute(array($musicName, $artistName, $fileName, $fileImage, $idUser));
        }

        public function MusicUpdate($uploadedValue, $id, $connexion)
        {
            // Request
			$requete = $connexion->prepare('UPDATE music SET uploaded = ? WHERE id = ? AND uploaded = "traitement" ');
			$requete->execute(array($uploadedValue, $id));
        }
    } // End class
?>