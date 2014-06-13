<?php

	$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti");
										
	if (mysqli_connect_errno()) {
	    printf("Error connecting to database: %s\n", mysqli_connect_error());
	    exit();
	}

	$queryDeleteUser = "DELETE FROM korisnik WHERE korisnik.Username=?";
	
	$stmtDeleteUser = mysqli_stmt_init($dbc);

	if(mysqli_stmt_prepare($stmtDeleteUser,$queryDeleteUser)) {
		mysqli_stmt_bind_param($stmtDeleteUser,'s', $idKorisnika);
	}

	$idKorisnika = $_POST['korisnickoIme'];

	$izvrseno = mysqli_stmt_execute($stmtDeleteUser);

	if($izvrseno){
		mysqli_stmt_close($stmtDeleteUser);
		mysqli_close($dbc);
		header("Location: /Jednodnevni_izleti/administrator.php");
	}else {
		mysqli_stmt_close($stmtDeleteUser);
		mysqli_close($dbc);
	}

?>