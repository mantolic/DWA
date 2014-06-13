<?php

	session_start();
		$korIme=$_POST['username'];
	$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti") or die('Error connecting to database');

	$query = "UPDATE Korisnik SET Ime=?, Prezime=?, Adresa=?, Email=?, Password=?, GradoviId=? WHERE Korisnik.Username= ?;";

	$stmt = mysqli_stmt_init($dbc);

	if(mysqli_stmt_prepare($stmt,$query)) {
		mysqli_stmt_bind_param($stmt,'sssssis',$ime, $prezime, $adresa, $email, $kripLozinka, $grad, $korIme);
	}
	
	
	$ime = $_POST['ime'];
	$prezime = $_POST['prezime'];
	$adresa = $_POST['adresa'];
	$grad = $_POST['gradd'];
	$email = $_POST['email'];
	$lozinka = $_POST['lozinka'];
	$kripLozinka = md5($lozinka);
	
	$izvrseno = mysqli_stmt_execute($stmt);

	if($izvrseno){
		mysqli_stmt_close($stmt);
		mysqli_close($dbc);
		header("Location: /Jednodnevni_izleti/korisnik.php");
	}else {
		mysqli_stmt_close($stmt);
		mysqli_close($dbc);
	
	}

?>