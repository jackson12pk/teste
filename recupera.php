<?php
require_once "usuarios.php";
$u = new Usuario();	
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="assets/css/style.css">
	<title>Recuperar Senha</title>
</head>
<body>
	<?php 
	if(isset($_GET['cod'])){
		$cod = $_GET['cod'];
		$emailcod = base64_decode($cod);
	}

	if(isset($_POST['senha'])){

		$senha = addslashes($_POST['senha']);
		$confsenha = addslashes($_POST['confsenha']);
		$emailcod = base64_decode($cod);

		if(!empty($emailcod) && !empty($senha))
		{
			if(($senha === $confsenha))
			{
				$u->conectar("teste","localhost","root","");
			if($u->msgErro == "")//Se não houve erros.
			{
				if($u->alteraSenha($emailcod, $senha))
				{
					echo '<script>alert("Senha alterada com sucesso!");</script>';
				}
				else
				{
					echo '<script>alert("Senha não alterada!");</script>';
				}
			}else{
				echo '<script>alert("Erro: '.$u->msgErro.'");</script>';
			}
		}
		else
		{
			echo '<script>alert("Confirmação de senha incorreta, digite senhas iguais!");</script>';

		}
	}
	else
	{
		echo '<script>alert("Preencha todos os campos!");</script>';

	}
}



?>

<div class="container">
	<div class="form-content-recupera">
		<form method="POST">	
			<div class="form-group">
				<label for="">E-mail:</label>
				<input type="text" name="email" placeholder="Digite seu e-mail para recuperar a senha" class="form-control" required="" autofocus="" readonly="" value="<?php echo $emailcod; ?>">
				<label for="">Nova senha:</label>
				<input type="password" name="senha" placeholder="Digite sua nova senha" class="form-control" required="">
				<label for="">Confirme a nova senha:</label>
				<input type="password" name="confsenha" placeholder="Confirme sua nova senha" class="form-control" required="">
			</div>
			<input type="submit" value="Salvar" class="button-login">
		</form>
	</div>
</div>
</body>
</html>