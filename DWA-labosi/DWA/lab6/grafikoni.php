<?php

	include 'sesija.php';

	include 'graf2.php';
	include 'graf1.php'
?>

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
				<li><a href="#">Grafovi</a></li>
				<li><a href="trazi.php">Pretraga doktora</a></li>
				<li><a href="pretragaPacijenata.php">Pretraga pacijenata</a></li>				
			</ul>
		</aside>
		<article class="column column-8">
			<?php			
			echo "<h3>Postotak muškaraca i žena</h3><img src='pie_chart.png'><p>";
			echo "<font color=0000FF>Muškaraca</font> = ".$muskarci." %<br>";
			echo "<font color=ff0000>Žena</font> = ".$zene." %</p>";

			echo "<br><br><br><h3>Omjer krvnih grupa pacijenata</h3><img src='bar_chart.png'>";
			?>
				
		</article>
	</div>
	<footer>
		<div class="row">
		<h4>Copyright ZKD, 2014</h4>
		</div>
	</footer>
</body>
</html>