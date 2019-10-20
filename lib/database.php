<?php

include 'config/config.php';
	/**
	 * Database class
	 */
	class Database{
		public $host 	= DB_HOST;
		public $user 	= DB_USER;
		public $pass 	= DB_PASS;
		public $userdb 	= DB_NAME;

		public $error;
		public $link;



		public function __construct(){
			$this->dbconnect();
		}

		public function dbconnect(){
			$this->link = new mysqli($this->host, $this->user, $this->pass, $this->userdb);
			if (!$this->link) {
				$this->error = "Connection fail".$this->link->connect_error;
				return false;
			}
		}

		public function select($query){
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($result->num_rows>0) {
				return $result;
			}else{
				return false;
			}
		}


		public function insert($query){
			$result = $this->link->query($query)or die($this->link->error.__LINE__);
			if ($result) {
				return $result;
			}else{
				return false;
			}
		}


		public function update($query){
			$result = $this->link->query($query)or die($this->link->error.__LINE__);
			if ($result) {
				return $result;
			}else{
				return false;
			}
		}

		public function delete($query){
			$result = $this->link->query($query)or die($this->link->error.__LINE__);
			if ($result) {
				return $result;
			}else{
				return false;
			}
		}
	}
?>