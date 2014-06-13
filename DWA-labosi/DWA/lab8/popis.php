<?php include ('sesija.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/grid.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">

	<script type="text/javascript" src="js/search.js"></script>
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
				<li><a href="#">Popis pacijenata</a></li>
				<li><a href="unos.php">Unos pacijenata</a></li>
				<li><a href="filtriranjePodataka.php">Ispis podataka</a></li>
				<li><a href="grafikoni.php">Grafovi</a></li>
				<li><a href="trazi.php">Pretraga doktora</a></li>
				<li><a href="pretragaPacijenataAjax.php">Pretraga pacijenata</a></li>
			</ul>
		</aside>
		<article class="column column-8">
			
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

					$query = "SELECT * FROM pacijenti LIMIT 20;";


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
		</article>
	</div>
	<footer>
		<div class="row">
		<h4>Copyright ZKD, 2014</h4>
		</div>
	</footer>
</body>
</html>