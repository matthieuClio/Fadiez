<?php
    class Music
    {
        public function MusicList($connexion) {
            $requete = $connexion->prepare('SELECT * FROM music');
            $requete->execute();
            
            return $requete;
        }
    } // End class
?>