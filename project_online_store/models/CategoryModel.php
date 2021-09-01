<?php 

	namespace models;
	use models\Category;
	use core\DBManager;
	use PDO;

	class CategoryModel{

		private $dbManager;

		public function __construct($dbManager){
			$this->dbManager = $dbManager;
		}

		public function getAllCategories(){
			$result = array();
			try{
				$query = $this->dbManager->getConnection()->prepare("SELECT * FROM categories");
				$query->execute();
				$result = $query->fetchAll(PDO::FETCH_CLASS, 'models\Category');

			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $result;
		}
	}

?>