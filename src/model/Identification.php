<?php
	class Identification
	{
		public function SaltUser($pseudo, $connexion)
		{
			$requete = $connexion->prepare('SELECT salt FROM compte WHERE pseudo = :pseudo');
			$requete->execute(array('pseudo' => $pseudo));
			$salt = $requete->fetch();

			return $salt['salt'];
		}

		public function EmailExist($email, $connexion)
		{
			// Select Email of account
			$requete = $connexion->prepare('SELECT email FROM compte WHERE email = :email');
			$requete->execute(array('email' => $email));
			$email = $requete->fetch();

			return $email['email'];
		}

		public function UserInformation($identifiant, $passwordCrypte, $connexion)
		{
			// Selection of corresponding pseudo and password
			$identification = $connexion->prepare('SELECT COUNT(*) FROM compte WHERE pseudo = :identifiant AND password = :password_crypte');

			// Execute the request
			$identification->execute(array('identifiant' => $identifiant, 'password_crypte' => $passwordCrypte));

			// Store the array in a variable
			$verification = $identification->fetch();

			// Returns the result number following the request
			return $verification[0];
		}


		public function UserStatut($user, $connexion)
		{
			$requete = $connexion->prepare('SELECT statut FROM compte WHERE pseudo = :user');
			$requete->execute(array('user' => $user));
			$statut = $requete->fetch();

			return $statut['statut'];
		}


		public function IpAddressStorage($identifiant, $connexion)
		{
			// Ip address of the client
			$adresseIpClient = $_SERVER['REMOTE_ADDR'];

			// Request
			$insert = $connexion->prepare('UPDATE compte SET ip_adress = ? WHERE pseudo = ? ');
			$insert->execute(array($adresseIpClient, $identifiant));
		}

		public function ChangePassword($newPassword, $salt, $email, $connexion)
		{
			// Request
			$insert = $connexion->prepare('UPDATE compte SET password = ?, salt = ? WHERE email = ? ');
			$insert->execute(array($newPassword, $salt, $email));
		}


	} // End class Identification
?>