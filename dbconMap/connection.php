<?php
    class DbConn{
		private $host='localhost';
		private $dbname='floodtiwimap';
		private $user='root';
		private $pass='';
		
		public function connect(){
			try{
				$connection= new PDO('mysql:host='.$this->host . '; dbname=' . $this->dbname, $this->user, $this->pass);
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $connection;
			}catch(PDOException $e){
				echo 'Database Error: ' . $e->getMessage();
			}
		}
	}
?>