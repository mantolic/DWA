<?php include ('sesija.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
    <title>Dinamičke web aplikacije</title>
	
	<link rel="stylesheet" href="css/grid.css" />
	<link rel="stylesheet" href="css/stil.css" />
	  <link rel="stylesheet" href="css/normalize.css" />
	  	<script>
		function prikazi(_id) {
			var x = document.getElementById(_id);
			if(x.style.display == 'table')
				x.style.display = 'none';
			else x.style.display = 'table';
		}
		function sakrij(_id) {
			var x = document.getElementById(_id);
			x.style.zIndex = -9999;
			x.style.visibility = 'hidden';
		}
	</script>
	
</head>

<body>
<div class="heder1">
</div>
 <section class="Tijelo row">
	  <div class="logo column column-3">
	 <img class="slika" src="logo.png" alt="Smiley face" height="30%" width="50%">
	 </br>
</div>

<div class="ime column colum-9">

<button type="button" onclick="location.href='<?php echo getUrl("odjava"); ?>'">Odjava</button>
</div>
</section>

 <section class="Tijelo row">
 		<div id="reklama">
			<h1 style="color:red;">Tata kupi kolača, bombona i naranče dvije.</h1>
			<form><button type="button" onclick="sakrij('reklama')" style="color:red;">Zatvori</button></form>
		</div>
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

<p onclick="prikazi('Osobni')">Osobni podaci</p>
<div id="Osobni">
<table style="width:150%">
<tr><td></br></td></tr>
<tr>
  <td>Ime</td>
  <td>Martina</td>
</tr>
<tr>
  <td>Prezime</td>
  <td>Čulina</td>
</tr>
<tr>
  <td>Adresa</td>
  <td>Gumerec 3d</td>
</tr>
<tr>
  <td>Grad</td>
  <td>Zagreb</td>
</tr>
<tr>
  <td>E-mail</td>
  <td>mculina92@gmail.com</td>
</tr>
<tr>
  <td>Datum rođenja</td>
  <td>14.06.1992.</td>
</tr>
<tr>
  <td>Mjesto rođenja</td>
  <td>Zagreb</td>
</tr>
</table>
</div>
<p onclick="prikazi('Podatci')">Podaci o školovanju</p>
<div id="Podatci">
<table style="width:150%">
<tr>
  <td>Srednja škola:</td>
  <td>Trgovačka škola</td>
</tr>
<tr>
  <td>Adresa škole</td>
  <td>Trg J.F.Kennedyja, Zagreb</td>
</tr>
<tr>
  <td>Fakultet</td>
  <td>Tehničko Veleučilište</td>
</tr>
<tr>
  <td>Adresa fakulteta</td>
  <td>Vrbik 8, Zagreb</td>
</tr>
<tr>
  <td>Smjer</td>
  <td>Računarstvo, programsko inžinjerstvo</td>
</tr>
</table>
</div>
<p onclick="prikazi('Znanja')">Znanja i vještine</p>
<div id="Znanja">
<tr>
  <td>Znanja</td>
  <td>C,C++,C#,Java EE, Java SE, Html, Css, Php, Sql, Mysql</td>
</tr>
<tr>
  <td>Hobi</td>
  <td>Igranje igrica</td>
</tr>
</table>
</div>
</section>

<div class="futer"></br>
<strong>© ZKD, 2014</strong>
</div>

</body>
</html>