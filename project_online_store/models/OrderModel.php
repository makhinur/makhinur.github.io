<?php 

	namespace models;
	use models\Order;
	use core\DBManager;
	use PDO;

	class OrderModel{

		private $dbManager;

		public function __construct($dbManager){
			$this->dbManager = $dbManager;
		}

		public function getAllOrders($user_id){
			$result = array();
			try{

				$query = $this->dbManager->getConnection()->prepare("SELECT * FROM orders WHERE user_id = :user_id");
				$query->execute(array("user_id"=>$user_id));
				$result = $query->fetchAll(PDO::FETCH_CLASS, "models\Order");

			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $result;
		}

		function addOrder($user_id, $item){

			try{

				$query = $this->dbManager->getConnection()->prepare("INSERT INTO orders (user_id, item_id, item_model, item_price, item_size, item_quantity, item_img) VALUES (:user_id, :item_id, :item_model, :item_price, :item_size, :item_quantity, :item_img)");
				$query->execute(array("user_id"=>$user_id, "item_id"=>$item->item_id, "item_model"=>$item->model, "item_price"=>$item->price, "item_size"=>$item->size, "item_quantity"=>$item->quantity, "item_img"=>$item->img1));

			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

	}

?>