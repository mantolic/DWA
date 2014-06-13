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
	<div class="aba column colum-4">
	<table style="width:100%">
		<tr><td>Id:</td></tr><tr><td>Područni ured:</td></tr>
		<tr><td>Šifra ustanove:</td></tr><tr><td>Naziv ustanove:</td></tr>
		<tr><td>Id broj:</td></tr><tr><td>Prezime:</td></tr>
		<tr><td>Ime:</td></tr><tr><td>Broj osiguranika:</td></tr>
		<tr><td>Broj pošte:</td></tr><tr><td>Naziv pošte:</td></tr>
		<tr><td>Ulica:</td></tr><tr><td>Kučni broj:</td></tr>
		<tr><td>Grad:</td></tr>
		</table>
		</div>
		<div class="bab column column-5" style="width=65%!">
	<?php
			// jSON URL which should be requested
			$json_url = 'http://stajp.vtszg.hr/~spredanic/DWA2/lab5/podaci.php';

			//$username = 'your_username';  // authentication
			//$password = 'your_password';  // authentication

			// jSON String for request
			$json_string = '[your json string here]';

			// Initializing curl
			$ch = curl_init( $json_url );

			// Configuring curl options
			$options = array(
			CURLOPT_RETURNTRANSFER => true,
			//CURLOPT_USERPWD	=> $username . “:” . $password,  // authentication
			//CURLOPT_HTTPHEADER => array(‘Content-type: application/json’) ,
			CURLOPT_POSTFIELDS => $json_string
			);

			// Setting curl options
			curl_setopt_array( $ch, $options );

			// Getting results
			$result = curl_exec($ch); // Getting jSON result string

			$obj = (json_decode($result));
		
			foreach ($obj as $key) {
				if  (strtolower($key->{'ime'}) ==strtolower($_GET['ime']) && strtolower($key->{'prezime'}) ==strtolower($_GET['prezime'])){
					for ($i=0; $i <= 12; $i++) { 
						echo ($key->{$i}) ;
						echo ('<br>');
					}
				}
			}


		?>
</div>
</div>
</section>

<div class="futer"></br>
<strong>© ZKD, 2014</strong>
</div>

</body>
</html>