<?php include ('sesija.php'); ?>
<?php

	$link = mysqli_connect('localhost','root','root','ljekarna');

	if(mysqli_connect_errno()) {
		printf("Connect faild: %s\n", mysqli_connect_error());
		exit();
	}

	$query="INSERT INTO podaci (ime,prezime,spol,datumRodenja,mjestoRodenja,adresa,krvnaGrupa,tipKrvi,tegobe,opisTegobe,alergije,opisAlergije) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

	$stmt = mysqli_stmt_init($link);

	if(mysqli_stmt_prepare($stmt,$query)) {
		mysqli_stmt_bind_param($stmt,'ssssssssssss',$_POST['ime'],$_POST['prezime'],$_POST['spol'],$_POST['datumRod'],$_POST['mjestoRod'],$_POST['adresa'],$_POST['krvnaGr'],$_POST['tipKrvi'],$_POST['tegobe'],$_POST['tegobeOpis'],$_POST['alergija'],$_POST['alergijaOpis']);
		$test = mysqli_stmt_execute($stmt);
	}

	mysqli_close($link);
?>
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
			
			<?php
				if ($test==false) echo('Pogreška kod upisa u bazu. Pokušajte ponovo.');
				echo ('<table class="unos">
					<tr>
						<td>Ime:</td>
						<td>');
							echo $_POST['ime'];
				echo('</td>
					</tr>
					<tr>
						<td>Prezime:</td>
						<td>');
							echo $_POST['prezime'];
				echo('</td>
					</tr>
					<tr>
						<td>Spol:</td>
						<td>');
							echo $_POST['spol'];
				echo('</td>
					<tr>
						<td>Datum rođenja:</td>
						<td>');
							echo $_POST['datumRod'];
				echo('</td>
					</tr>
					<tr>
						<td>Mjesto rođenja:</td>
						<td>');
							echo $_POST['mjestoRod'];
				echo('</td>
					</tr>
					<tr>
						<td>Adresa:</td>
						<td>');
							echo $_POST['adresa'];
				echo('</td>
					</tr>
					<tr>
						<td>Krv:</td>
						<td>');
							echo $_POST['krvnaGr'].' '. $_POST['tipKrvi'];
				echo('</td>
					</tr>
					<tr>
						<td>Tegobe:</td>
						<td>');
							echo $_POST['tegobe'];
				echo('</td>
					</tr>	
					<tr>
						<td>Opis tegoba:</td>
						<td>');
							echo $_POST['tegobeOpis'];
				echo('</td>
					</tr>
					<tr>
						<td>Alergije:</td>
						<td>');
							echo $_POST['alergija'];
				echo('</td>
					</tr>
					<tr>
						<td>Opis alergije</td>
						<td>');
							echo $_POST['alergijaOpis'];
				echo('</td>
					</tr>
				</table>');
			?>
				
		</div>
</section>
<div class="futer"></br>
<strong>© ZKD, 2014</strong>
</div>

</body>
</html>