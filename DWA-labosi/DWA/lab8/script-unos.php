<?php include ('sesija.php'); ?>

<?php

   // echo $_POST['firstname']."','".$_POST['lastname']."','".$_POST['gender']."','".$_POST['birthDate']."','".$_POST['birthPlace']."','".$_POST['address']."','".$_POST['bloodGroup']."','".$_POST['bloodType']."','".$_POST['diseases']."','".$_POST['diseasesDescription']."','".$_POST['allergy']."','".$_POST['allergyDescription']."')";

	$link = mysqli_connect('localhost','root','123','ljekarna');

	if(mysqli_connect_errno()) {
		printf("Connect faild: %s\n", mysqli_connect_error());
		exit();
	}

	$query="INSERT INTO podaci (ime,prezime,spol,datumRodenja,mjestoRodenja,adresa,krvnaGrupa,tipKrvi,tegobe,opisTegobe,alergije,opisAlergije) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

	$stmt = mysqli_stmt_init($link);

	if(mysqli_stmt_prepare($stmt,$query)) {
		mysqli_stmt_bind_param($stmt,'ssssssssssss',$_POST['firstname'],$_POST['lastname'],$_POST['gender'],$_POST['birthDate'],$_POST['birthPlace'],$_POST['address'],$_POST['bloodGroup'],$_POST['bloodType'],$_POST['diseases'],$_POST['diseasesDescription'],$_POST['allergy'],$_POST['allergyDescription']);
		$test = mysqli_stmt_execute($stmt);
	}
/*
	if($test==true) echo('upisano');
	else echo ('greška!');*/
//	$query="INSERT INTO podaci (ime,prezime,spol,datumRodenja,mjestoRodenja,adresa,krvnaGrupa,tipKrvi,tegobe,opisTegobe,alergije,opisAlergije) VALUES ('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['gender']."','".$_POST['birthDate']."','".$_POST['birthPlace']."','".$_POST['address']."','".$_POST['bloodGroup']."','".$_POST['bloodType']."','".$_POST['diseases']."','".$_POST['diseasesDescription']."','".$_POST['allergy']."','".$_POST['allergyDescription']."')";
//	$result=mysqli_query($link,$query) or die('Error qouering database');

	mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
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
				<li><a href="filtriranjePodataka.php">Ispis podataka</a></li>
				<li><a href="grafikoni.php">Grafovi</a></li>
				<li><a href="trazi.php">Pretraga doktora</a></li>
				<li><a href="pretragaPacijenataAjax.php">Pretraga pacijenata</a></li>
			</ul>
		</aside>
		<article class="column column-8">
			<?php
				if ($test==false) echo('Pogreška kod upisa u bazu. Pokušajte ponovo.');
				echo ('<table class="unos">
					<tr>
						<td>Ime:</td>
						<td>');
							echo $_POST['firstname'];
				echo('</td>
					</tr>
					<tr>
						<td>Prezime:</td>
						<td>');
							echo $_POST['lastname'];
				echo('</td>
					</tr>
					<tr>
						<td>Spol:</td>
						<td>');
							echo $_POST['gender'];
				echo('</td>
					<tr>
						<td>Datum rođenja:</td>
						<td>');
							echo $_POST['birthDate'];
				echo('</td>
					</tr>
					<tr>
						<td>Mjesto rođenja:</td>
						<td>');
							echo $_POST['birthPlace'];
				echo('</td>
					</tr>
					<tr>
						<td>Krvna grupa:</td>
						<td>');
							echo $_POST['address'];
				echo('</td>
					</tr>
					<tr>
						<td>Tip krvi:</td>
						<td>');
							echo $_POST['bloodGroup'];
				echo('</td>
					</tr>
					<tr>
						<td>Bolesti:</td>
						<td>');
							echo $_POST['diseases'];
				echo('</td>
					</tr>	
					<tr>
						<td>Opis bolesti:</td>
						<td>');
							echo $_POST['diseasesDescription'];
				echo('</td>
					</tr>
					<tr>
						<td>Alergije:</td>
						<td>');
							echo $_POST['allergy'];
				echo('</td>
					</tr>
					<tr>
						<td>Opis alergije</td>
						<td>');
							echo $_POST['allergyDescription'];
				echo('</td>
					</tr>
				</table>');
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