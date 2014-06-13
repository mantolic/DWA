<?php

	$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti");
										
	if (mysqli_connect_errno()) {
	    printf("Error connecting to database: %s\n", mysqli_connect_error());
	    exit();
	}

	$queryKupljenaPonuda = "DELETE FROM kupljenaponuda WHERE kupljenaponuda.Id=?";
	
	$stmtKupljenaPonuda = mysqli_stmt_init($dbc);

	if(mysqli_stmt_prepare($stmtKupljenaPonuda,$queryKupljenaPonuda)) {
		mysqli_stmt_bind_param($stmtKupljenaPonuda,'i', $idKupljenePonude);
	}

	$idKupljenePonude = $_POST['idKupljenePonude'];

	$izvrsenoKupljenaPonuda = mysqli_stmt_execute($stmtKupljenaPonuda);

	if($izvrsenoKupljenaPonuda){
		mysqli_stmt_close($stmtKupljenaPonuda);
		mysqli_close($dbc);
		header("Location: /Jednodnevni_izleti/korisnik.php");
	}else {
		mysqli_stmt_close($stmtKupljenaPonuda);
		mysqli_close($dbc);
	}

?>