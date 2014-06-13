<?php

	session_start();

	$idPonude=$_POST['idPonude'];
	$cijena=$_POST['priceUpdate'];
	$datum=$_POST['dateUpdate'];
		

	$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti") or die('Error connecting to database');

	$query = "UPDATE ponuda SET DatumPolaska=?, Cijena=? WHERE Id=?;";

	$stmt = mysqli_stmt_init($dbc);

	if(mysqli_stmt_prepare($stmt,$query)) {
		mysqli_stmt_bind_param($stmt,'sii',$datum,$cijena,$idPonude);
	}
	
	$izvrseno = mysqli_stmt_execute($stmt);

	if($izvrseno){
		mysqli_stmt_close($stmt);
		mysqli_close($dbc);
		header("Location: /Jednodnevni_izleti/administrator.php");
	}else {
		mysqli_stmt_close($stmt);
		mysqli_close($dbc);
	
	}

?>