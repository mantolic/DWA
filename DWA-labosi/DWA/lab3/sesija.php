<?php

	session_start();

	if(!isset($_SESSION['korIme'])){
		header("Location: login.html");
	}

	$inactive = 1800;

	if(isset($_SESSION['timeout'])){
		$session_life = time() - $_SESSION['timeout']; 
		
		if($session_life > $inactive) {
		   session_unset();
		   session_destroy();
		   echo ('<script type="text/javascript">alert("Isteklo je vrijeme prijave. Za nastavak prijavite se ponovo");</script>');
		   header("Location: login.html");
		}
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