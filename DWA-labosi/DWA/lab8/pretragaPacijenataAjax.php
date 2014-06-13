<?php include ('sesija.php'); ?>	

<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
header("Location: pretragaPacijenata_mobile.php");
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/grid.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<meta charset="UTF-8">
	
	<script>
	var current = 0;
	function showText() {
		current = 0;
		var xmlhttp;
		xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
				//document.getElementById("description").innerHTML = xmlhttp.responseText;
				podaci=JSON.parse(xmlhttp.responseText);		
				
				document.getElementById("rb").innerHTML = 1;
				document.getElementById("ime").innerHTML = podaci[0].ime;
				document.getElementById("prezime").innerHTML = podaci[0].prezime;
				document.getElementById("spol").innerHTML = podaci[0].spol;
				document.getElementById("datum").innerHTML = podaci[0].datumRodenja;
				document.getElementById("mjesto").innerHTML = podaci[0].mjestoRodenja;
				document.getElementById("adresa").innerHTML = podaci[0].adresa;
				document.getElementById("grupa").innerHTML = podaci[0].krvnaGrupa;
				document.getElementById("tip").innerHTML = podaci[0].tipKrvi;
				document.getElementById("tegoba").innerHTML = podaci[0].opisTegobe;
				document.getElementById("alergija").innerHTML = podaci[0].opisAlergije;
			}
		}
		
		var name = document.getElementById("name").value;
		var surname = document.getElementById("surname").value;
		var bloodGroup = document.getElementById("bloodGroup").value;
		var bloodType = document.getElementById("bloodType").value;
		
		//xmlhttp.open("GET","script-trazi.php?firstname="+name+"&lastname="+surname+"&bloodGroup="+bloodGroup+"&bloodType="+bloodType,true);
		xmlhttp.open("GET","script-trazi.php?firstname="+name+"&lastname="+surname+"&bloodGroup="+bloodGroup+"&bloodType="+bloodType,true);
		xmlhttp.send();
		};
	
		function sljedeci() {
			if (current<podaci.length-1){
			current++;
				document.getElementById("rb").innerHTML = current+1;
				document.getElementById("ime").innerHTML = podaci[current].ime;
				document.getElementById("prezime").innerHTML = podaci[current].prezime;
				document.getElementById("spol").innerHTML = podaci[current].spol;
				document.getElementById("datum").innerHTML = podaci[current].datumRodenja;
				document.getElementById("mjesto").innerHTML = podaci[current].mjestoRodenja;
				document.getElementById("adresa").innerHTML = podaci[current].adresa;
				document.getElementById("grupa").innerHTML = podaci[current].krvnaGrupa;
				document.getElementById("tip").innerHTML = podaci[current].tipKrvi;
				document.getElementById("tegoba").innerHTML = podaci[current].opisTegobe;
				document.getElementById("alergija").innerHTML = podaci[current].opisAlergije;				
			}
		}
		
		function prethodni() {
			if (current>0){
			current--;
				document.getElementById("rb").innerHTML = current+1;
				document.getElementById("ime").innerHTML = podaci[current].ime;
				document.getElementById("prezime").innerHTML = podaci[current].prezime;
				document.getElementById("spol").innerHTML = podaci[current].spol;
				document.getElementById("datum").innerHTML = podaci[current].datumRodenja;
				document.getElementById("mjesto").innerHTML = podaci[current].mjestoRodenja;
				document.getElementById("adresa").innerHTML = podaci[current].adresa;
				document.getElementById("grupa").innerHTML = podaci[current].krvnaGrupa;
				document.getElementById("tip").innerHTML = podaci[current].tipKrvi;
				document.getElementById("tegoba").innerHTML = podaci[current].opisTegobe;
				document.getElementById("alergija").innerHTML = podaci[current].opisAlergije;
			}
		}
	</script>
	
</head>

<body>
	<header>
		<div class="row">
			<div class="logo">
				<img src="img/logo.png" alt="logo"/>
			</div>
			<div class="status">
				<?php echo $_SESSION['user']; ?>
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
				<li><a href="#">Pretraga pacijenata</a></li>				
			</ul>
		</aside>
		<article class="column column-8">
			<h2>Pretraga pacijenata</h2>
			
				<table class="unos">
					<tr>
						<td><label for="name">Ime</label></td>
						<td><input type="text" name="firstname" id="name"></td>
					</tr>
					<tr>
						<td><label for="surname">Prezime</label></td>
						<td><input type="text" name="lastname" id="surname"></td>
					</tr>
					<tr>
						<td><label for="bloodGroup">Krvna grupa</label></td>
						<td><select name="bloodGroup" id="bloodGroup">
								<option value=""></option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="AB">AB</option>		
								<option value="O">0</option>			
							</select>
							<select name="bloodType" id="bloodType">
								<option value=""></option>
								<option value="+">+ (pos)</option>
								<option value="-">- (neg)</option>
							</select></td>
					<tr>
						<td></td>
						<td><button onClick="showText()" style="width:90px;">Učitaj</button></td>						
				</table>
			
			
			<div class="ispis">
			<!-- <div id="description">**Opis**</div> -->
				<table>
					<tr>
						<td>Rd.broj:</td>
						<td>#<label id="rb"></label></td>
					</tr>
					<tr>
						<td>Ime:</td>
						<td><label id="ime"></label></td>
					</tr>
					<tr>
						<td>Prezime:</td>
						<td><label id="prezime"></label></td>
					</tr>
					<tr>
						<td>Spol:</td>
						<td><label id="spol"></label></td>
					</tr>
					<tr>
						<td>Datum rođenja:</td>
						<td><label id="datum"></label></td>
					</tr>
					<tr>
						<td>Mjesto rođenja:</td>
						<td><label id="mjesto"></label></td>
					</tr>
					<tr>
						<td>Adresa:</td>
						<td><label id="adresa"></label></td>
					</tr>
					<tr>
						<td>Krvna grupa:</td>
						<td><label id="grupa"></label></td>
					</tr>
					<tr>
						<td>Tip krvi:</td>
						<td><label id="tip"></label></td>
					</tr>
					<tr>
						<td>Tegobe:</td>
						<td><label id="tegoba"></label></td>
					</tr>
					<tr>
						<td>Alergije</td>
						<td><label id="alergija"></label></td>
					</tr>
					<tr>
						<td><input type="button" value="Prethodni" onClick="prethodni()" /></td>
						<td><input type="button" value="Sljedeći" onClick="sljedeci()" /></td>
					</tr>
				</table>
			</div>
		</article>
	</div>
	<footer>
		<div class="row">
		<h4>Copyright ZKD, 2014</h4>
		</div>
	</footer>
</body>
</html>