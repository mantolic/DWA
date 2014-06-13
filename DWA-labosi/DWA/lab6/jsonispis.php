<?php include ('sesija.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/grid.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
			<br>

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
</td>
</table>


		</article>
	</div>
	<footer>
		<div class="row">
		<h4>Copyright ZKD, 2014</h4>
		</div>
	</footer>
</body>
</html>