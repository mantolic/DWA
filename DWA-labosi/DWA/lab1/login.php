<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/grid.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
</head>
<body>
	<header>
		<div class="row">
			<div class="logo">
				<img src="img/logo.png" alt="logo"/>
			</div>
			<div class="status">
				<?php
					echo ($_POST['username'].' ');
					echo $_POST['password'];
				?>
				<button type="button">Odjava</button>
			</div>
		</div>
	</header>
	
	<div class="row wrapper">
		<aside class="column column-4">
			<ul>
				<li><a href="#">Životopis</a></li>
				<li><a href="popis.html">Popis pacijenata</a></li>
			</ul>
		</aside>
		<article class="column column-8">
			<nav>
				<a href="#personal">Osobni podaci</a>
				<a href="#school">Podaci o školovanju</a>
				<a href="#skills">Znanja i vještine</a>
			</nav>
			<!-- php ispis podataka -->
			<table>
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