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
	<title>Cadastrar</title>
</head>
<body>

	<div class="container">
		<div class="form-content">
			<div class="img-content">
				<figure><img src="assets/img/add.svg" alt="" class="img-fluid"></figure>
			</div>

			<form action="" method="POST">	
				<div class="form-group">
					<label for="">Usuário:</label>
					<input required type="text" name="login" placeholder="Digite o nome de usuário" class="form-control"  autofocus="">
				</div>
				<div class="form-group">
					<label for="">E-mail:</label>
					<input required type="email" name="email" placeholder="Digite seu e-mail" class="form-control"  >
				</div>
				<div class="form-group">
					<label for="">Senha:</label>
					<input required type="password" name="senha" placeholder="Digite sua senha" class="form-control"  >
				</div>
				<div class="form-group">
					<label for="">Confirmar Senha:</label>
					<input required type="password" name="confsenha" placeholder="Confirme sua senha" class="form-control"  >
				</div>
				<input type="submit" value="Cadastrar" class="button-login">
				<a class="recuperar float-right" href="index.php">Cancelar</a>
			</form>
			<?php
			if(isset($_POST['login']))
			{
				$login = addslashes($_POST['login']);
				$senha = addslashes($_POST['senha']);
				$email = addslashes($_POST['email']);
				$confsenha = addslashes($_POST['confsenha']);
				//Verifica se os campos foram preenchidos
				if(!empty($login) && !empty($senha) && !empty($email) && !empty($confsenha))
				{
					$u->conectar("teste","localhost","root","");
					if($u->msgErro == "")//Se não houve erros.
					{
						if($senha === $confsenha)//Se a confirmação de senha for igual a senha.
						{
							if($u->cadastrar($login, $senha, $email))//Cadastra o usuário.
							{
								echo '<script>alert("Cadastrado com sucesso!");window.location.href="index.php";</script>';
							}
							else
							{
								echo '<script>alert("E-mail já cadastrado!");</script>';
							}
						}
						else
						{
							echo '<script>alert("Senhas não correspondem, digite senhas iguais. ");</script>';
						}
					}
					else
					{
						echo '<script>alert("Erro:'.$u->msgErro.'");</script>';
					}
				}
				else
				{
					echo '<script>alert("Preencha todos os campos!")</script>';
				}
			}
			
			?>				
		</div>
	</div>

</body>
</html>