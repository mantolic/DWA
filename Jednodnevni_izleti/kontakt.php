<html>
<head>
	<meta charset="UTF8"> 
	<title><?php echo $lang['Kontakt']?></title>

	<link rel="stylesheet" href="css/normalize.css" />
  	<link rel="stylesheet" href="css/grid.css" />
  	<link rel="stylesheet" href="css/style.css" />
	<link href='http://fonts.googleapis.com/css?family=Allura' rel='stylesheet' type='text/css'>
  
</head>
<body>
	
	<?php include('header.php'); ?>
	
	<div class="row">
		<div class="column column-6">
			<h2 style="text-align:left;"><?php echo $lang['ONama'];?></h2>
			<p><?php echo $lang['KontaktText'];?> </p>
			<h2 style="text-align:left;"><?php echo $lang['Kontakt'];?></h2>
			<p> 
			<table style="width:100%;">
				<tr>
					<td><strong><?php echo $lang['Adresa'];?>:</strong></td> 
					<td>Avenija Ulice Asvaltića 55 </td>
				</tr>
				<tr>
					<td> </td>
					<td>34001 Papuk, Hrvatska </td>
				</tr>
				<tr>
					<td><strong><?php echo $lang['Broj_tel'];?>:</strong></td>
					<td>034/1234-567 </td>
				</tr>
				<tr>
					<td><strong>Email:</strong></td> 
					<td>jednodnevni@izleti.hr </td>
				</tr>
			</table>
			</p>
		</div>
	
		<div class="forma column column-6">
			<form action="MAILTO:mantolic@tvz.hr" method="post" enctype="text/plain">
				<table>
				<tr>
					<td><label for="ime"><?php echo $lang['Ime'];?>:</label></td>
					<td><input type="text" id="ime" name="ime"></td>
				</tr>
				<tr>
					<td><label for="naslov"><?php echo $lang['Naslov'];?>:</label></td> 
					<td><input type="text" id="naslov" name="naslov"></td>
				</tr>
				<tr>
					<td><label for="poruka"><?php echo $lang['Poruka'];?>:</label></td>
					<td><textarea rows="5" cols="40" id="poruka" name="poruka"></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="<?php echo $lang['Posalji'];?>" class="bttnCancle bttnBody"></td>
				</tr>
				</table>
			</form>
		</div>
	</div>
	
	<div class="row">
		<div class="karta">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d89468.79546834888!2d17.675517741361958!3d45.512094479953184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1560a7c9e067009!2sPapuk!5e0!3m2!1shr!2shr!4v1398948128911" width="100%" height="400" frameborder="0" style="border:0"></iframe>
		</div>
	</div>

	<!-- footer html -->
	
	<?php include 'footer.php'; ?>

</body>
</html>