<?php include ('sesija.php'); ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/grid.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	
	<script>
		function prikazi(_id) {
			var x = document.getElementById(_id);
			/*if(x.style.visibility == 'visible')
				x.style.visibility = 'hidden';
			else x.style.visibility = 'visible';*/
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
	<header>
		<div class="row">
			<div class="logo">
				<img src="img/logo.png" alt="logo"/>
			</div>
			<div class="status">
				<?php
					echo $_SESSION['user'];
				?>
				<button type="button">Odjava</button>
			</div>
		</div>
	</header>
	
	<div class="row wrapper">
		<div id="reklama">
			<h1>!!!!! Reklama !!!!!</h1>
			<form><button type="button" onclick="sakrij('reklama')">Zatvori</button></form>
		</div>
		<aside class="column column-4">
			<ul>
				<li><a href="#">Osobni podaci</a></li>
				<li><a href="popis.php">Popis pacijenata</a></li>
				<li><a href="unos.php">Unos pacijenata</a></li>
				<li><a href="filtriranjePodataka.php">Ispis podataka</a></li>
				<li><a href="grafikoni.php">Grafovi</a></li>
				<li><a href="trazi.php">Pretraga doktora</a></li>
				<li><a href="pretragaPacijenataAjax.php">Pretraga pacijenata</a></li>
			</ul>
		</aside>

		<article class="column column-8">
			<nav>
				<a href="#personal">Osobni podaci</a>
				<a href="#school">Podaci o školovanju</a>
				<a href="#skills">Znanja i vještine</a>
			</nav>
			<div class="cv-text">
				<p onclick="prikazi('personal')">Osobni podaci</p>
				<div id="personal">
					<table class="cv">			
					<tr>
							<td>Ime i prezime:</td>
							<td>Matea Antolić</td>
						</tr>
						<tr>
							<td>Mjesto:</td>
							<td>Bjelovar</td>
						</tr>
						<tr>
							<td>Datum rođenja:</td>
							<td>14.03.1993.</td>
						</tr>
					</table>
				</div>
				
				<p onclick="prikazi('school')">Podaci o školovanju</p>
				<div id="school">
					<table class="cv">
						</tr>
						<tr>
							<td>Osnovna škola:</td>
							<td>Osnovna škola Nova Rača</td>
						</tr>
						<tr>
							<td>Srednja škola:</td>
							<td>Tehnička škola Bjelovar</td>
						</tr>
						<tr>
							<td>Fakultet:</td>
							<td>Tehničko veleučilište u Zagrebu</td>
						</tr>
					</table>
				</div>
				
				<p onclick="prikazi('skills')">Znanja i vještine</p>
				<div id="skills">
					<table class="cv">
						</tr>
						<tr>
							<td>Programiranje:</td>
							<td>C, C#, ASP.NET, Java</td>
						</tr>
						<tr>
							<td>Baze podataka:</td>
							<td>MySQL</td>
						</tr>
						<tr>
							<td>Dizajniranje:</td>
							<td>HTML, CSS</td>
						</tr>
					</table>
				</div>
			</div>
			
			<!-- php ispis podataka -->
<!--			<table class="cv">
				<tr>
					<th id="personal">Osobni podaci</th>
				</tr>
				<tr>
					<td>Ime i prezime:</td>
					<td>Matea Antolić</td>
				</tr>
				<tr>
					<td>Mjesto:</td>
					<td>Bjelovar</td>
				</tr>
				<tr>
					<td>Datum rođenja:</td>
					<td>14.03.1993.</td>
				</tr>

				<tr>
					<th id="school">Podaci o školovanju</th>
				</tr>
				<tr>
					<td>Osnovna škola:</td>
					<td>Osnovna škola Nova Rača</td>
				</tr>
				<tr>
					<td>Srednja škola:</td>
					<td>Tehnička škola Bjelovar</td>
				</tr>
				<tr>
					<td>Fakultet:</td>
					<td>Tehničko veleučilište u Zagrebu</td>
				</tr>
				<tr>
					<th id="skills">Znanja i vještine</th>
				</tr>
				<tr>
					<td>Programiranje:</td>
					<td>C, C#, ASP.NET, Java</td>
				</tr>
				<tr>
					<td>Baze podataka:</td>
					<td>MySQL</td>
				</tr>
				<tr>
					<td>Dizajniranje:</td>
					<td>HTML, CSS</td>
				</tr>
			</table>	-->
		</article>
	</div>
	<footer>
		<div class="row">
		<h4>Copyright ZKD, 2014</h4>
		</div>
	</footer>
</body>
</html>