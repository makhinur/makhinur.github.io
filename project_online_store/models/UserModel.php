<?php 

	namespace models;
	use models\User;
	use core\DBManager;
	use PDO;

	class UserModel{

		private $dbManager;

		public function __construct($dbManager){
			$this->dbManager = $dbManager;
		}

		function addUser($user){

			try {
				$query = $this->dbManager->getConnection()->prepare("INSERT INTO users (email, password, full_name) VALUES (:email, :password, :full_name)");
				$query->execute(array("email"=>$user->email, "password"=>$user->password, "full_name"=>$user->full_name));
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function getUser($email){
			$result = null;

			try {
				
				$query = $this->dbManager->getConnection()->prepare("SELECT * FROM users WHERE email = :email");
				$query->execute(array("email"=>$email));
				$query->setFetchMode(PDO::FETCH_CLASS, "models\User");
				$result = $query->fetch();

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			return $result;
		}

		public function getUserById($id){
			$result = null;

			try {
				
				$query = $this->dbManager->getConnection()->prepare("SELECT * FROM users WHERE id = :id");
				$query->execute(array("id"=>$id));
				$query->setFetchMode(PDO::FETCH_CLASS, "models\User");
				$result = $query->fetch();

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			return $result;
		}

		public function getAllUsers(){
			$result = array();
			try{
				$query = $this->dbManager->getConnection()->prepare("SELECT * FROM users");
				$query->execute();
				$result = $query->fetchAll(PDO::FETCH_CLASS, "models\User");

			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $result;
		}

		function updateUser($user){
			try{
				$query = $this->dbManager->getConnection()->prepare("UPDATE users SET full_name = :full_name, email = :email WHERE id = :id");
				$query->execute(array("id"=>$user->id, "full_name"=>$user->full_name, "email"=>$user->email));
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		function updateUserPassword($id, $password){
			try{
				$query = $this->dbManager->getConnection()->prepare("UPDATE users SET password = :password WHERE id = :id");
				$query->execute(array("id"=>$id, "password"=>$password));
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	}

?>