<?php

	session_start();

	if(!isset($_SESSION['userName'])){
		header("Location: login.html");
	}

	if(empty($_GET["page"]))
		$page = "index";
	else
		$page = $_GET["page"];

	function getUrl($page){
		return "?page=$page";
	}

	if($page=="odjava") {
		session_unset();
		session_destroy();
		header("Location: login.html");
	}

?>
