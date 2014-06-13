<?php
	include 'sesija.php';
	include 'graf2.php';
	include 'graf1.php'
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
    <title>Dinamičke web aplikacije</title>
	
	<link rel="stylesheet" href="css/grid.css" />
	<link rel="stylesheet" href="css/stil.css" />
	  <link rel="stylesheet" href="css/normalize.css" />
		<script type="text/javascript" src="js/search.js"></script>
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
</ul>
</div>
		<div class="ime column colum-9">
				<?php			
			echo "<h3>Postotak muškaraca i žena</h3><img src='pie_chart.png'><p>";
			echo "<font color=0000FF>Muškaraca</font> = ".$muskarci." %<br>";
			echo "<font color=ff0000>Žena</font> = ".$zene." %</p>";
			echo "<br><br><br><h3>Omjer krvnih grupa pacijenata</h3><img src='bar_chart.png'>";
			?>
			
		</div>
</section>
<div class="futer"></br>
<strong>© ZKD, 2014</strong>
</div>

</body>
</html>