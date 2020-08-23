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
	<title>Login</title>
</head>
<body>

	<div class="container">
		<div class="form-content">
			<div class="img-content">
				<figure><img src="assets/img/login.svg" alt="" class="img-fluid"></figure>
			</div>

			<form method="POST">	
				<div class="form-group">
					<label for="">Login:</label>
					<input type="text" name="login" placeholder="Digite seu login" class="form-control" required="" autofocus="">
				</div>
				<div class="form-group">
					<label for="">Senha:</label>
					<input type="password" name="senha" placeholder="Digite sua senha" class="form-control" required="" >
				</div>
				<input type="submit" value="Acessar" class="button-login">
				<small>
					<a class="recuperar float-left" href="cadastro.php">Cadastrar</a>
					<a class="recuperar float-right" href="recuperaSenha.php">Esqueceu sua senha?</a>
				</small>
			</form>
		</div>
	</div>

	<?php 
	if(isset($_POST['login']))
	{
		$login = addslashes($_POST['login']);
		$senha = addslashes($_POST['senha']);

		if(!empty($login) && !empty($senha))
		{
			$u->conectar("teste","localhost","root","");
			if($u->msgErro == "")//Se não houve erros.
			{
				if($u->logar($login, $senha))
				{
					header("Location: principal.php");

				}
				else
				{
					echo '<script>alert("E-mail ou senha estão incorretos!");</script>';
				}
			}else{
				echo '<script>alert("Erro: '.$u->msgErro.'");</script>';
			}
		}
		else
		{
			echo '<script>alert("Preencha todos os campos!");</script>';

		}
	}
	?>				
</body>
</html>