<?php 

	namespace models;
	use models\Item;
	use core\DBManager;
	use PDO;

	class ItemModel{

		private $dbManager;

		public function __construct($dbManager){
			$this->dbManager = $dbManager;
		}

		public function getAllItems(){
			$result = array();
			try{

				$query = $this->dbManager->getConnection()->prepare("SELECT * FROM items");
				$query->execute();
				$result = $query->fetchAll(PDO::FETCH_CLASS, "models\Item");

			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $result;
		}

		function addItem($item){

			try{

				$query = $this->dbManager->getConnection()->prepare("INSERT INTO items (producer, model, price, old_price, category, xs, s, m, l, xl, xxl, from_6_to_7_years, from_8_to_9_years, from_10_to_11_years, color, fabric, sale, img1, img2, img3) VALUES (:producer, :model, :price, :old_price, :category, :xs, :s, :m, :l, :xl, :xxl, :from_6_to_7_years, :from_8_to_9_years, :from_10_to_11_years, :color, :fabric, :sale, :img1, :img2, :img3)");
				$query->execute(array("producer"=>$item->producer, "model"=>$item->model, "price"=>$item->price, "old_price"=>$item->old_price, "category"=>$item->category, "xs"=>$item->xs, "s"=>$item->s, "m"=>$item->m, "l"=>$item->l, "xl"=>$item->xl, "xxl"=>$item->xxl, "from_6_to_7_years"=>$item->from_6_to_7_years, "from_8_to_9_years"=>$item->from_8_to_9_years, "from_10_to_11_years"=>$item->from_10_to_11_years, "color"=>$item->color, "fabric"=>$item->fabric, "sale"=>$item->sale, "img1"=>$item->img1, "img2"=>$item->img2, "img3"=>$item->img3));

			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		public function getItem($id){
			$result = null;

			try{

				$query = $this->dbManager->getConnection()->prepare("SELECT * FROM items WHERE id = :id");
				$query->execute(array("id"=>$id));
				$query->setFetchMode(PDO::FETCH_CLASS, "models\Item");
				$result = $query->fetch();

			}catch(PDOException $e){
				echo $e->getMessage();
			}

			return $result;
		}

		public function getItemsByCategory($category){
			$result = array();
			try{

				$query = $this->dbManager->getConnection()->prepare("SELECT * FROM items WHERE category = :category");
				$query->execute(array("category"=>$category));
				$result = $query->fetchAll(PDO::FETCH_CLASS, "models\Item");

			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $result;
		}

		function updateItem($item){
			try{

				$query = $this->dbManager->getConnection()->prepare("UPDATE items SET producer = :producer, model = :model, price = :price, old_price = :old_price, category = :category, xs = :xs, s = :s, m = :m, l = :l, xl = :xl, xxl = :xxl, from_6_to_7_years = :from_6_to_7_years, from_8_to_9_years = :from_8_to_9_years, from_10_to_11_years = :from_10_to_11_years, color = :color, fabric = :fabric, sale = :sale, img1 = :img1, img2 = :img2, img3 = :img3 WHERE id = :id");
				$query->execute(array("id"=>$item->id, "producer"=>$item->producer, "model"=>$item->model, "price"=>$item->price, "old_price"=>$item->old_price, "category"=>$item->category, "xs"=>$item->xs, "s"=>$item->s, "m"=>$item->m, "l"=>$item->l, "xl"=>$item->xl, "xxl"=>$item->xxl, "from_6_to_7_years"=>$item->from_6_to_7_years, "from_8_to_9_years"=>$item->from_8_to_9_years, "from_10_to_11_years"=>$item->from_10_to_11_years, "color"=>$item->color, "fabric"=>$item->fabric, "sale"=>$item->sale, "img1"=>$item->img1, "img2"=>$item->img2, "img3"=>$item->img3));
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		public function deleteItem($id){
			try{
				$query = $this->dbManager->getConnection()->prepare("DELETE FROM items WHERE id = :id");
				$query->execute(array("id"=>$id));

			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		
	}

?>





















