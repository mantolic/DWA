<html>
<head>
	<meta charset="UTF8"> 
	
	<title><?php echo $lang['Korisnik']; ?></title>

	<link rel="stylesheet" href="css/normalize.css" />
  	<link rel="stylesheet" href="css/grid.css" />
  	<link rel="stylesheet" href="css/style.css" />
	<link href='http://fonts.googleapis.com/css?family=Allura' rel='stylesheet' type='text/css'>
</head>
<body>

	<?php include 'header.php'; 
		if(!(isset($_SESSION['korIme'])) OR $_SESSION['rola']==1) {
			header("Location: index.php");
		}
	?>	
	
	<div class="wrapper">
	<aside>
  			<ul>
  				<li><a href="selo.php" id="selo"><?php echo $lang['Selo']; ?></a></li>
  				<li><a href="grad.php" id="grad"><?php echo $lang['Grad']; ?></a></li>
  				<li><a href="planine.php" id="planine"><?php echo $lang['Planine']; ?></a></li>
  				<li><a href="more.php" id="more"><?php echo $lang['More']; ?></a></li>
  			</ul>
	</aside>	
	<article class="column column-9">
	<ul class="tabs">
			<li>
				<input type="radio" name="tabs" checked id="tab1">
				<label for="tab1" id="tab-name"><?php echo $lang['Moji_podatci']; ?></label>
				<div id="tab-content1" class="tab-content">

					<p><?php echo $lang['Korisnik']; ?>: <?php echo $_SESSION['korIme'];
					 ?></p>
				
					<?php 
						$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti") or die('Error connecting to database');
						$queryKorisnik="SELECT Korisnik.Username, Korisnik.Ime, Korisnik.Prezime, Korisnik.Adresa, Gradovi.NazivGrada, Korisnik.Email
										FROM Korisnik 
										INNER JOIN Gradovi ON Korisnik.GradoviId=Gradovi.Id
										WHERE Korisnik.Id=?;";
						$stmtKorisnik = mysqli_stmt_init($dbc);

						if(mysqli_stmt_prepare($stmtKorisnik,$queryKorisnik)) {
							mysqli_stmt_bind_param($stmtKorisnik,'i',$_SESSION['korId']);
						}
						
						$izvrsenoKorisnik = mysqli_stmt_execute($stmtKorisnik);
						
						if($izvrsenoKorisnik){
							mysqli_stmt_bind_result($stmtKorisnik, $username,$ime,$prezime,$adresa,$grad,$email);
							mysqli_stmt_fetch($stmtKorisnik);
						}

						mysqli_stmt_close($stmtKorisnik);
						mysqli_close($dbc);

						?>
					<form action="php/updateKorisnika.php" method="POST" class="admin" style="margin-left:15%;">
						<table>
							<tbody>
								<tr>
									<td><label for="name"><?php echo $lang['Korisnicko_ime']; ?>:</label></td>
									<td><input type="text" name="username" id="name" value="<?php echo $username; ?>"></td>
								</tr>
								<tr>
									<td><label for="name"><?php echo $lang['Ime']; ?>:</label></td>
									<td><input type="text" name="ime" id="name" value="<?php echo $ime; ?>"></td>
								</tr>
								<tr>
									<td><label for="surname"><?php echo $lang['Prezime']; ?>:</label></td>
									<td><input type="text" name="prezime" id="surname" value="<?php echo $prezime; ?>"></td>
								</tr>
								<tr>
									<td><label for="adresa"><?php echo $lang['Adresa']; ?>:</label></td>
									<td><input type="text" name="adresa" id"adresa" value="<?php echo $adresa; ?>"></td>
								</tr>
								<tr>
									<td><label for="grad"><?php echo $lang['Grad']; ?>:</label></td>
									<td><select name="gradd">
											<?php
											$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti") or die('Error connecting to database');
											$query = "SELECT * FROM Gradovi";
											$result = mysqli_query($dbc,$query) or die('Error querying database');
												while($m_row = mysqli_fetch_array($result)) {
													if($m_row['NazivGrada']==$grad)
														echo("<option value = '" . $m_row['Id']. "' selected>" . $m_row['NazivGrada'] . "</option>");
													else
														echo("<option value = '" . $m_row['Id']. "'>" . $m_row['NazivGrada'] . "</option>");
												}

											mysqli_close($dbc);
											?>
										</select>  
									</td>
								</tr>
								<tr>
									<td><label for="adresa">Email:</label></td>
									<td><input type="email" name="email" id"email" value="<?php echo $email; ?>"></td>
								</tr>	
								<tr>
									<td><label for="surname"><?php echo $lang['Lozinka']; ?>:</label></td>
									<td><input type="password" name="lozinka" id="lozinka" value="<?php echo "lozinka"; ?>"></td>
								</tr>
								<tr>
									<td><label for="surname"><?php echo $lang['Ponovljena_lozinka']; ?>:</label></td>
									<td><input type="password" name="lozinka" id="lozinka" value="<?php echo "lozinka"; ?>"></td>
								</tr>
								<tr>
									<td><input type="submit" value="<?php echo $lang['Spremi']; ?>" class="bttnSubmit"></td>
									<td><input type="button" value="<?php echo $lang['Odustani']; ?>" class="bttnSubmit"></td>
								</tr>
							</tbody>
						</table>				
					</form>					
				</div>
			</li>
			<li>
				<input type="radio" name="tabs" id="tab2">
				<label for="tab2" id="tab-name"><?php echo $lang['Moje_ponude']; ?></label>
				<div id="tab-content2" class="tab-content">
						<h3 style="float:left;"><?php echo $lang['Aktivne_ponude']; ?></h3>
									<?php  
										$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti");
										
										if (mysqli_connect_errno()) {
										    printf("Error connecting to database: %s\n", mysqli_connect_error());
										    exit();
										}

										
										$queryBudPonude = "SELECT Ponuda.Naziv, Ponuda.DatumPolaska, Kupljenaponuda.Id FROM Ponuda
													INNER JOIN Kupljenaponuda ON Ponuda.Id=Kupljenaponuda.PonudaId
													WHERE Ponuda.DatumPolaska >= CURDATE() AND
													KupljenaPonuda.KorisnikId=?;";
										$stmtBudPonude = mysqli_stmt_init($dbc);

										if(mysqli_stmt_prepare($stmtBudPonude,$queryBudPonude)) {
											mysqli_stmt_bind_param($stmtBudPonude,'i',$_SESSION['korId']);
										}

										$izvrsenoBudPonude = mysqli_stmt_execute($stmtBudPonude);

										if($izvrsenoBudPonude) {
											mysqli_stmt_bind_result($stmtBudPonude,$nazivBudPonude, $datumBudPonude, $idBudPonude);

											echo ('<table class="update-contents">
													<thead>
														<tr>
															<th>'.$lang['Naziv_ponude'].'</th>
															<th>'.$lang['Datum'].'</th>
															<th></th>
													<tbody class="adminButton">');
											while(mysqli_stmt_fetch($stmtBudPonude)) {
												echo ('<tr>');
													echo ('<td>'.$nazivBudPonude.'</td>');	
													echo ('<td>'.$datumBudPonude.'</td>');													
													echo ('<td>
																<form method="POST" action="php/otkazPonude.php">
																	<input type="hidden" name="idKupljenePonude" value="'.$idBudPonude.'">
																	<input type="image" src="img/delete.png" alt="Submit" onclick="alert(\'BRISANJE PONUDE\')">
																</form>
															</td>');
												echo ("</tr>");
											}
											echo ("</tbody></table>");
										}

									 	mysqli_stmt_close($stmtBudPonude);
									/*	mysqli_close($dbc); */
										?>
					<br><br>
					<h3 style="float:left;"><?php echo $lang['Prosle_ponude']; ?></h3>					
							<?php  
								// $dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti");
								
								// if (mysqli_connect_errno()) {
								    // printf("Error connecting to database: %s\n", mysqli_connect_error());
								    // exit();
								// }

								$queryProsPonude = "SELECT Ponuda.Naziv, Ponuda.DatumPolaska, KupljenaPonuda.Id FROM Ponuda
											INNER JOIN KupljenaPonuda ON Ponuda.Id=KupljenaPonuda.PonudaId
											WHERE Ponuda.DatumPolaska<CURDATE() AND
											KupljenaPonuda.KorisnikId=?;";
								$stmtProsPonude = mysqli_stmt_init($dbc);

								if(mysqli_stmt_prepare($stmtProsPonude,$queryProsPonude)) {
									mysqli_stmt_bind_param($stmtProsPonude,'i',$_SESSION['korId']);
								}

								$izvrenoProsPonude = mysqli_stmt_execute($stmtProsPonude);

								if($izvrenoProsPonude) {
									mysqli_stmt_bind_result($stmtProsPonude,$nazivProsPonude, $datumProsPonude, $idProsPonude);

									echo ('<table class="update-contents">
											<thead>
												<tr>
													<th>'.$lang['Naziv_ponude'].'</th>
													<th>'.$lang['Datum'].'</th>
											<tbody>');
									while(mysqli_stmt_fetch($stmtProsPonude)) {
										echo ('<tr>');
											echo ('<td>'.$nazivProsPonude.'</td>');	
											echo ('<td>'.$datumProsPonude.'</td>');													
										echo ("</tr>");
									}
									echo ("</tbody></table>");
								}

								mysqli_stmt_close($stmtProsPonude);
								mysqli_close($dbc);
								?>
					</div>
			</li>
		</ul>
	</article>
	</div>

	<?php include 'footer.php'; ?>
</body>
</html>