<?php
	class Bdd_connexion
	{

		// Set the connection parameters
		// ...

		private $host = '';
		private $dbname = '';
		private $login = '';
		private $password = '';


		public function Start()
		{
			$host = $this->host;
			$dbname = $this->dbname;
			$login = $this->login;
			$password = $this->password;


			// Connexion to the data base
			//...
			
			try
			{
				$base = new PDO('mysql:host='.$host.';dbname='.$dbname,'root',$password);
			}
			catch (Exception $e)
			{
				die('erreur: ' .$e->getMessage());
			}

			return $base;

		} // End function Start


	} // End class BDD
?>