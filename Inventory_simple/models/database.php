<?php
class Database{
	private $host;
	private $user;
	private $pass;
	private $dbnm;
	public $conn;

	function __construct($host, $user, $pass, $dbnm){
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
		$this->dbnm = $dbnm;

		$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbnm)or die(mysqli_error());
		if (!$this->conn) {
			return false;
		}else{
			return true;
		}
	}
}
?>