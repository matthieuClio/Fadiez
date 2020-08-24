<?php

	class Account
	{
    public function CreationCompte(
            $name,
            $firstName,
            $email, 
            $password,
            $salt,
            $ipAdressUser,
            $connexion)
	  {
			// Request
			$requete = $connexion->prepare('INSERT INTO compte(name, first_name, email, password, salt, ip_adress, statut) VALUES(?, ?, ?, ?, ?, ?, "user")');
			$requete->execute(array($name, $firstName, $email, $password, $salt, $ipAdressUser));
    }
    
    public function EmailExist($email, $connexion)
		{
			// Select Email of account
			$requete = $connexion->prepare('SELECT COUNT(email) FROM compte WHERE email = :email');
			$requete->execute(array('email' => $email));

      // Store the array in a variable
      $verification = $requete->fetch();

      // Returns the result number following the request
      return $verification[0];
		}

  } // End class Account
?>