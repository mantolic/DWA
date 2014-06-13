<?php

	session_start();
	
	$inactive = 1800;
	
	if(isset($_SESSION['timeout'])){
		$session_life = time() - $_SESSION['timeout']; 
		
		if($session_life > $inactive) {
		   session_unset();
		   session_destroy();
		   echo ('<script type="text/javascript">alert("Isteklo je vrijeme prijave. Za nastavak prijavite se ponovo");</script>');
		}
		else
			$_SESSION['timeout']=time();
	}
	//Odjava
	if(empty($_GET["page"]))
		$page = "index";
	else
		$page = $_GET["page"];

	function getUrl($page){
		return "?page=$page";
	}

	if($page=="odjava") {
		session_unset();
		session_destroy();
		header("Location: index.php");
	}
	
	//Odabir jezika 
	function getUrl1($lang){
		return "?lang=$lang";
	}
	if(empty($_SESSION['jezik']))
		$_SESSION['jezik'] = "hr";
		
	else{
		if(empty($_GET["lang"]))
			{}
		else
			$_SESSION['jezik'] = $_GET["lang"];
		}
	
	//Import ključeva za određeni jezik
	switch($_SESSION['jezik']){
		case 'hr':
		include_once 'lang/lang.hr.php';
		//header("refresh:0;");
		break;
		
		case 'en':
		include_once 'lang/lang.en.php';
		//header("refresh:0;");
		break;
		
		case 'de':
		include_once 'lang/lang.de.php';
		//header("refresh:0;");
		break;
		
		
			
	}
	
?>

	<header>
		<div class="navigation">
			<div class="left">
				<?php
					if($_SERVER['SCRIPT_NAME']=="/Jednodnevni_izleti/kontakt.php")
						echo ('<a href="selo.php">'.$lang['Povratak'].'</a>');
					else
						echo ('<a href="kontakt.php">'.$lang['Kontakt'].'</a>');
					
				?>
			</div>
			<div class="centar">
			<?php 
			if(!(isset($_SESSION['korIme']))) {
				echo( '<a href="#" onclick="showForm(\'login\')">'.$lang['Prijava'].'</a>&nbsp;&nbsp;|&nbsp;
						<a href="#" onclick="showForm(\'registration\')">'.$lang['Registracija'].'</a>');
			}
			else {
				if($_SESSION['rola']==1)
					$korStr = "administrator.php";
				else
					$korStr = "korisnik.php";
				echo('<a href="'.$korStr.'" id="korisnik">'.$_SESSION['korIme'].'</a>&nbsp;&nbsp;|&nbsp;');
				echo('<button type="button" onclick="location.href=\''.getUrl("odjava").'\'" class="bttnLogout">'.$lang['Odjava'].'</button>');
			}
			/*
			if ($_SESSION['korIme']=''){
					echo('<a href="korisnik.php">'.$korIme.'</a>&nbsp;&nbsp;|&nbsp;');
					echo('<a href="index.php" onclick="<?php session_destroy();?>">Odjava</a>');
				}
			else{
				echo( '<a href="#" onclick="showForm(\'login\')">Prijava</a>&nbsp;&nbsp;|&nbsp;
						<a href="#" onclick="showForm(\'registration\')">Registracija</a>');
				}
			*/
			?>
			</div>
			<div class="right">
				<?php 
					echo('<button type="button" onclick="location.href=\''.getUrl1("hr").'\'" class="bttnLogout">'.$lang['Hr'].'</button>');
					echo('&nbsp;&nbsp;|&nbsp');
					echo('<button type="button" onclick="location.href=\''.getUrl1("en").'\'" class="bttnLogout">'.$lang['En'].'</button>');
					echo('&nbsp;&nbsp;|&nbsp');
					echo('<button type="button" onclick="location.href=\''.getUrl1("de").'\'" class="bttnLogout">'.$lang['De'].'</button>');
				?>
			</div>	
		</div>
		
		<div class="row">
			<div class="column column-4"><a href="index.php"><img src="img/logo.png"></a></div>
			<div class="column column-8"><h1><?php echo $lang['PAGE_TITLE']; ?></h1></div>

		</div>
	</header>

	<div id="login">
		<h2><?php echo $lang['Prijava'];?></h2>
		<form action="php/prijava.php" method="POST">
			<table>
				<tr>
					<td><label for="user"><?php echo $lang['Korisnicko_ime'];?>:</label></td>
					<td><input type="text" id="korIme" name="korIme"></td>
				</tr>
				<tr>
					<td><label for="pass"><?php echo $lang['Lozinka'];?>:</label></td>
					<td><input type="password" id="lozinka" name="lozinka"></td>
				</tr>
				<tr>
					<td><input type="submit" value="<?php echo $lang['Prijava'];?>" class="bttnSubmit"></td>
					<td><input type="button" value="<?php echo $lang['Odustani'];?>" class="bttnSubmit" onclick="hideForm('login')"></td>
				</tr>
			</table>
		</form>
	</div>

	<div id="registration">
		<h2><?php echo $lang['Registracija'];?></h2>
		<form action="php/registracija.php" method="POST">
			<table>
				<tr>
					<td><label for="name"><?php echo $lang['Ime'];?>:</label></td>
					<td><input type="text" name="ime" id="ime"></td>
				</tr>
				<tr>
					<td><label for="surname"><?php echo $lang['Prezime'];?>:</label></td>
					<td><input type="text" name="prezime" id="prezime"></td>
				</tr>
				<tr>
					<td><label for="adresa"><?php echo $lang['Adresa'];?>:</label></td>
					<td><input type="text" name="adresa" id="adresa"></td>
				</tr>
				<tr>
					<td><label for="gradd"><?php echo $lang['Grad'];?>:</label></td>
					<td><select name="gradd">
						<option value="" name="gradd"><?php echo $lang['Odaberi'];?></option>
							<?php
							
							$dbc = mysqli_connect("localhost","root","root","JednodnevniIzleti") or die('Error connecting to database');
							$query = "SELECT * FROM Gradovi";
							$result = mysqli_query($dbc,$query) or die('Error querying database');
								while($m_row = mysqli_fetch_array($result))        
								echo("<option value = '". $m_row['Id']."'>".$m_row['NazivGrada']."</option>");

							mysqli_close($dbc);
							
							?>
						</select>  
					</td>
				</tr>
				<tr>
					<td><label for="adresa">Email:</label></td>
					<td><input type="email" name="email" id="email"></td>
				</tr>
				<tr>
					<td><label for="name"><?php echo $lang['Korisnicko_ime'];?>:</label></td>
					<td><input type="text" name="korIme" id="korIme"></td>
				</tr>
				<tr>
					<td><label for="surname"><?php echo $lang['Lozinka'];?>:</label></td>
					<td><input type="password" name="lozinka" id="lozinka"></td>
				</tr>
				<tr>
					<td><input type="submit" value="<?php echo $lang['Prijava'];?>" class="bttnSubmit"></td>
					<td><input type="button" value="<?php echo $lang['Odustani'];?>" class="bttnSubmit" onclick="hideForm('registration')"></td>
				</tr>
			</table>				
		</form>
	</div>


