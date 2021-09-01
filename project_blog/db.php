<?php 

	define('SITE_NAME', "BLOG.COM");

	try{
		$connection = new PDO("mysql:host=localhost;dbname=project_blog", "root", "");
	}catch(PDOException $e){
		echo $e->getMessage();
	}
?>

<?php 

	function getUser($email){

		global $connection;

		try{

			$query = $connection->prepare("SELECT * FROM users WHERE email = :email");
			$query->execute(array("email"=>$email));
			$result = $query->fetch();
			return $result;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return null;

	}

	function getUserById($id){

		global $connection;

		try{

			$query = $connection->prepare("SELECT * FROM users WHERE id = :id");
			$query->execute(array("id"=>$id));
			$result = $query->fetch();
			return $result;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return null;

	}


	function addUser($email, $password){

		global $connection;

		try{

			$query = $connection->prepare("INSERT INTO users (email, password) VALUES (:email, :password)

			");

			$query->execute(array("email"=>$email, "password"=>$password));
			return true;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false ;

	}

	function addUserData($user_id, $name, $surname, $gender, $country, $city){

		global $connection;

		try{

			$query = $connection->prepare("INSERT INTO user_data (user_id, name, surname, gender, country, city, avatar) VALUES (:user_id, :name, :surname, :gender, :country, :city, 'https://www.mountainheavensella.com/wp-content/uploads/2018/12/default-user.png')

			");

			$query->execute(array("user_id"=>$user_id, "name"=>$name, "surname"=>$surname, "gender"=>$gender, "country"=>$country, "city"=>$city));
			return true;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false ;

	}

	function getUserData($user_id){

		global $connection;

		try{

			$query = $connection->prepare("SELECT * FROM user_data WHERE user_id = :user_id");
			$query->execute(array("user_id"=>$user_id));
			$result = $query->fetch();
			return $result;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return null;

	}

	
	function addTweet($user_id, $tweet, $active, $like_count){

		global $connection;

		try{

			$query = $connection->prepare("INSERT INTO tweets (id, user_id, tweet, post_date, active, like_count) VALUES (NULL, :user_id, :tweet, NOW(), :active, :like_count)");
			$query->execute(array("user_id"=>$user_id, "tweet"=>$tweet, "active"=>$active, "like_count"=>$like_count));
			return true;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false ;

	}


	function getTweet($id){
		global $connection;
		$result = null;

		try{
			$query = $connection->prepare("
				SELECT t.id, t.tweet, t.user_id, t.post_date, t.like_count, u.email
				FROM tweets t
				INNER JOIN users u ON u.id = t.user_id
				WHERE t.id = :id
			");
			$query->execute(array("id"=>$id));
			$result = $query->fetch();
		}catch(Exception $e){
			echo $e->getMessage();
		}
		return $result;
	}


	function getAllUsers(){
		global $connection;

		try{
			$query = $connection->prepare("
				SELECT u.id, u.user_email, ud.name, ud.surname, ud.avatar
				FROM users u
				INNER JOIN user_data ud ON u.id = ud.user_id
			");
			$query->execute(array());
			return $query->fetchAll();
		}catch(Exception $e){
			echo $e->getMessage();
		}
		return null;
	}


	function getAllTweets(){
		global $connection;

		try{
			$query = $connection->prepare("
				SELECT t.id, t.tweet, t.user_id, t.post_date, t.like_count, u.email
				FROM tweets t
				INNER JOIN users u ON u.id = t.user_id
				ORDER BY t.post_date DESC
			");
			$query->execute(array());
			return $query->fetchAll();
		}catch(Exception $e){
			echo $e->getMessage();
		}
		return null;
	}

	function getAllFollowing($id){
		global $connection;

		try{
			$query = $connection->prepare("
				SELECT f.id, f.user_id, f.follow_id, u.email, ud.name, ud.surname, ud.avatar
				FROM follows f
				INNER JOIN users u ON u.id = f.follow_id
				INNER JOIN user_data ud ON ud.user_id = f.follow_id
				WHERE f.user_id = :id
			");
			$query->execute(array("id"=>$id));
			return $query->fetchAll();
		}catch(Exception $e){
			echo $e->getMessage();
		}
		return null;
	}


	function getAllFollowers($id){
		global $connection;

		try{
			$query = $connection->prepare("
				SELECT f.id, f.user_id, f.follower_id, u.email, ud.name, ud.surname, ud.avatar
				FROM followers f
				INNER JOIN users u ON u.id = f.follower_id
				INNER JOIN user_data ud ON ud.user_id = f.follower_id
				WHERE f.user_id = :id
			");
			$query->execute(array("id"=>$id));
			return $query->fetchAll();
		}catch(Exception $e){
			echo $e->getMessage();
		}
		return null;
	}


	// function getLatestSentMessage($user_id, $sender_id){
	// 	global $connection;

	// 	try{
	// 		$query = $connection->prepare("
	// 			SELECT m.message_text, r.MaxSentDate, ud.name, ud.surname
	// 			FROM (
	// 					SELECT sender_id, MAX(sent_date) as MaxSentDate
	// 					FROM messages
	// 					GROUP BY user_id
	// 			) r
	// 			INNER JOIN messages m ON m.sender_id = r.sender_id AND m.sent_date = r.MaxSentDate
	// 			INNER JOIN user_data ud ON ud.user_id = m.sender_id
	// 			WHERE m.user_id = :user_id AND m.sender_id = :sender_id
	// 			ORDER BY r.MaxSentDate DESC
	// 		");
	// 		$query->execute(array("user_id"=>$user_id, "sender_id"=>$sender_id));
	// 		return $query->fetchAll();
	// 	}catch(Exception $e){
	// 		echo $e->getMessage();
	// 	}
	// 	return null;
	// }


	function getAllMessages(){
		global $connection;

		try{
			$query = $connection->prepare("
				SELECT m.id, m.user_id, m.sender_id, m.message_text, m.sent_date, us.name, us.surname, us.avatar
				FROM messages m
				INNER JOIN user_data us ON us.user_id = m.sender_id
				ORDER BY m.sent_date ASC
			");
			$query->execute(array());
			return $query->fetchAll();
		}catch(Exception $e){
			echo $e->getMessage();
		}
		return null;
	}

	function getFrom($user_id){
		global $connection;

		try{
			$query = $connection->prepare("
				SELECT DISTINCT sender_id
				FROM messages
				WHERE user_id = :user_id
			");
			$query->execute(array("user_id"=>$user_id));
			return $query->fetchAll();
		}catch(Exception $e){
			echo $e->getMessage();
		}
		return null;
	}

	function getTo($sender_id){
		global $connection;

		try{
			$query = $connection->prepare("
				SELECT DISTINCT user_id as sender_id
				FROM messages
				WHERE sender_id = :sender_id
			");
			$query->execute(array("sender_id"=>$sender_id));
			return $query->fetchAll();
		}catch(Exception $e){
			echo $e->getMessage();
		}
		return null;
	}


	function getConnections($user_id){

		$from = getFrom($user_id);
		$to = getTo($user_id);

		$result = array_merge($from, $to);
		$result = array_map("unserialize", array_unique(array_map("serialize", $result)));

		$res = array();

		foreach($result as $r){
			array_push($res, $r['sender_id']);
		}

		return $res;
	}


	function getAllLikes(){
		global $connection;

		try{
			$query = $connection->prepare("
				SELECT * FROM tweet_liked_users
			");
			$query->execute(array());
			return $query->fetchAll();
		}catch(Exception $e){
			echo $e->getMessage();
		}
		return null;
	}


	function getAllTweetAnswers($tweet_id){
		global $connection;

		try{
			$query = $connection->prepare("
				SELECT t.id, t.tweet_id, t.user_id, t.answer, t.post_date, u.email, ud.avatar
				FROM tweet_answers t
				INNER JOIN users u ON u.id = t.user_id
				INNER JOIN user_data ud ON ud.user_id = t.user_id
				WHERE t.tweet_id = :tweet_id
				ORDER BY t.post_date DESC
			");
			$query->execute(array("tweet_id"=>$tweet_id));
			return $query->fetchAll();
		}catch(Exception $e){
			echo $e->getMessage();
		}
		return null;
	}


	function getAnswerById($id){

		global $connection;

		try{

			$query = $connection->prepare("SELECT * FROM tweet_answers WHERE id = :id");
			$query->execute(array("id"=>$id));
			$result = $query->fetch();
			return $result;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return null;

	}


	function saveTweet($id, $user_id, $tweet){

		global $connection;

		try{

			$query = $connection->prepare("UPDATE tweets SET tweet = :tweet
				WHERE id = :id AND user_id = :user_id
				");
			$query->execute(array("id"=>$id, "user_id"=>$user_id, "tweet"=>$tweet));
			return true;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false ;

	}


	function saveAnswer($id, $answer){

		global $connection;

		try{

			$query = $connection->prepare("UPDATE tweet_answers SET answer = :answer
				WHERE id = :id
				");
			$query->execute(array("id"=>$id, "answer"=>$answer));
			return true;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false ;

	}


	function updateUserPassword($id, $password){

		global $connection;

		try{

			$query = $connection->prepare("UPDATE users SET password = :password
				WHERE id = :id

			");

			$query->execute(array("id"=>$id, "password"=>$password));
			return true;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false ;

	}


	function updateUserData($user_id, $name, $surname, $gender, $country, $city, $avatar){

		global $connection;

		try{

			$query = $connection->prepare("UPDATE user_data SET   name = :name, surname = :surname, gender = :gender, country = :country, city = :city, avatar = :avatar
				WHERE user_id = :user_id

			");

			$query->execute(array("user_id"=>$user_id, "name"=>$name, "surname"=>$surname, "gender"=>$gender, "country"=>$country, "city"=>$city, "avatar" => $avatar));
			return true;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false ;

	}


	function updatePassword($id, $password){

		global $connection;

		try{

			$query = $connection->prepare("UPDATE users SET password = :password
				WHERE id = :id

			");

			$query->execute(array("id"=>$id, "password"=>$password));
			return true;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false ;

	}


	function deleteTweet($id){
		global $connection;
		try{
			$query = $connection->prepare("DELETE FROM tweets WHERE id = :id");
			$rows = $query->execute(array("id"=>$id));
			return $rows;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false;
	}


	function deleteAllUserTweets($user_id){
		global $connection;
		try{
			$query = $connection->prepare("DELETE FROM tweets WHERE user_id = :user_id");
			$rows = $query->execute(array("user_id"=>$user_id));
			return $rows;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false;
	}


	function deleteAnswer($id){
		global $connection;
		try{
			$query = $connection->prepare("DELETE FROM tweet_answers WHERE id = :id");
			$rows = $query->execute(array("id"=>$id));
			return $rows;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false;
	}


	function deleteAllUserAnswers($user_id){
		global $connection;
		try{
			$query = $connection->prepare("DELETE FROM tweet_answers WHERE user_id = :user_id");
			$rows = $query->execute(array("user_id"=>$user_id));
			return $rows;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false;
	}


	function deleteUser($id){
		global $connection;
		try{
			$query = $connection->prepare("DELETE FROM users WHERE id = :id");
			$rows = $query->execute(array("id"=>$id));
			return $rows;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false;

	}


	function deleteUserData($user_id){
		global $connection;
		try{
			$query = $connection->prepare("DELETE FROM user_data WHERE user_id = :user_id");
			$rows = $query->execute(array("user_id"=>$user_id));
			return $rows;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false;

	}

	function deleteReceived($user_id){
		global $connection;
		try{
			$query = $connection->prepare("DELETE FROM messages WHERE user_id = :user_id");
			$rows = $query->execute(array("user_id"=>$user_id));
			return $rows;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false;
	}


	function deleteSent($sender_id){
		global $connection;
		try{
			$query = $connection->prepare("DELETE FROM messages WHERE sender_id = :sender_id");
			$rows = $query->execute(array("sender_id"=>$sender_id));
			return $rows;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false;
	}


	function addFollowing($user_id, $follow_id){

		global $connection;

		try{

			$query = $connection->prepare("INSERT INTO follows (user_id, follow_id) VALUES (:user_id, :follow_id)

			");

			$query->execute(array("user_id"=>$user_id, "follow_id"=>$follow_id));
			return true;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false ;

	}


	function addFollower($user_id, $follower_id){

		global $connection;

		try{

			$query = $connection->prepare("INSERT INTO followers (user_id, follower_id) VALUES (:user_id, :follower_id)

			");

			$query->execute(array("user_id"=>$user_id, "follower_id"=>$follower_id));
			return true;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false ;

	}


	function deleteFollow($user_id, $follow_id){
		global $connection;
		try{
			$query = $connection->prepare("DELETE FROM follows WHERE user_id = :user_id AND follow_id = :follow_id");
			$rows = $query->execute(array("user_id"=>$user_id, "follow_id"=>$follow_id));
			return $rows;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false;

	}


	function deleteAllUserFollows($user_id){
		global $connection;
		try{
			$query = $connection->prepare("DELETE FROM follows WHERE user_id = :user_id");
			$rows = $query->execute(array("user_id"=>$user_id));
			return $rows;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false;

	}


	function deleteFollower($user_id, $follower_id){
		global $connection;
		try{
			$query = $connection->prepare("DELETE FROM followers WHERE user_id = :user_id AND follower_id = :follower_id");
			$rows = $query->execute(array("user_id"=>$user_id, "follower_id"=>$follower_id));
			return $rows;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false;

	}


	function deleteAllUserFollowers($follower_id){
		global $connection;
		try{
			$query = $connection->prepare("DELETE FROM followers WHERE follower_id = :follower_id");
			$rows = $query->execute(array("follower_id"=>$follower_id));
			return $rows;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false;

	}


	function addLike($tweet_id, $user_id){

		global $connection;

		try{

			$query = $connection->prepare("INSERT INTO tweet_liked_users (tweet_id, user_id) VALUES (:tweet_id, :user_id)

			");

			$query->execute(array("user_id"=>$user_id, "tweet_id"=>$tweet_id));
			return true;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false ;

	}


	function updateLikesCount($id, $like_count){

		global $connection;

		try{

			$query = $connection->prepare("UPDATE tweets SET like_count = :like_count
				WHERE id = :id

			");

			$query->execute(array("id"=>$id, "like_count"=>$like_count));
			return true;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false ;

	}


	function deleteLike($tweet_id, $user_id){
		global $connection;
		try{
			$query = $connection->prepare("DELETE FROM tweet_liked_users WHERE user_id = :user_id AND tweet_id = :tweet_id");
			$rows = $query->execute(array("user_id"=>$user_id, "tweet_id"=>$tweet_id));
			return $rows;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false;

	}


	function deleteAllUserLikes($user_id){
		global $connection;
		try{
			$query = $connection->prepare("DELETE FROM tweet_liked_users WHERE user_id = :user_id");
			$rows = $query->execute(array("user_id"=>$user_id));
			return $rows;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false;

	}


	function addAnswer($tweet_id, $user_id, $answer){

		global $connection;

		try{

			$query = $connection->prepare("INSERT INTO tweet_answers (tweet_id, user_id, answer, post_date) VALUES (:tweet_id, :user_id, :answer, NOW())

			");

			$query->execute(array("user_id"=>$user_id, "tweet_id"=>$tweet_id, "answer"=>$answer));
			return true;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false ;

	}


	function addMessage($user_id, $sender_id, $message_text){

		global $connection;

		try{

			$query = $connection->prepare("INSERT INTO messages (id, user_id, sender_id, message_text, sent_date, user_active, sender_active) VALUES (NULL, :user_id, :sender_id, :message_text, NOW(), 'true', 'true')");
			$query->execute(array("user_id"=>$user_id, "sender_id"=>$sender_id, "message_text"=>$message_text));
			return true;

		}catch(Exception $e){
			echo $e->getMessage();
		}

		return false ;

	}

	
?>






























