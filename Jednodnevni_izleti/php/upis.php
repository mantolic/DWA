<?php
	session_start();
	//kod za upis izleta, tj. prijavu na određeni izlet
	
	echo("Upisali ste se: ".$_POST['idPonude']);

	$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti") or die('Error connecting to database');
	
	$queryPonuda="INSERT INTO kupljenaPonuda (PonudaId,KorisnikId,DatumKupovine) VALUES (?,?,?)";
	$stmtPonuda = mysqli_stmt_init($dbc);

	if(mysqli_stmt_prepare($stmtPonuda,$queryPonuda)) {
		mysqli_stmt_bind_param($stmtPonuda,'iis',$ponuda,$korisnik,$datum);
	}
	
	date_default_timezone_set('Europe/Zagreb');
	$ponuda = $_POST['idPonude'];
	$korisnik = $_SESSION['korId'];
	$datum = date("Y-m-d");

	$izvrseno = mysqli_stmt_execute($stmtPonuda);
	
	if($izvrseno){
		mysqli_stmt_close($stmtPonuda);
		mysqli_close($dbc);
		header("Location: /Jednodnevni_izleti/korisnik.php");
	}else {
		mysqli_stmt_close($stmtPonuda);
		mysqli_close($dbc);
		echo ("Error quering database");
	}

?>