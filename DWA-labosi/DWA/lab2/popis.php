<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/grid.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">

	<script type="text/javascript" src="js/search.js"></script>
</script>

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
				<li><a href="zivotopis.php">Zivotopis</a></li>
				<li><a href="popis.php">Popis pacijenata</a></li>
				<li><a href="unos.html">Unos pacijenata</a></li>		
			</ul>
		</aside>
		<article class="column column-8">
			
			<input type="text" id="searchTerm" name="filter" onkeyup="doSearch()" style="float:right; margin:10px;">

			<table class="popis" id="dataTable">
				<thead>
					<tr>
						<th>Ime</th>
						<th>Prezime</th>
						<th>Spol</th>
						<th>Datum rodenja</th>
						<th>Mobitel</th>
						<th>Adresa</th>
						<th>Mjesto</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$row = 1;
					$file = fopen("podaci.csv", "r");
					while ($row<=21) {
						$data = fgetcsv($file, 8000);
					    $splitdata=explode(';', $data[0]);
					    if($row!=1){
					    echo '<tr>';
					    for ($i=0; $i <= 6; $i++) {
							echo '<td>';
					        echo $splitdata[$i];
					        echo '</td>';
					    }
						echo '</tr>';
					}
						$row++;
					}
					fclose($file);
				?>
				</tbody>
			</table>
		</article>
	</div>
	<footer>
		<div class="row">
		<h4>Copyright ZKD, 2014</h4>
		</div>
	</footer>
</body>
</html>