<?php 
	
	function __autoload($className){
		require_once(strtolower(str_replace("\\", "/", $className)).'.php'); //потому что мак :/
	}

	use controllers\MainController;
	$controller = new MainController();

	require_once "views/".$controller->process().".php";

?>