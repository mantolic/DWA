<?php

	$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti");
										
	if (mysqli_connect_errno()) {
	    printf("Error connecting to database: %s\n", mysqli_connect_error());
	    exit();
	}

	$queryPonuda = "DELETE FROM ponuda WHERE ponuda.Id=?";
	
	$stmtPonuda = mysqli_stmt_init($dbc);

	if(mysqli_stmt_prepare($stmtPonuda,$queryPonuda)) {
		mysqli_stmt_bind_param($stmtPonuda,'i', $idPonude);
	}

	$idPonude = $_POST['idPonude'];

	$izvrsenoPonuda = mysqli_stmt_execute($stmtPonuda);

	if($izvrsenoPonuda){
		mysqli_stmt_close($stmtPonuda);
		mysqli_close($dbc);
		header("Location: /Jednodnevni_izleti/administrator.php");
	}else {
		mysqli_stmt_close($stmtPonuda);
		mysqli_close($dbc);
	}

?>