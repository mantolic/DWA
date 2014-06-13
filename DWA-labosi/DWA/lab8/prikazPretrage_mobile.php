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

	$db = new PDO('mysql:host=localhost;dbname=ljekarna;charset=UTF8', 'root', '123');
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

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>

	<style>
		body a:link, a:visited , a:hover, a:active{
			text-decoration:none;
			color: white;
		}
	</style>
	
	<script>
		var a = <?php echo json_encode($people); ?>;
		
		//var a = JSON.parse(b);
		
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
	<div data-role="page" id="pageone">
		<div data-role="header">
			<div class="ui-content">
			<div class="logo">
				<img src="img/logo.png" alt="logo"/>
			</div>
			<div class="status">
				<?php echo $_SESSION['user']; ?>
				<button type="button" onclick="location.href='<?php echo getUrl("odjava"); ?>'">Odjava</button>
			</div>
		</div>
			<div data-role="navbar">
				<ul>
					<li><a href="zivotopis.php">Osobni podaci</a></li>
					<li><a href="popis.php">Popis pacijenata</a></li>
					<li><a href="unos.php">Unos pacijenata</a></li>
					<li><a href="filtriranjePodataka.php">Ispis podataka</a></li>
					<li><a href="grafikoni.php">Grafovi</a></li>
					<li><a href="trazi.php">Pretraga doktora</a></li>
				</ul>
			</div>
		</div>
	
		<div data-role="main" class="ui-content">
			<table data-role="table" id="myTable" data-mode="columntoggle" >
			<thead><th></th><th></th></thead>
			<tbody>
				<tr>
					<td>Rd.broj:</td>
					<td><label id="rb"></label></td>
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
				</tbody>
			</table>
		<!--<script>/*
		document.getElementById("rb").innerHTML = 1;
		document.getElementById("ime").innerHTML = a[current].ime;
		document.getElementById("prezime").innerHTML = a[current].prezime;
		document.getElementById("spol").innerHTML = a[current].spol;
		document.getElementById("datum").innerHTML = a[current].datumRodenja;
		document.getElementById("mjesto").innerHTML = a[current].mjestoRodenja;
		document.getElementById("adresa").innerHTML = a[current].adresa;
		document.getElementById("grupa").innerHTML = a[current].krvnaGrupa;
		document.getElementById("tip").innerHTML = a[current].tipKrvi;
		document.getElementById("tegoba").innerHTML = a[current].opisTegobe;
		document.getElementById("alergija").innerHTML = a[current].opisAlergije;*/
		</script>-->
		
		<!-- za 6 lab 
		<script>
		$("#sljedeciGumb").click(function() {
			sljedeci();
			});
		</script>
		-->
		
		</div>
	</div>

	<div data-role="footer">
		<h4>Copyright ZKD, 2014</h4>
	</div>
</body>
</html>