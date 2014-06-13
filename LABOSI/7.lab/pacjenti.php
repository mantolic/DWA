<?php include ('sesija.php'); ?>
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
</ul>
</div>
		<div class="ime column colum-9">
			
			<input type="text" id="searchTerm" name="filter" onkeyup="doSearch()" style="float:right; margin:10px;">
			
				<table class="popis" id="dataTable">
				<thead>
					<tr>
						<th>Ime</th>
						<th>Prezime</th>
						<th>Spol</th>
						<th>Datum rođenja</th>
						<th>Mobitel</th>
						<th>Adresa</th>
						<th>Mjesto</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$link = mysqli_connect("localhost","root","root","ljekarna");
					if(mysqli_connect_errno()) {
						printf("Connect faild: %s\n", mysqli_connect_error());
						exit();
					}
					
					$query = "SELECT * FROM pacijenti LIMIT 700;";
					

					if($result = mysqli_query($link,$query)) {
						while ($row = mysqli_fetch_array($result)) {
							echo ('<tr>');
								echo '<td>'.$row['ime'].'</td>';
								echo '<td>'.$row['prezime'].'</td>';
								echo '<td>'.$row['spol'].'</td>';
								echo '<td>'.$row['datumRodenja'].'</td>';
								echo '<td>'.$row['mobitel'].'</td>';
								echo '<td>'.$row['adresa'].'</td>';
								echo '<td>'.$row['mjesto'].'</td>';
							echo ('</tr>');
						}
						mysqli_free_result($result);
					}
					
					mysqli_close($link);
				?>
				</tbody>
			</table>
		</div>
</section>
<div class="futer"></br>
<strong>© ZKD, 2014</strong>
</div>

</body>
</html>