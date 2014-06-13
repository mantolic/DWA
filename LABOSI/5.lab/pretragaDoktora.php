<?php include ('sesija.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
    <title>Dinamičke web aplikacije</title>
	
	<link rel="stylesheet" href="css/grid.css" />
	<link rel="stylesheet" href="css/stil.css" />
	  <link rel="stylesheet" href="css/normalize.css" />
	
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
</ul>
</div>

<div class="ime column colum-9">
<h3 style="text-align:left;">Pronađi doktora</h3>
			<form action="ispisDoktora.php" method="GET" >
				<input type="text" name="ime" placeholder="Ime" >
				<input type="text" name="prezime" placeholder="Prezime" >
				<input type="submit" value="Pošalji" >
			</form>

</div>
</section>

<div class="futer"></br>
<strong>© ZKD, 2014</strong>
</div>

</body>
</html>