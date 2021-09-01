<?php 

	namespace models;
	use models\Review;
	use models\ReviewLike;
	use core\DBManager;
	use PDO;

	class ReviewModel{

		private $dbManager;

		public function __construct($dbManager){
			$this->dbManager = $dbManager;
		}

		public function getAllReviews(){
			$resutl = array();

			try {
				
				$query = $this->dbManager->getConnection()->prepare("SELECT * FROM reviews");
				$query->execute();
				$result = $query->fetchAll(PDO::FETCH_CLASS, "models\Review");

			} catch (PDException $e) {
				echo $e->getMessage();
			}

			return $result;
		}

		function addReview($review){
			try {

				$query = $this->dbManager->getConnection()->prepare("INSERT INTO reviews (item_id, user_id, review_text, stars_count, post_date, like_count) VALUES (:item_id, :user_id, :review_text, :stars_count, NOW(), :like_count)");
				$query->execute(array("item_id"=>$review->item_id, "user_id"=>$review->user_id, "review_text"=>$review->review_text, "stars_count"=>$review->stars_count, "like_count"=>$review->like_count));

			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function deleteReview($id){
			try {

				$query = $this->dbManager->getConnection()->prepare("DELETE FROM reviews WHERE id = :id");
				$query->execute(array("id"=>$id));
				
			} catch (PDOException $e) {
				echo $e->getMessage();	
			}
		}

		public function getReview($id){
			$result = null;

			try {
				
				$query = $this->dbManager->getConnection()->prepare("SELECT * FROM reviews WHERE id = :id");
				$query->execute(array("id"=>$id));
				$query->setFetchMode(PDO::FETCH_CLASS, "models\Review");
				$result = $query->fetch();

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			return $result;
		}

		public function getAllReviewsForItem($item_id){
			$resutl = array();

			try {
				
				$query = $this->dbManager->getConnection()->prepare("SELECT * FROM reviews WHERE item_id = :item_id");
				$query->execute(array("item_id"=>$item_id));
				$result = $query->fetchAll(PDO::FETCH_CLASS, "models\Review");

			} catch (PDException $e) {
				echo $e->getMessage();
			}

			return $result;
		}

		public function getAllReviewLikes(){
			$result = array();

			try {

				$query = $this->dbManager->getConnection()->prepare("SELECT * FROM review_liked_users");
				$query->execute();
				$result = $query->fetchAll(PDO::FETCH_CLASS, "models\ReviewLike");

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

			return $result;
		}

		public function addLike($review_id, $user_id){
			try {

				$query = $this->dbManager->getConnection()->prepare("INSERT INTO review_liked_users (review_id, user_id) VALUES (:review_id, :user_id)");
				$query->execute(array("review_id"=>$review_id, "user_id"=>$user_id));

			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function deleteLike($review_id, $user_id){
			try {

				$query = $this->dbManager->getConnection()->prepare("DELETE FROM review_liked_users WHERE review_id = :review_id AND user_id = :user_id");
				$query->execute(array("review_id"=>$review_id, "user_id"=>$user_id));
				
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function updateLikesCount($review_id, $like_count){
			try {

				$query = $this->dbManager->getConnection()->prepare("UPDATE reviews SET like_count = :like_count WHERE id = :id");
				$query->execute(array("id"=>$review_id, "like_count"=>$like_count));

			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function getAverageStarsCount($reviews_list){
			$stars_sum = 0;
			foreach($reviews_list as $review){
				$stars_sum+=$review->stars_count;
			}

			if(sizeof($reviews_list)>0){
				return $stars_sum/sizeof($reviews_list);
			}else{
				return 0;
			}
		}
	}

?>






















