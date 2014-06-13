<html>
<head>
	<meta charset="UTF8"> 
	<title><?php echo $lang['Administrator']; ?></title>

	<link rel="stylesheet" href="css/normalize.css" />
  	<link rel="stylesheet" href="css/grid.css" />
  	<link rel="stylesheet" href="css/style.css" />
	<link href='http://fonts.googleapis.com/css?family=Allura' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="js/visibility.js"></script>

	<script type="text/javascript">
		function edit (_id) {
			showForm("update");

			var naziv = document.getElementById("naziv"+_id).innerHTML;
			var cijena = document.getElementById("cijena"+_id).innerHTML;
			var datum = document.getElementById("datum"+_id).innerHTML;

			document.getElementById("naslov").innerHTML = naziv;
			document.getElementById("priceUpdate").innerHTML = "<input type=\"text\" name=\"priceUpdate\" value=\""+cijena+"\">";
			document.getElementById("dateUpdate").innerHTML = "<input type=\"date\" name=\"dateUpdate\" value=\""+datum+"\">";
			document.getElementById("ponuda").innerHTML = "<input type=\"hidden\" name=\"idPonude\" value=\""+_id+"\">";
		};

	</script>
</head>
<body>

	<?php include('header.php'); 
		if(!(isset($_SESSION['korIme'])) OR $_SESSION['rola']!=1) {
			header("Location: index.php");
		}
	?>
	
	<div class="wrapper">
		<ul class="tabs tabsAdmin">
			<li>
				<input type="radio" name="tabs" checked id="tab1">
				<label for="tab1" id="tab-name"><?php echo $lang['Nova_ponuda']; ?></label>
				<div id="tab-content1" class="tab-content">
					<form method="POST" action="php/unosPonude.php" class="admin">
					<table>
						<tr>
							<td><label for="title"><?php echo $lang['Naslov']; ?>:</label></td>
							<td><input type="text" id="title" name="title"></td>
						</tr>
						<tr>
							<td><label for="type"><?php echo $lang['Vrsta']; ?>:</label></td>
							<td>
								<select id="type" name="type">
									<option value="2"><?php echo $lang['Selo']; ?></option>
									<option value="3"><?php echo $lang['More']; ?></option>
									<option value="4"><?php echo $lang['Planine']; ?></option>
									<option value="1"><?php echo $lang['Grad']; ?></option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="descriptionHr"><?php echo $lang['Opis']; ?> (Hrvatski):</label></td>
							<td><textarea id="descriptionHr" name="descriptionHr" rows="7" cols="60"><?php echo $lang['Opis_ponude']; ?>....</textarea></td>
						</tr>
						<tr>
							<td><label for="descriptionEn"><?php echo $lang['Opis']; ?> (Engleski):</label></td>
							<td><textarea id="descriptionEn" name="descriptionEn" rows="7" cols="60"><?php echo $lang['Opis_ponude']; ?>....</textarea></td>
						</tr>
						<tr>
							<td><label for="descriptionDe"><?php echo $lang['Opis']; ?> (Njemački):</label></td>
							<td><textarea id="descriptionDe" name="descriptionDe" rows="7" cols="60"><?php echo $lang['Opis_ponude']; ?>....</textarea></td>
						</tr>
						<tr>
							<td><label for="date"><?php echo $lang['Datum']; ?>:</label></td>
							<td><input type="date" id="date" name="date"></td>
						</tr>
						<tr>
							<td><label for="price"><?php echo $lang['Cijena']; ?>:</label></td>
							<td><input type="text" id="price" name="price">&nbsp;&nbsp;kn</td>
						</tr>
						<tr>
							<td><label for="image"><?php echo $lang['Slika']; ?>:</label></td>
							<td><input type="file" id="image" name="image" accept="image/*"></td>
						</tr>
						<tr>
							<td></td>
							<td><form method="POST" action="php/unosPonude"><input type="submit" value="<?php echo $lang['Spremi']; ?>" class="bttnSubmit">&nbsp;
								<input type="reset" value="<?php echo $lang['Odustani']; ?>" class="bttnSubmit"></form></td>
						</tr>
					</table>
					</form>
				</div>
			</li>
			<li>
				<input type="radio" name="tabs" id="tab2">
				<label for="tab2" id="tab-name"><?php echo $lang['Pregled_ponuda']; ?></label>
				<div id="tab-content2" class="tab-content">
					<table class="update-contents">
						<thead>
							<tr>
								<th><?php echo $lang['Naslov']; ?></th>
								<th><?php echo $lang['Vrsta']; ?></th>
								<!--<th><?php echo $lang['Opis']; ?></th>-->
								<th style="width:100px"><?php echo $lang['Datum']; ?></th>
								<th><?php echo $lang['Cijena']; ?></th>
								<th><?php echo $lang['Slika']; ?></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody class="adminButton">
							<?php
								$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti") or die('Error connecting to database');
								$queryPonuda = "SELECT Ponuda.Id, Ponuda.Naziv, Ponuda.Opis_hr, Ponuda.DatumPolaska, Ponudavrsta.Naziv AS Vrsta, Ponuda.Cijena, Ponuda.Slika FROM Ponuda INNER JOIN Ponudavrsta ON Ponuda.VrstaId=Ponudavrsta.Id";
								
								$resultPonuda = mysqli_query($dbc,$queryPonuda) or die('Error querying database');
								
								while($rowPonuda = mysqli_fetch_array($resultPonuda)){        
									echo ('<tr>');
											echo ('<td id="naziv'.$rowPonuda['Id'].'">').$rowPonuda['Naziv'].('</td>');
											echo ('<td>').$rowPonuda['Vrsta'].('</td>');
											/*echo ('<td>').$rowPonuda['Opis_hr'].('</td>');*/
											echo ('<td id="datum'.$rowPonuda['Id'].'">').$rowPonuda['DatumPolaska'].('</td>');
											echo ('<td><span id="cijena'.$rowPonuda['Id'].'">').$rowPonuda['Cijena'].('</span>kn</td>');
											echo ('<td><img src="').$rowPonuda['Slika'].('" alt="slika" /></td>');
									echo ('<!--<td>
												<form method="POST" action="php/updatePonude.php">
													<input type="hidden" name="idPonude" value="'.$rowPonuda['Id'].'">
													<input type="image" src="img/update.png" alt="Submit" onclick="alert(\'UPDATE PONUDE\')">
												</form>
											</td>-->
											<td> 
												<span><input type="button" value="edit" onclick="edit('.$rowPonuda['Id'].')"></span>
											</td>
											<td><span>
												<form method="POST" action="php/brisanjePonude.php">
													<input type="hidden" name="idPonude" value="'.$rowPonuda['Id'].'">
													<input type="image" src="img/delete.png" alt="Submit" onclick="alert(\'BRISANJE PONUDE\')">
												</form>
											</span></td>');
									echo ('</tr>');
								}
							?>
						</tbody>
					</table>
				</div>
			</li>
			<li>
				<input type="radio" name="tabs" id="tab3">
				<label for="tab3" id="tab-name"><?php echo $lang['Korisnici']; ?></label>
				<div id="tab-content3" class="tab-content">
					<table class="update-contents">
						<thead>
							<tr>
								<th><?php echo $lang['Korisnicko_ime']; ?></th>
								<th><?php echo $lang['Ime']; ?></th>
								<th><?php echo $lang['Prezime']; ?></th>
								<th>E-mail</th>
								<th><?php echo $lang['Adresa']; ?></th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti");
								if(mysqli_connect_errno()) {
									printf("Connect faild: %s\n", mysqli_connect_error());
									exit();
								}

								$queryKorisnici="SELECT Korisnik.Username, Korisnik.Ime, Korisnik.Prezime, Korisnik.Adresa, Gradovi.NazivGrada, Korisnik.Email
												FROM Korisnik 
												INNER JOIN Gradovi ON Korisnik.GradoviId=Gradovi.Id";
								
								if($resultKorisnici = mysqli_query($dbc,$queryKorisnici)) {
									while ($row = mysqli_fetch_array($resultKorisnici)) {
										echo ('<tr>');
											echo ('<td>').$row['Username'].('</td>');
											echo ('<td>').$row['Ime'].('</td>');
											echo ('<td>').$row['Prezime'].('</td>');
											echo ('<td>').$row['Email'].('</td>');
											echo ('<td>').$row['Adresa'].', '.$row['NazivGrada'].('</td>');
											echo ('<td>
														<form method="POST" action="php/brisanjeKorisnika.php">
															<input type="hidden" name="korisnickoIme" value="'.$row['Username'].'">
															<input type="image" src="img/delete.png" alt="Submit" onclick="alert(\'BRISANJE Korisnika\')">
														</form>
													</td>');
										echo ('</tr>');
									}
									mysqli_free_result($result);
								}
					
							mysqli_close($dbc);
							?>
						</tbody>
					</table>
				</div>
			</li>
		</ul>


					<div id="update">
						<form method="POST" action="php/updatePonude.php" class="admin">
							<span id="ponuda"></span>
							<table>
								<tr>
									<td><label for="title"><?php echo $lang['Naslov']; ?>:</label></td>
									<td><span id="naslov"></span></td>
								</tr>
								<tr>
									<td><label for="dateUpdate"><?php echo $lang['Datum']; ?>:</label></td>
									<td><span id="dateUpdate"></span></td>
								</tr>
								<tr>
									<td><label for="priceUpdate"><?php echo $lang['Cijena']; ?>:</label></td>
									<td><span id="priceUpdate"></span>&nbsp;&nbsp;kn</td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" value="<?php echo $lang['Spremi']; ?>" class="bttnSubmit">&nbsp;
										<input type="button" value="<?php echo $lang['Odustani']; ?>" onclick="hideForm('update')" class="bttnSubmit"></form></td>
								</tr>
							</table>
						</form>
					</div>
	</div>

	<!-- footer html -->
	<!--<?php include 'footer.php'; ?>-->

</body>
</html>