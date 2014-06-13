<?php

	$korIme = $_POST['korIme'];
	$lozinka = $_POST['lozinka'];
	$kripLozinka = md5($lozinka);
	$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti") or die('Error connecting to database');

	$query = "SELECT RolaId, Id FROM Korisnik WHERE Username= ? AND Password = ?;";

	$stmt = mysqli_stmt_init($dbc);

	if(mysqli_stmt_prepare($stmt,$query)) {
		mysqli_stmt_bind_param($stmt,'ss',$korIme,$kripLozinka);
	}

	$izvrseno = mysqli_stmt_execute($stmt);

	if($izvrseno){
		mysqli_stmt_bind_result($stmt, $rola, $idKor);
		mysqli_stmt_fetch($stmt);
		if($idKor>0) {
			session_start();
			$_SESSION['korIme'] = $korIme;
			$_SESSION['rola'] = $rola;
			$_SESSION['korId'] = $idKor;
			$_SESSION['timeout']=time();

			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
			
			if($rola==1){
				header("Location: /Jednodnevni_izleti/administrator.php");
			}
			else
				header("Location: /Jednodnevni_izleti/korisnik.php");
		}else {
			echo ("<script>
				alert('Pogrešni podaci kod logiranja');
				window.location.href='/Jednodnevni_izleti/index.php';
				</script>");
		}
	}else {
		mysqli_stmt_close($stmt);
		mysqli_close($dbc);
		echo ("<script>
			alert('Pogrešni podaci kod logiranja');
			window.location.href='/Jednodnevni_izleti/index.php';
			</script>");
		
	}
?>