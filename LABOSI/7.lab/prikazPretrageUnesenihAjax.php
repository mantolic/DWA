<?php include ('sesija.php');?>	
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
    <title>Dinamičke web aplikacije</title>
	
	<link rel="stylesheet" href="css/grid.css" />
	<link rel="stylesheet" href="css/stil.css" />
	  <link rel="stylesheet" href="css/normalize.css" />
			<script>
		 	
		
		var current = 0;
	function prikazi() {
		current = 0;
		var xmlhttp;
		xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
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
		
		var ime = document.getElementById("ime").value;
		var prezime = document.getElementById("prezime").value;
		var krvnaGr = document.getElementById("krvnaGr").value;
		var tipKrvi = document.getElementById("tipKrvi").value;
		
		xmlhttp.open("GET","bazaTrazi.php?ime="+ime+"&prezime="+prezime+"&krvnaGr="+krvnaGr+"&tipKrvi="+tipKrvi,true);
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
<li><a href="prikazPretrageUnesenihAjax.php">Pretraga pacijenata -ajax</a></li>

</ul>
</div>

		<div class="ime column colum-9">
		<h2>Pretraga pacijenata</h2>
			
				<table class="unos">
					<tr>
						<td><label for="name">Ime</label></td>
						<td><input type="text" name="ime" id="ime"></td>
					</tr>
					<tr>
						<td><label for="surname">Prezime</label></td>
						<td><input type="text" name="prezime" id="prezime"></td>
					</tr>
					<tr>
						<td><label for="bloodGroup">Krvna grupa</label></td>
						<td><select name="krvnaGr" id="krvnaGr">
								<option value=""></option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="AB">AB</option>		
								<option value="O">0</option>			
							</select>
							<select name="tipKrvi" id="tipKrvi">
								<option value=""></option>
								<option value="+">+ (pos)</option>
								<option value="-">- (neg)</option>
							</select></td>
					<tr>
						<td></td>
						<td><button onClick="prikazi()" style="width:90px;">Pronađi</button></td>						
				</table>
		
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
		
		</div>
</section>
<div class="futer"></br>
<strong>© ZKD, 2014</strong>
</div>

</body>
</html>