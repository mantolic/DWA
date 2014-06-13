<?php include ('sesija.php'); ?>

<?php
	$ime1=$_POST['firstname'];
	$prezime1=$_POST['lastname'];
	$krv1=$_POST['bloodGroup'];
	$znak1=$_POST['bloodType'];

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
	
	/*var_dump($people);*/
?>				
				
				

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/grid.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<meta charset="UTF-8">
	<script>
		var a = <?php echo json_encode($people); ?>
		
		//var b = JSON.parse(a);
		
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
	<header>
		<div class="row">
			<div class="logo">
				<img src="img/logo.png" alt="logo"/>
			</div>
			<div class="status">
				<?php echo $_SESSION['user']; ?>
				<button type="button" onclick="location.href='<?php echo getUrl("odjava"); ?>'">Odjava</button>
			</div>
		</div>
	</header>
	
	<div class="row wrapper">
		<aside class="column column-4">
			<ul>
				<li><a href="zivotopis.php">Osobni podaci</a></li>
				<li><a href="popis.php">Popis pacijenata</a></li>
				<li><a href="unos.php">Unos pacijenata</a></li>
				<li><a href="filtriranjePodataka.php">Ispis podataka</a></li>
				<li><a href="grafikoni.php">Grafovi</a></li>
				<li><a href="trazi.php">Pretraga doktora</a></li>
				<li><a href="pretragaPacijenata.php">Pretraga pacijenata</a></li>
			</ul>
		</aside>
		<article class="column column-8">
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
		
		<!-- za 6 lab 
		<script>
		$("#sljedeciGumb").click(function() {
			sljedeci();
			});
		</script>
		-->
		
		</article>
	</div>
	<footer>
		<div class="row">
		<h4>Copyright ZKD, 2014</h4>
		</div>
	</footer>
</body>
</html>