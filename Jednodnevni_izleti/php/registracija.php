<?php

	session_start();

	$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti") or die('Error connecting to database');

	$query = "INSERT INTO Korisnik (Ime, Prezime, Adresa, Email, Username, Password, GradoviId, RolaID)
	VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

	$stmt = mysqli_stmt_init($dbc);

	if(mysqli_stmt_prepare($stmt,$query)) {
		mysqli_stmt_bind_param($stmt,'ssssssii',$ime, $prezime, $adresa, $email, $korIme, $kripLozinka, $grad , $rola);
	}

	$ime = $_POST['ime'];
	$prezime = $_POST['prezime'];
	$adresa = $_POST['adresa'];
	$grad = $_POST['gradd'];
	$email = $_POST['email'];
	$korIme = $_POST['korIme'];
	$lozinka = $_POST['lozinka'];
	$kripLozinka = md5($lozinka);
	$rola = 2;
	
	$izvrseno = mysqli_stmt_execute($stmt);

	if($izvrseno){
		session_start();
		$_SESSION['korIme'] = $korIme;
		$_SESSION['rola'] = $rola;
		$_SESSION['timeout'] = time();
		$_SESSION['korId'] = mysqli_insert_id($dbc);

		mysqli_stmt_close($stmt);
		mysqli_close($dbc);
		header("Location: /Jednodnevni_izleti/korisnik.php");
	}else {
		mysqli_stmt_close($stmt);
		mysqli_close($dbc);
		echo ("<script>
			alert('Pogrešni podaci kod logiranja');
			window.location.href='/Jednodnevni_izleti/index.php';
			</script>");
	}

?>