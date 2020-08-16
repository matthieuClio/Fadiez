<?php
	class BddConnexion
	{

		// Set the connection parameters
		// ...

		private $host = 'localhost';
		private $dbname = 'fadiez';
		private $login = 'root';
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
				$base = new PDO('mysql:host='.$host.';dbname='.$dbname, $login, $password);
			}
			catch (Exception $e)
			{
				die('erreur: ' .$e->getMessage());
			}

			return $base;

		} // End function Start


	} // End class BDD
?>