<?php include ('sesija.php'); ?>	

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/grid.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<meta charset="UTF-8">
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
				<li><a href="#">Pretraga pacijenata</a></li>				
			</ul>
		</aside>
		<article class="column column-8">
			<h2>Pretraga pacijenata</h2>
			<form method="POST" action="prikazPretrage.php">
				<table class="unos">
					<tr>
						<td><label for="name">Ime</label></td>
						<td><input type="text" name="firstname" id="name"></td>
					</tr>
					<tr>
						<td><label for="surname">Prezime</label></td>
						<td><input type="text" name="lastname" id="surname"></td>
					</tr>
					<tr>
						<td><label for="bloodGroup">Krvna grupa</label></td>
						<td><select name="bloodGroup">
								<option value=""></option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="AB">AB</option>		
								<option value="0">0</option>			
							</select>
							<select name="bloodType">
								<option value=""></option>
								<option value="+">+ (pos)</option>
								<option value="-">- (neg)</option>
							</select></td>
					<tr>
						<td></td>
						<td><input type="submit" value="Spremi"></td>
				</table>
			</form>
		</article>
	</div>
	<footer>
		<div class="row">
		<h4>Copyright ZKD, 2014</h4>
		</div>
	</footer>
</body>
</html>