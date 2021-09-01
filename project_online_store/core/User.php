<?php 

	namespace core;

	class User{

		function __construct(){
			session_start();
		}

		public function checkOnline(){
			return isset($_SESSION['CURRENT_USER']);
		}

		public function getUserData(){
			if($this->checkOnline()){
				return $_SESSION['CURRENT_USER'];
			}else{
				return null;
			}
		}

		public function setUserData($userData){
			$_SESSION['CURRENT_USER'] = $userData;
		}

		public function removeUserData(){
			$_SESSION['CURRENT_USER'] = null;
			session_destroy();
		}
	}

?>