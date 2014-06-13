<html>
	<head>
	<meta charset="UTF8"> 
	<title><?php echo $lang['Grad']; ?></title>

	<link rel="stylesheet" href="css/normalize.css" />
  	<link rel="stylesheet" href="css/grid.css" />
  	<link rel="stylesheet" href="css/style.css" />
	<link href='http://fonts.googleapis.com/css?family=Allura' rel='stylesheet' type='text/css'>

  	<script type="text/javascript" src="js/visibility.js"></script>
  	<script type="text/javascript" src="js/ajax.js"></script>
  
</head>
<body>
	
	<?php include('header.php'); ?>

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
			<div class="column column-12">
				<div class="tekst column column-8">
					<h2><?php echo $lang['Grad']; ?></h2>
					<p><?php echo $lang['Grad_opis']; ?></p>
				</div>
				<div class="slika column column-4">
					<img src="img/grad1.jpg" width="100%" height="25%">
					<img src="img/grad2.jpg" width="100%" height="25%">
				</div>
			</div>

			<div class="column column-12">
				<h2 style="text-align:left;"><?php echo $lang['Ponuda']; ?>:</h2>
				<?php
					$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti") or die('Error connecting to database');
					$queryPonuda = "SELECT Ponuda.Id, Ponuda.Naziv, Ponuda.Slika FROM Ponuda WHERE VrstaId=1";
					
					$resultPonuda = mysqli_query($dbc,$queryPonuda) or die('Error querying database');
					
					while($rowPonuda = mysqli_fetch_array($resultPonuda)){        
						echo ('<div class="container" onclick="showOffer('.$rowPonuda['Id'].')">');
						echo ('<img src="'.$rowPonuda['Slika'].'" />');
						echo ('<div class="text"><p>').$rowPonuda['Naziv'].('</p></div>');
						echo ('</div>');
					}
				?>
			</div>
			
			<!-- ponuda za odbrano mjesto -->
			<div class="column column-12">
				<div id="ispis"></div>
			</div>
			</div>
		</article>
	</div>

	<div class="row"></div>

	<!-- footer html -->
	<?php include 'footer.php'; ?>

</body>
</html>