<?php 
session_start();
if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	echo '<script>alert("Acesso restrito! Faça login para acessar.");window.location.href="index.php"</script>';
}
else{	
	$id = $_SESSION['id'];
	$login = $_SESSION['login'];
	$email = $_SESSION['email'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Acesso Restrito</title>
</head>
<body>

	Seja bem-vindo <?php echo $login; ?>

</body>
</html>