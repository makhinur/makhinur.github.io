<?php 

	namespace controllers;
	use core\User as UserAuthCheck;
	use core\Controller;
	use core\DBManager;
	use models\ItemModel;
	use models\Item;
	use models\UserModel;
	use models\User;
	use models\AdminUserModel;
	use models\AdminUser;
	use models\ProducerModel;
	use models\Producer;
	use models\CategoryModel;
	use models\Category;
	use models\ReviewModel;
	use models\Review;
	use models\ReviewLike;
	use models\AddressModel;
	use models\Address;
	use models\OrderModel;
	use models\Order;

	class MainController extends Controller{

		private $itemModel;
		private $userModel;
		private $adminUserModel;
		private $dbManager;
		private $authUser;
		private $producerModel;
		private $categoryModel;
		private $reviewModel;
		private $addressModel;
		private $orderModel;

		public function __construct(){
			$this->dbManager = new DBManager();
			$this->itemModel = new ItemModel($this->dbManager);
			$this->userModel = new UserModel($this->dbManager);
			$this->adminUserModel = new AdminUserModel($this->dbManager);
			$this->authUser = new UserAuthCheck();
			$this->producerModel = new ProducerModel($this->dbManager);
			$this->categoryModel = new CategoryModel($this->dbManager);
			$this->reviewModel = new ReviewModel($this->dbManager);
			$this->addressModel = new AddressModel($this->dbManager);
			$this->orderModel = new OrderModel($this->dbManager);
		}

		function index(){
			$items = $this->itemModel->getAllItems();
			$online = $this->authUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->authUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;
			$_REQUEST['ITEMS_LIST'] = $items;

			return "index";
		}


		function additem(){
			$online = $this->authUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->authUser->getUserData();
				$_REQUEST['items'] = $this->itemModel->getAllItems();
				$_REQUEST['producers'] = $this->producerModel->getAllProducers();
				$_REQUEST['categories'] = $this->categoryModel->getAllCategories();
			}
			$_REQUEST['ONLINE'] = $online;

			return "additempage";
		}

		function toadditem(){
			$item = new Item();
			$item->model = $_POST['model'];
			$item->producer = $_POST['producer'];
			$item->category = $_POST['category'];
			$item->price = $_POST['price'];
			$item->old_price = $_POST['price'];
			$item->xs = 0;
			$item->s = 0;
			$item->m = 0;
			$item->l = 0;
			$item->xl = 0;
			$item->xxl = 0;
			$item->from_6_to_7_years = 0;
			$item->from_8_to_9_years = 0;
			$item->from_10_to_11_years = 0;
			if($_POST['size']==="xs"){
				$item->xs = 1;
			}else if($_POST['size']==="s"){
				$item->s = 1;
			}else if($_POST['size']==="m"){
				$item->m = 1;
			}else if($_POST['size']==="l"){
				$item->l = 1;
			}else if($_POST['size']==="xl"){
				$item->xl = 1;
			}else if($_POST['size']==="xxl"){
				$item->xxl = 1;
			}else if($_POST['size']==="from_6_to_7_years"){
				$item->from_6_to_7_years = 1;
			}else if($_POST['size']==="from_8_to_9_years"){
				$item->from_8_to_9_years = 1;
			}else if($_POST['size']==="from_10_to_11_years"){
				$item->from_10_to_11_years = 1;
			}
			$item->color = $_POST['color'];
			$item->fabric = $_POST['fabric'];
			$item->sale = "no";
			if($_POST['img1']!=null){
				$item->img1 = $_POST['img1'];
			}else{
				$item->img1 = "none";
			}
			if($_POST['img2']!=null){
				$item->img2 = $_POST['img2'];
			}else{
				$item->img2 = "none";
			}
			if($_POST['img3']!=null){
				$item->img3 = $_POST['img3'];
			}else{
				$item->img3 = "none";
			}

			$this->itemModel->additem($item);

			header("Location:additem?success");
		}

		function updateitem(){
			$online = $this->authUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->authUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;

			$item = $this->itemModel->getItem($_POST['id']);
			$item->model = $_POST['model'];
			$item->producer = $_POST['producer'];
			$item->category = $_POST['category'];
			$item->price = $_POST['price'];
			$item->xs = $_POST['xs'];
			$item->s = $_POST['s'];
			$item->m = $_POST['m'];
			$item->l = $_POST['l'];
			$item->xl = $_POST['xl'];
			$item->xxl = $_POST['xxl'];
			$item->from_6_to_7_years = $_POST['from_6_to_7_years'];;
			$item->from_8_to_9_years = $_POST['from_8_to_9_years'];
			$item->from_10_to_11_years = $_POST['from_10_to_11_years'];
			$item->color = $_POST['color'];
			$item->fabric = $_POST['fabric'];
			$item->sale = "no";
			$item->img1 = $_POST['img1'];
			$item->img2 = $_POST['img2'];
			$item->img3 = $_POST['img3'];

			$this->itemModel->updateItem($item);

			header("Location:listitemspage");
		}

		function deleteitem(){
			$online = $this->authUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->authUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;

			if(isset($_POST['id'])){
				$this->itemModel->deleteItem($_POST['id']);
			}

			header("Location:listitemspage");
		}

		function listitems(){
			$online = $this->authUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->authUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;
			$_REQUEST['items'] = $this->itemModel->getAllItems();
			$_REQUEST['producers'] = $this->producerModel->getAllProducers();
			$_REQUEST['categories'] = $this->categoryModel->getAllCategories();

			return "listitemspage";
		}

		function details(){
			$online = $this->authUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->authUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;

			if(isset($_GET['id']) && is_numeric($_GET['id'])){
				$item = $this->itemModel->getItem($_GET['id']);
				$_REQUEST['item'] = $item;
				$_REQUEST['producers'] = $this->producerModel->getAllProducers();
				$_REQUEST['categories'] = $this->categoryModel->getAllCategories();
			}

			return "details";
		}


		function register(){
			$online = $this->authUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->authUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;

			return "registerpage";
		}

		function toregister(){

			$user = new User();
			$redirect = "register?passworderror";

			if($_POST['password']===$_POST['re_password']){
				$user = $this->userModel->getUser($_POST['email']);

				if($user!=null){
					$redirect = "register?exists";
				}else{
					$user->email = $_POST['email'];
					$_REQUEST['email'] = $user->email;
					$user->password = sha1($_POST['password']);
					$user->full_name = $_POST['full_name'];

					$this->userModel->addUser($user);
					$redirect = "register?success";
				}
			}

			header("Location:$redirect");
		}

		function login(){
			$online = $this->authUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->authUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;

			if(isset($_GET['admin'])){
				return "adminloginpage";
			}else{
				return "loginpage";
			}
		}

		function auth(){
			$redirect = "login?error";

			if(isset($_POST['email']) && isset($_POST['password'])){
				$email = $_POST['email'];
				$password = $_POST['password'];

				$user = $this->userModel->getUser($email);
				if($user!=null && $user->password===sha1($password)){

					$this->authUser->setUserData($user);
					$redirect = $_SESSION['current_page'];

				}
			}

			header("Location:$redirect");
		}

		function adminauth(){
			$redirect = "login?admin";

			if(isset($_POST['email']) && isset($_POST['password'])){
				$email = $_POST['email'];
				$password = $_POST['password'];

				$user = $this->adminUserModel->getUser($email);
				if($user!=null && $user->password===($password)){

					$this->authUser->setUserData($user);
					$redirect = "additem";

				}
			}

			header("Location:$redirect");
		}

		function logout(){
			$this->authUser->removeUserData();
			header("Location:index");
		}

		function profile(){
			$online = $this->authUser->checkOnline();
			$_REQUEST['ONLINE'] = $online;

			if($online){
				$user = $this->authUser->getUserData();
				$_REQUEST['USER'] = $user;
				$address = $this->addressModel->getAddress($user->id);
				if($address!=null){
					$_REQUEST['ADDRESS'] = $address;
				}else{
					$_REQUEST['ADDRESS'] = null;
				}
				$orders = $this->orderModel->getAllOrders($user->id);
				$_REQUEST['ORDERS'] = $orders;

				return "profilepage";

			}else{

				header("Location:login");

			}
		}

		function updateprofile(){
			$online = $this->authUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->authUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;
			return "updateprofilepage";
		}

		function toupdateprofile(){
			$redirect = "updateprofile?error";

			if(isset($_POST['id']) && isset($_POST['full_name']) && isset($_POST['email'])){
				$id = $_POST['id'];
				$user = $this->userModel->getUserById($id);
				if($user!=null){
					$user->email = $_POST['email'];
					$user->full_name = $_POST['full_name'];
					$this->authUser->setUserData($user);
					$this->userModel->updateUser($user);
					$redirect = "profile?success";
				}
			}
			header("Location:$redirect");
		}

		function updatepassword(){
			$online = $this->authUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->authUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;
			return "updatepasswordpage";
		}

		function toupdatepassword(){
			$redirect = "updatepassword?error";

			if(isset($_POST['old_pass']) && isset($_POST['pass']) && isset($_POST['re_pass'])){
				$id = $_POST['id'];
				$user = $this->userModel->getUserById($id);

				if($user!=null && ($user->password===sha1($_POST['old_pass']))){
					if($_POST['pass']===$_POST['re_pass']){
						$password = sha1($_POST['pass']);
						$this->userModel->updateUserPassword($id, $password);
						$user->password = $password;
						$this->authUser->setUserData($user);
						$redirect = "updateprofile?passwordsuccess";
					}else{
						$redirect = "updatepassword?passwordsmatcherror";
					}
				}else{
					$redirect = "updatepassword?oldpassworderror";
				}
			}
			header("Location:$redirect");
		}

		function toaddaddress(){
			$address = new Address();
			$address->user_id = $_POST['user_id'];
			$address->address1 = $_POST['address1'];
			$address->address2 = $_POST['address2'];
			$address->city = $_POST['city'];
			$address->country = $_POST['country'];
			$address->zip = $_POST['zip'];
			if(isset($_POST['checkbox']) && $_POST['checkbox']=="yes"){
				$address->receive_commercials = $_POST['checkbox'];
			}else{
				$address->receive_commercials = "no";
			}

			$this->addressModel->addAddress($address);

			header("Location:".$_SESSION['current_page']);
		}

		function toupdateaddress(){
			$address = new Address();
			$address->user_id = $_POST['user_id'];
			$address->address1 = $_POST['address1'];
			$address->address2 = $_POST['address2'];
			$address->city = $_POST['city'];
			$address->country = $_POST['country'];
			$address->zip = $_POST['zip'];
			if(isset($_POST['checkbox']) && $_POST['checkbox']=="yes"){
				$address->receive_commercials = $_POST['checkbox'];
			}else{
				$address->receive_commercials = "no";
			}

			$this->addressModel->updateAddress($address);

			header("Location:profile?success");
		}

		function todeleteaddress(){
			$this->addressModel->deleteAddress($_GET['id']);

			header("Location:profile");
		}

		function category(){
			$online = $this->authUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->authUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;

			$category = $_GET['id'];
			$items = $this->itemModel->getItemsByCategory($category);
			$producers = $this->producerModel->getAllProducers();
			$categories = $this->categoryModel->getAllCategories();
			$_REQUEST['ITEMS_LIST'] = $items;
			$_REQUEST['PRODUCERS_LIST'] = $producers;
			$_REQUEST['CATEGORIES_LIST'] = $categories;
			return "categorypage";
		}

		function product(){
			$id = $_GET['id'];
			$item = $this->itemModel->getItem($id);
			$_REQUEST['ITEM_OBJECT'] = $item;
			$producers = $this->producerModel->getAllProducers();
			$_REQUEST['PRODUCERS_LIST'] = $producers;
			$categories = $this->categoryModel->getAllCategories();
			$_REQUEST['CATEGORIES_LIST'] = $categories;
			$reviews = $this->reviewModel->getAllReviewsForItem($id);
			$_REQUEST['REVIEWS_LIST'] = $reviews;
			$reviewLikes = $this->reviewModel->getAllReviewLikes();
			$_REQUEST['REVIEW_LIKES_LIST'] = $reviewLikes;
			$users = $this->userModel->getAllUsers();
			$_REQUEST['USERS_LIST'] = $users;
			$_REQUEST['AVERAGE_STARS_COUNT'] = $this->reviewModel->getAverageStarsCount($reviews);

			$online = $this->authUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->authUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;

			return "productpage";
		}

		function addtocart(){

			if(isset($_SESSION['CART'])){
				$cart = $_SESSION['CART'];
				array_push($cart, (object)[
			        'item_id' => $_POST['id'],
			        'model' => $_POST['model'],
			        'price' => $_POST['price'],
			        'size' => $_POST['size'],
			        'img1' => $_POST['img1'],
			        'quantity' => 1
				]);
				$_SESSION['CART'] = $cart;
			}else{
				$cart[] = (object)['item_id' => $_POST['id'],
				   'model' => $_POST['model'],
	               'price' => $_POST['price'],
	               'size' => $_POST['size'],
	               'img1' => $_POST['img1'],
	           	   'quantity' => 1];
				$_SESSION['CART'] = $cart;
			}

			// $online = $this->authUser->checkOnline();
			// if($online){
			// 	$_REQUEST['USER'] = $this->authUser->getUserData();
			// }
			// $_REQUEST['ONLINE'] = $online;

			header("Location:".$_SESSION['current_page']);
		}

		function deletefromcart(){

			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$cart = $_SESSION['CART'];
				unset($cart[$id]);
			}else{
				$cart = $_SESSION['CART'];
				unset($cart);
			}

			$_SESSION['CART'] = $cart;
			
			header("Location: basket");
		}

		function basket(){
			// session_destroy();
			// unset($_SESSION['CART']);
			// $item = $this->itemModel->getItem($_SESSION['name'][0]);
			// $_REQUEST['ITEM_OBJECT'] = $item;
			$online = $this->authUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->authUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;

			return "basket";
		}

		function deliveryaddress(){
			
			$online = $this->authUser->checkOnline();
			if($online){
				$user = $this->authUser->getUserData();
				$_REQUEST['USER'] = $user;
				$address = $this->addressModel->getAddress($user->id);
				if($address!=null){
					$_REQUEST['ADDRESS'] = $address;
				}else{
					$_REQUEST['ADDRESS'] = null;
				}
			}
			$_REQUEST['ONLINE'] = $online;

			return "deliveryaddress";
		}

		function payment(){
			
			$online = $this->authUser->checkOnline();
			if($online){
				$_REQUEST['USER'] = $this->authUser->getUserData();
			}
			$_REQUEST['ONLINE'] = $online;

			return "paymentpage";
		}

		function tosubmitpayment(){
			$online = $this->authUser->checkOnline();
			if($online){
				$user = $this->authUser->getUserData();
				$_REQUEST['USER'] = $user;
				$address = $this->addressModel->getAddress($user->id);
				if($address!=null){
					$_REQUEST['ADDRESS'] = $address;
				}else{
					$_REQUEST['ADDRESS'] = null;
				}
				$cart = $_SESSION['CART'];
				if($cart!=null){
					foreach($cart as $item){
						$this->orderModel->addOrder($user->id, $item);
					}
				}
				unset($_SESSION['CART']);
				unset($_SESSION['SUM']);
				unset($_SESSION['QUANTITY']);
			}
			$_REQUEST['ONLINE'] = $online;

			return "successfulpurchase";
		}

		function toaddreview(){
			$review = new Review();
			$review->item_id = $_POST['item_id'];
			$review->user_id = $_POST['user_id'];
			$review->review_text = htmlspecialchars($_POST['review_text']);
			$review->stars_count = $_POST['stars_count'];
			$review->like_count = 0;
			$this->reviewModel->addReview($review);

			header("Location:product?id=".$_POST['item_id']);
		}

		function todeletereview(){
			$this->reviewModel->deleteReview($_POST['review_id']);

			header("Location:".$_SESSION['current_page']);
		}

		function toremovelike(){
			$this->reviewModel->deleteLike($_POST['review_id'], $_POST['user_id']);
			$this->reviewModel->updateLikesCount($_POST['review_id'], $_POST['like_count']-1);

			header("Location:".$_SESSION['current_page']);
		}

		function toaddlike(){
			$this->reviewModel->addLike($_POST['review_id'], $_POST['user_id']);
			$this->reviewModel->updateLikesCount($_POST['review_id'], $_POST['like_count']+1);

			header("Location:".$_SESSION['current_page']);
		}

	}

?>