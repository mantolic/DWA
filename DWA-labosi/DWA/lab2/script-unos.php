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
				<button type="button">Odjava</button>
			</div>
		</div>
	</header>
	
	<div class="row wrapper">
		<aside class="column column-4">
			<ul>
				<li><a href="login.php">Osobni podaci</a></li>
				<li><a href="popis.php">Popis pacijenata</a></li>
				<li><a href="unos.html">Unos pacijenata</a></li>		
				<li><a href="#">Izbornik 1</a></li>
				<li><a href="#">Izbornik 2</a></li>
				<li><a href="#">Izbornik 3</a></li>
				<li><a href="#">Izbornik 4</a></li>
			</ul>
		</aside>
		<article class="column column-8">
			<?php
				echo ('<table class="unos">
					<tr>
						<td>');
							echo $_POST['firstname'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['lastname'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['gender'];
				echo('</td>
					<tr>
						<td>');
							echo $_POST['birthDate'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['birthPlace'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['address'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['bloodGroup'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['bloodType'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['diseases'];
				echo('</td>
					</tr>	
					<tr>
						<td>');
							echo $_POST['diseasesDescription'];
				echo('</td>
					</tr>
					<tr>
						<td>');
							echo $_POST['allergy'];
				echo('</td>
					</tr>
					<tr>
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