<html>
<head>
	<meta charset="UTF8"> 
	<title><?php echo $lang['PAGE_TITLE']; ?></title>

	<link rel="stylesheet" href="css/normalize.css" />
  	<link rel="stylesheet" href="css/grid.css" />
  	<link rel="stylesheet" href="css/style.css" />
	<link href='http://fonts.googleapis.com/css?family=Allura' rel='stylesheet' type='text/css'>
	<?php /*if(session_id() != '') {
		session_start();}*/
		 ?>
		 
  	<script type="text/javascript" src="js/visibility.js"></script>
  	<script type="text/javascript" src="js/ajax.js"></script>
  
</head>
<body>

	<!-- prijava i registracija html -->
	<?php include 'header.php'; ?>
	
	<section class="row primary">
		<div class="column column-6"><p><?php echo $lang['Naslovna_opis'];?></p></div>
		<div class="column column-6"><p><?php echo $lang['Naslovna_opis1'];?></p></div>
	</section>
	
	<a href = "selo.php">
		<section class="village">
			<div class="description">
				<h2><?php echo $lang['Seoski_turizam'];?></h2>
				<p><?php echo $lang['Selo_mali'];?></p>
			</div>
		</section>
	</a>
	
	<a href = "more.php">
		<section class="sea">
			<div class="description">
				<h2><?php echo $lang['Morski_turizam'];?></h2>
				<p><?php echo $lang['More_mali'];?></p>
			</div>
		</section>
	</a>

	<a href = "planine.php">
		<section class="mountain">
			<div class="description">
				<h2><?php echo $lang['Planinski_turizam'];?></h2>
				<p><?php echo $lang['Planine_mali'];?></p>
			</div>
		</section>
	</a>
	
	<a href = "grad.php">
		<section class="city">
			<div class="description">
				<h2><?php echo $lang['Urbani_turizam'];?></h2>
				<p><?php echo $lang['Grad_mali'];?></p>
				</div>
		</section>
	</a>
	
		<?php include 'footer.php'; ?>

</body>
</html>