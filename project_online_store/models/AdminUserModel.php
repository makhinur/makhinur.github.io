<?php 
	
	namespace models;
	use models\AdminUser;
	use core\DBManager;
	use PDO;

	class AdminUserModel{

		private $dbManager;

		public function __construct($dbManager){
			$this->dbManager = $dbManager;
		}

		public function getUser($email){
			$result = null;

			try {
				
				$query = $this->dbManager->getConnection()->prepare("SELECT * FROM admins WHERE email = :email");
				$query->execute(array("email"=>$email));
				$query->setFetchMode(PDO::FETCH_CLASS, "models\AdminUser");
				$result = $query->fetch();

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			return $result;
		} 
	}
?>