<?php 

	namespace models;
	use models\Producer;
	use core\DBManager;
	use PDO;

	class ProducerModel{

		private $dbManager;

		public function __construct($dbManager){
			$this->dbManager = $dbManager;
		}

		public function getAllProducers(){
			$result = array();

			try {
				$query = $this->dbManager->getConnection()->prepare("SELECT * FROM producers");
				$query->execute();
				$result = $query->fetchAll(PDO::FETCH_CLASS, "models\Producer");
				
			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			return $result;
		}
	}

?>