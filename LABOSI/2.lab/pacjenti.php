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
</ul>
</div>
		<div class="ime column colum-9">
			
			<input type="text" id="searchTerm" name="filter" onkeyup="doSearch()" style="float:right; margin:10px;">
			
			<table class="popis" id="dataTable">
				<?php
					$row = 1;
					$file = fopen("podaci.csv", "r");
					while ($row<=20) {
						$data = fgetcsv($file, 8000);
					    $splitdata=explode(';', $data[0]);
					    echo '<tr>';
					    for ($i=0; $i <= 6; $i++) {
							echo '<td>';
					        echo $splitdata[$i];
					        echo '</td>';
					    }
						echo '</tr>';
						$row++;
					}
					fclose($file);
				?>
			</table>
		</div>
</section>
<div class="futer"></br>
<strong>© ZKD, 2014</strong>
</div>

</body>
</html>