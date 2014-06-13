<?php
	$ime1=$_GET['firstname'];
	$prezime1=$_GET['lastname'];
	$krv1=$_GET['bloodGroup'];
	$znak1=$_GET['bloodType'];

	unset($sql);

	if ($ime1) {
		$sql[] = " ime like '$ime1' ";
	}
	if ($prezime1) {
		$sql[] = " prezime = '$prezime1' ";
	}
	if($krv1) {
				if($krv1=='O'){
		$krv1='0';
		}
		$sql[] = " krvnaGrupa = '$krv1' ";
	}
	if($znak1) {
		$sql[] = " tipKrvi = '$znak1' ";
	}

	$query1 = "SELECT ime, prezime, spol, datumRodenja, mjestoRodenja, adresa, krvnaGrupa,tipKrvi, tegobe,opisTegobe, alergije, opisAlergije FROM podaci";

	if (!empty($sql)) {
		$query1 .= ' WHERE ' . implode(' AND ', $sql);
	}

	$db = new PDO('mysql:host=localhost;dbname=ljekarna;charset=UTF8', 'root', 'root');
	$query = $db->prepare("$query1");
	$query->execute();
	$people = $query->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($people);
	
	/*var_dump($people);*/
?>				
				
		