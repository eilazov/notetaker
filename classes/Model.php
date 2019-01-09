<?php 

abstract class Model{
	protected $conn;
	protected $stmt;

	public function __construct(){
		$this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
	}

	public function query($query){
		$this->stmt = $this->conn->prepare($query);
	}

	public function bind($param, $value){
		$this->stmt->bindValue($param, $value); 
	}

	public function execute(){
		$this->stmt->execute();
	}

	public function resultSet(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function lastInsertId(){
		return $this->conn->lastInsertId();
	}

	public function lastUpdateId(){
		return $this->stmt->rowCount();
	}

	public function affected(){
		return $this->stmt->exec();
	}

	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
}

?>