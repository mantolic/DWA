<?php

	session_start();

	if(!isset($_SESSION['korIme'])){
		header("Location: login.html");
	}

	$inactive = 1800;

	if(isset($_SESSION['timeout'])){
		$session_life = time() - $_SESSION['timeout']; 
		
		if($session_life > $inactive) {
		   session_unset();
		   session_destroy();
		   echo ('<script type="text/javascript">alert("Isteklo je vrijeme prijave. Za nastavak prijavite se ponovo");</script>');
		}
	}

	if(empty($_GET["page"]))
		$page = "index";
	else
		$page = $_GET["page"];

	function getUrl($page){
		return "?page=$page";
	}

	if($page=="odjava") {
		session_unset();
		session_destroy();
		header("Location: login.html");
	}

?>
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
					echo $_SESSION['korIme'];
				?>
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
			</ul>
		</aside>
		<article class="column column-8">
			<h2>Formular za upis pacijenata</h2>
			<form action="script-unos.php" method="POST">
				<table class="unos">
					<tr>
						<td><label for="name">Ime:</label></td>
						<td><input type="text" name="firstname" id="name"></td>
					</tr>
					<tr>
						<td><label for="surname">Prezime:</label></td>
						<td><input type="text" name="lastname" id="surname"></td>
					</tr>
					<tr>
						<td><label for="spol">Spol:</label></td>
						<td><input type="radio" name="gender" value="M" id="spol" checked>M<br>
							<input type="radio" name="gender" value="Ž" id="spol">Ž</td>
					<tr>
						<td><label for="date">Datum rođenja:</label></td>
						<td><input type="date" name="birthDate" id="date"></td>
					</tr>
					<tr>
						<td><label for="city">Mjesto rođenja:</label></td>
						<td><input type="text" name="birthPlace" id="city"></td>
					</tr>
					<tr>
						<td><label for="adresa">Adresa i mjesto stanovanja:</label></td>
						<td><input type="text" name="address" id"adresa"></td>
					</tr>
					<tr>
						<td><label for="krvnaGrupa">Krvna grupa:</label></td>
						<td><select name="bloodGroup">
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="AB">AB</option>		
								<option value="0">0</option>			
							</select>
							<select name="bloodType">
								<option value="+">+ (pos)</option>
								<option value="-">- (neg)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="bolesti">Prijašnje medicinske tegobe (srčane tegobe, talk, virusne, bolesti (Hepatitis, HIV)):</label></td>
						<td>
							<input type="radio" name="diseases" value="DA" id="bolesti" checked>Da<br>
							<input type="radio" name="diseases" value="NE" id="bolest">Ne<br>
						</td>
					</tr>	
					<tr>
						<td><label for="tegobe">Koje tegobe osoba ima:</label></td>
						<td><input type="text" name="diseasesDescription" id"tegobe"></td>
					</tr>
					<tr>
						<td><label for="alergija">Jeli osoba alergična na lijekove:</label></td>
						<td><input type="radio" name="allergy" value="DA" id="alergija" checked>Da<br />
						<input type="radio" name="allergy" value="NE" id="alergija">NE<br />
						<input type="radio" name="allergy" value="NEZNA" id="alergija">Ne zna</td>
					</tr>
					<tr>
						<td><label for="lijek">Na koje lijekove je osoba alergična:</label></td>
						<td><input type="text" name="allergyDescription" id="lijek"></td>
					</tr>
						<td></td>
						<td><input type="submit" value="Spremi"></td>
					</tr>
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