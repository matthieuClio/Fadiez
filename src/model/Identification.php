<?php
	class Identification
	{
		public function SaltUser($email, $connexion)
		{
			$requete = $connexion->prepare('SELECT salt FROM compte WHERE email = :email');
			$requete->execute(array('email' => $email));
			$salt = $requete->fetch();

			return $salt['salt'];
		}

		public function UserInformation($email, $passwordCrypte, $connexion)
		{
			// Selection of corresponding email and password
			$identification = $connexion->prepare('SELECT COUNT(*) FROM compte WHERE email = :email AND password = :password_crypte');

			// Execute the request
			$identification->execute(array('email' => $email, 'password_crypte' => $passwordCrypte));

			// Store the array in a variable
			$verification = $identification->fetch();

			// Returns the result number following the request
			return $verification[0];
		}


		public function UserStatut($email, $connexion)
		{
			$requete = $connexion->prepare('SELECT statut FROM compte WHERE email = :email');
			$requete->execute(array('email' => $email));
			$statut = $requete->fetch();

			return $statut['statut'];
		}


		public function IpAddressStorage($email, $connexion)
		{
			// Ip address of the client
			$adresseIpClient = $_SERVER['REMOTE_ADDR'];

			// Request
			$insert = $connexion->prepare('UPDATE compte SET ip_adress = ? WHERE email = ? ');
			$insert->execute(array($adresseIpClient, $email));
		}

		public function ChangePassword($newPassword, $salt, $email, $connexion)
		{
			// Request
			$insert = $connexion->prepare('UPDATE compte SET password = ?, salt = ? WHERE email = ? ');
			$insert->execute(array($newPassword, $salt, $email));
		}
	} // End class Identification
?>