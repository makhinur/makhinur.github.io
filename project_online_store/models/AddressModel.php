<?php 

	namespace models;
	use models\Address;
	use core\DBManager;
	use PDO;

	class AddressModel{
		private $dbManager;

		public function __construct($dbManager){
			$this->dbManager = $dbManager;
		}

		public function getAddress($user_id){
			$result = null;
			try{

				$query = $this->dbManager->getConnection()->prepare("SELECT * FROM addresses WHERE user_id = :user_id");
				$query->execute(array("user_id"=>$user_id));
				$query->setFetchMode(PDO::FETCH_CLASS, "models\Address");
				$result = $query->fetch();

			}catch(PDOException $e){
				echo $e->getMessage();
			}
			return $result;
		}

		function addAddress($address){
			try{

				$query = $this->dbManager->getConnection()->prepare("INSERT INTO addresses (user_id, address1, address2, city, country, zip, receive_commercials)  VALUES (:user_id, :address1, :address2, :city, :country, :zip, :receive_commercials)");
				$query->execute(array("user_id"=>$address->user_id, "address1"=>$address->address1, "address2"=>$address->address2, "city"=>$address->city, "country"=>$address->country, "zip"=>$address->zip, "receive_commercials"=>$address->receive_commercials));
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		function updateAddress($address){
			try{

				$query = $this->dbManager->getConnection()->prepare("UPDATE addresses SET address1 = :address1, address2 = :address2, city = :city, country = :country, zip = :zip, receive_commercials = :receive_commercials WHERE user_id = :user_id");
				$query->execute(array("user_id"=>$address->user_id, "address1"=>$address->address1, "address2"=>$address->address2, "city"=>$address->city, "country"=>$address->country, "zip"=>$address->zip, "receive_commercials"=>$address->receive_commercials));
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		function deleteAddress($address_id){
			try{

				$query = $this->dbManager->getConnection()->prepare("DELETE FROM addresses WHERE id = :id");
				$query->execute(array("id"=>$address_id));
				
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	}

?>