<?php 

$userName=$_GET['userName'];
$password=$_GET['password'];
$kripLozinka = md5($password);

$dbc = mysqli_connect("localhost","root","root","ljekarna") or die('Error connecting to database');

	$query = "SELECT id FROM korisnici WHERE username= ? AND password = ?;";

	$stmt = mysqli_stmt_init($dbc);

	if(mysqli_stmt_prepare($stmt,$query)) {
		mysqli_stmt_bind_param($stmt,'ss',$userName,$kripLozinka);
	}
	$izvrseno = mysqli_stmt_execute($stmt);

	if($izvrseno){
		mysqli_stmt_bind_result($stmt, $idKor);
		mysqli_stmt_fetch($stmt);
		if($idKor>0){
			session_start();
			$_SESSION['userName'] = $userName;

			header('Location: zivotopis.php');		
		}
		else{
			echo ('<script type="text/javascript">');
			echo ('alert("Pogrešni podaci kod logiranja")');
			echo ('</script>');
			header('Location: login.html');
			}
	}else {
		echo ('<script type="text/javascript">');
		echo ('alert("Pogrešni podaci kod logiranja")');
		echo ('</script>');
		
		header('Location: login.html');	
	}
	
	mysqli_stmt_close($stmt);
	mysqli_close($dbc);

?>