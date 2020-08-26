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
			$requete = $connexion->prepare('INSERT INTO compte(name, first_name, email, password, salt, ip_adress, statut, blocked) VALUES(?, ?, ?, ?, ?, ?, "user", "non")');
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

    public function InfoAccount($connexion)
		{
			// Select all of account
			$requete = $connexion->prepare('SELECT * FROM compte WHERE statut = "user" ');
			$requete->execute();

      return $requete;
    }
    
    public function InfoAccountUser($idAccount, $connexion)
		{
			// Select all of account
			$requete = $connexion->prepare('SELECT * FROM compte WHERE id = :idAccount');
			$requete->execute(array('idAccount' => $idAccount));

      return $requete;
    }
    
    public function BlockUser($idAccount, $connexion)
		{
      // Update account
      $requete = $connexion->prepare('UPDATE compte SET blocked = "oui" WHERE id = :idAccount ');
      $requete->execute(array('idAccount' => $idAccount));
      
      return $requete;
		}

    public function UnblockUser($idAccount, $connexion)
		{
      // Update account
      $requete = $connexion->prepare('UPDATE compte SET blocked = "non" WHERE id = :idAccount ');
      $requete->execute(array('idAccount' => $idAccount));
      
      return $requete;
		}
  } // End class Account
?>