<?php 

/*	
	echo $_POST['title'];
	echo $_POST['descriptionHr'];
	echo $_POST['descriptionEn'];
	echo $_POST['descriptionDe'];
	echo $_POST['date'];
	echo 'img/'.$_POST['image'];
	echo $_POST['type'];
	echo $_POST['price'];
*/
	$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti") or die('Error connecting to database');
	
	$queryPonuda="INSERT INTO ponuda (Naziv,Opis_hr,Opis_en,Opis_de,DatumPolaska,Slika,VrstaId,Cijena) VALUES (?,?,?,?,?,?,?,?)";
	$stmtPonuda = mysqli_stmt_init($dbc);

	if(mysqli_stmt_prepare($stmtPonuda,$queryPonuda)) {
		mysqli_stmt_bind_param($stmtPonuda,'ssssssii',$nazivPonude,$opisHr,$opisEn,$opisDe,$datum,$slika,$vrsta,$cijena);
	}
	
	$nazivPonude = $_POST['title'];
	$opisHr = $_POST['descriptionHr'];
	$opisEn = $_POST['descriptionEn'];
	$opisDe = $_POST['descriptionDe'];
	$datum = $_POST['date'];
	$slika = 'img/'.$_POST['image'];
	$vrsta = $_POST['type'];
	$cijena = $_POST['price'];

	$izvrseno = mysqli_stmt_execute($stmtPonuda);
	
	if($izvrseno){
		mysqli_stmt_close($stmtPonuda);
		mysqli_close($dbc);
		header("Location: /Jednodnevni_izleti/administrator.php");
	}else {
		mysqli_stmt_close($stmtPonuda);
		mysqli_close($dbc);
		echo ("Error quering database");
	}

?>