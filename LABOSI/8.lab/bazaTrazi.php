<?php

	$ime1=$_POST['ime'];
	$prezime1=$_POST['prezime'];
	$krv1=$_POST['krvnaGr'];
	$krv2=$_POST['tipKrvi'];

	unset($sql);

	if ($ime1) {
		$sql[] = " ime = '$ime1' ";
	}
	if ($prezime1) {
		$sql[] = " prezime = '$prezime1' ";
	}
	if($krv1) {
		$sql[] = " krvnaGrupa = '$krv1' ";
	}
	if($krv2) {
		$sql[] = " tipKrvi = '$krv2' ";
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
	
?>	