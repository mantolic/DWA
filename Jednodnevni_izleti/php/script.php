<?php

	session_start();

	$lang = $_SESSION['jezik'];
	$idPonude = null;
	$idPonude = $_GET['id'];
	$opisJezik = null;

	switch ($lang) {
		case 'hr':
			$opisJezik = "Opis_hr";
			break;
		case 'en':
			$opisJezik = "Opis_en";
			break;
		case 'de':
			$opisJezik = "Opis_de";
			break;
		default:
			$opisJezik = "Opis_hr";
			break;
	}

	$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti") or die('Error connecting to database');
	
	$query = "SELECT Naziv, ".$opisJezik.", Slika, Cijena, DatumPolaska FROM Ponuda WHERE id=".$idPonude.";";
	
	$result = mysqli_query($dbc,$query) or die('Error querying database');

	while ($row=mysqli_fetch_array($result)) {
		echo ('<div class="tekst column column-6">');
			echo "<h3>".$row['Naziv']."</h3><p>";
			echo $row[$opisJezik];			
			echo ('</p>');

			echo ('<p>Cijena: ').$row['Cijena'].(',00 kn</p>');
			echo ('<p>Datum polaska: ').$row['DatumPolaska'].('</p>');

			echo (' <form method="POST" action="php/upis.php">
						<input type="hidden" name="idPonude" value="'.$idPonude.'">
						<input type="submit" value="Upis" onclick="alert(\'ooioioi\')" class="bttnSubmit bttnBody" style="float:right">						
					</form> ');
		echo ('</div>');
		
		echo ('<div class="slika column column-6">
						<img src="./');
		echo $row['Slika'];
		echo ('" alt="slika1" width="100%">
				</div>');
	}

	mysqli_close($dbc);

?>