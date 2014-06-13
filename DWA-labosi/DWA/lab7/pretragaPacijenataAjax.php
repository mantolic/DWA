<?php include ('sesija.php'); ?>	

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/grid.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<meta charset="UTF-8">
	
	<script>
	var current = 0;
	function showText() {
		current = 0;
		var xmlhttp;
		xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
				//document.getElementById("description").innerHTML = xmlhttp.responseText;
				podaci=JSON.parse(xmlhttp.responseText);		
				
				document.getElementById("rb").innerHTML = 1;
				document.getElementById("ime").innerHTML = podaci[0].ime;
				document.getElementById("prezime").innerHTML = podaci[0].prezime;
				document.getElementById("spol").innerHTML = podaci[0].spol;
				document.getElementById("datum").innerHTML = podaci[0].datumRodenja;
				document.getElementById("mjesto").innerHTML = podaci[0].mjestoRodenja;
				document.getElementById("adresa").innerHTML = podaci[0].adresa;
				document.getElementById("grupa").innerHTML = podaci[0].krvnaGrupa;
				document.getElementById("tip").innerHTML = podaci[0].tipKrvi;
				document.getElementById("tegoba").innerHTML = podaci[0].opisTegobe;
				document.getElementById("alergija").innerHTML = podaci[0].opisAlergije;
			}
		}
		
		var name = document.getElementById("name").value;
		var surname = document.getElementById("surname").value;
		var bloodGroup = document.getElementById("bloodGroup").value;
		var bloodType = document.getElementById("bloodType").value;
		
		//xmlhttp.open("GET","script-trazi.php?firstname="+name+"&lastname="+surname+"&bloodGroup="+bloodGroup+"&bloodType="+bloodType,true);
		xmlhttp.open("GET","script-trazi.php?firstname="+name+"&lastname="+surname+"&bloodGroup="+bloodGroup+"&bloodType="+bloodType,true);
		xmlhttp.send();
		};
	
		function sljedeci() {
			if (current<podaci.length-1){
			current++;
				document.getElementById("rb").innerHTML = current+1;
				document.getElementById("ime").innerHTML = podaci[current].ime;
				document.getElementById("prezime").innerHTML = podaci[current].prezime;
				document.getElementById("spol").innerHTML = podaci[current].spol;
				document.getElementById("datum").innerHTML = podaci[current].datumRodenja;
				document.getElementById("mjesto").innerHTML = podaci[current].mjestoRodenja;
				document.getElementById("adresa").innerHTML = podaci[current].adresa;
				document.getElementById("grupa").innerHTML = podaci[current].krvnaGrupa;
				document.getElementById("tip").innerHTML = podaci[current].tipKrvi;
				document.getElementById("tegoba").innerHTML = podaci[current].opisTegobe;
				document.getElementById("alergija").innerHTML = podaci[current].opisAlergije;				
			}
		}
		
		function prethodni() {
			if (current>0){
			current--;
				document.getElementById("rb").innerHTML = current+1;
				document.getElementById("ime").innerHTML = podaci[current].ime;
				document.getElementById("prezime").innerHTML = podaci[current].prezime;
				document.getElementById("spol").innerHTML = podaci[current].spol;
				document.getElementById("datum").innerHTML = podaci[current].datumRodenja;
				document.getElementById("mjesto").innerHTML = podaci[current].mjestoRodenja;
				document.getElementById("adresa").innerHTML = podaci[current].adresa;
				document.getElementById("grupa").innerHTML = podaci[current].krvnaGrupa;
				document.getElementById("tip").innerHTML = podaci[current].tipKrvi;
				document.getElementById("tegoba").innerHTML = podaci[current].opisTegobe;
				document.getElementById("alergija").innerHTML = podaci[current].opisAlergije;
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
				<li><a href="#">Pretraga pacijenata</a></li>				
			</ul>
		</aside>
		<article class="column column-8">
			<h2>Pretraga pacijenata</h2>
			
				<table class="unos">
					<tr>
						<td><label for="name">Ime</label></td>
						<td><input type="text" name="firstname" id="name"></td>
					</tr>
					<tr>
						<td><label for="surname">Prezime</label></td>
						<td><input type="text" name="lastname" id="surname"></td>
					</tr>
					<tr>
						<td><label for="bloodGroup">Krvna grupa</label></td>
						<td><select name="bloodGroup" id="bloodGroup">
								<option value=""></option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="AB">AB</option>		
								<option value="O">0</option>			
							</select>
							<select name="bloodType" id="bloodType">
								<option value=""></option>
								<option value="+">+ (pos)</option>
								<option value="-">- (neg)</option>
							</select></td>
					<tr>
						<td></td>
						<td><button onClick="showText()" style="width:90px;">Učitaj</button></td>						
				</table>
			
			
			<div class="ispis">
			<!-- <div id="description">**Opis**</div> -->
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
						<td>Tip krvi:</td>
						<td><label id="tip"></label></td>
					</tr>
					<tr>
						<td>Tegobe:</td>
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
		</article>
	</div>
	<footer>
		<div class="row">
		<h4>Copyright ZKD, 2014</h4>
		</div>
	</footer>
</body>
</html>