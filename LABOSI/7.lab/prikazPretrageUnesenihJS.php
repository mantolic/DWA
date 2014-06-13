<?php include ('sesija.php'); 

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
	
?>	

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
    <title>Dinamičke web aplikacije</title>
	
	<link rel="stylesheet" href="css/grid.css" />
	<link rel="stylesheet" href="css/stil.css" />
	  <link rel="stylesheet" href="css/normalize.css" />
			<script>
		var a = <?php echo json_encode($people); ?>
	
		
		var current = 0;
		
		function sljedeci() {
			if (current<a.length-1){
			current++;
				document.getElementById("rb").innerHTML = current+1;
				document.getElementById("ime").innerHTML = a[current].ime;
				document.getElementById("prezime").innerHTML = a[current].prezime;
				document.getElementById("spol").innerHTML = a[current].spol;
				document.getElementById("datum").innerHTML = a[current].datumRodenja;
				document.getElementById("mjesto").innerHTML = a[current].mjestoRodenja;
				document.getElementById("adresa").innerHTML = a[current].adresa;
				document.getElementById("grupa").innerHTML = a[current].krvnaGrupa;
				document.getElementById("tip").innerHTML = a[current].tipKrvi;
				document.getElementById("tegoba").innerHTML = a[current].opisTegobe;
				document.getElementById("alergija").innerHTML = a[current].opisAlergije;
			}
		}
		
		function prethodni() {
			if (current>0){
			current--;
				document.getElementById("rb").innerHTML = current+1;
				document.getElementById("ime").innerHTML = a[current].ime;
				document.getElementById("prezime").innerHTML = a[current].prezime;
				document.getElementById("spol").innerHTML = a[current].spol;
				document.getElementById("datum").innerHTML = a[current].datumRodenja;
				document.getElementById("mjesto").innerHTML = a[current].mjestoRodenja;
				document.getElementById("adresa").innerHTML = a[current].adresa;
				document.getElementById("grupa").innerHTML = a[current].krvnaGrupa;
				document.getElementById("tip").innerHTML = a[current].tipKrvi;
				document.getElementById("tegoba").innerHTML = a[current].opisTegobe;
				document.getElementById("alergija").innerHTML = a[current].opisAlergije;
			}
		}
	</script>
	  
</head>

<body>
<div class="heder1">
</div>
 <section class="Tijelo row">
	  <div class="logo column column-3">
	 <img class="slika" src="logo.png" height="30%" width="50%">
	 </br>
</div>

<div class="ime column colum-9">

 <button name="odjava" type="button">Odjava</button>
</div>
</section>

 <section class="Tijelo row">
	  <div class="meni column column-3">
	<ul>
<li><a href="zivotopis.php#Osobni">Osobni podatci</a></li>
<li><a href="zivotopis.php#Podatci">Podatci o školovanju</a></li>
<li><a href="zivotopis.php#Znanja">Znanja i vještine</a></li>
<li><a href="pacjenti.php">Pacjenti</a></li>
<li><a href="unosPacjenta.html">Unos pacjenta</a></li>
<li><a href="unosFilteraPDF.html">Ispis u PDF po kriterijima</a></li>
<li><a href="grafovi.php">Grafovi</a></li>
<li><a href="pretragaDoktora.php">Pretraga doktora</a></li>
<li><a href="pretragaUnesenih.php">Pretraga pacijenata</a></li>

</ul>
</div>
		<div class="ime column colum-9">
		<div class="ispis">
			<table>
				<tr>
					<td>Rd.broj:</td>
					<td>#<label id="rb"></label></td>
				</tr>
				<tr>
					<td>Ime:</td>
					<td><label id="ime"></label></td>
				</tr>
				<tr>
					<td>Prezime:</td>
					<td><label id="prezime"></label></td>
				</tr>
				<tr>
					<td>Spol:</td>
					<td><label id="spol"></label></td>
				</tr>
				<tr>
					<td>Datum rođenja:</td>
					<td><label id="datum"></label></td>
				</tr>
				<tr>
					<td>Mjesto rođenja:</td>
					<td><label id="mjesto"></label></td>
				</tr>
				<tr>
					<td>Adresa:</td>
					<td><label id="adresa"></label></td>
				</tr>
				<tr>
					<td>Krvna grupa:</td>
					<td><label id="grupa"></label></td>
				</tr>
				<tr>
					<td>Tip krvi</td>
					<td><label id="tip"></label></td>
				</tr>
				<tr>
					<td>Tegobe</td>
					<td><label id="tegoba"></label></td>
				</tr>
				<tr>
					<td>Alergije</td>
					<td><label id="alergija"></label></td>
				</tr>
				<tr>
					<td><input type="button" value="Prethodni" onClick="prethodni()" /></td>
					<td><input type="button" value="Sljedeći" onClick="sljedeci()" /></td>
				</tr>
			</table>
			</div>
					<script>
		document.getElementById("rb").innerHTML = current+1;
		document.getElementById("ime").innerHTML = a[current].ime;
		document.getElementById("prezime").innerHTML = a[current].prezime;
		document.getElementById("spol").innerHTML = a[current].spol;
		document.getElementById("datum").innerHTML = a[current].datumRodenja;
		document.getElementById("mjesto").innerHTML = a[current].mjestoRodenja;
		document.getElementById("adresa").innerHTML = a[current].adresa;
		document.getElementById("grupa").innerHTML = a[current].krvnaGrupa;
		document.getElementById("tip").innerHTML = a[current].tipKrvi;
		document.getElementById("tegoba").innerHTML = a[current].opisTegobe;
		document.getElementById("alergija").innerHTML = a[current].opisAlergije;
		</script>
		
		</div>
</section>
<div class="futer"></br>
<strong>© ZKD, 2014</strong>
</div>

</body>
</html>