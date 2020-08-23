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

	<div class="container">
		<div class="form-content-recupera">
			<form method="POST">	
				<div class="form-group">
					<label for="">E-mail:</label>
					<input type="text" name="email" placeholder="Digite seu e-mail para recuperar a senha" class="form-control" required="" autofocus="">
				</div>
				<input type="submit" value="Enviar" class="button-login">
				<small>
					<a class="recuperar float-right" href="index.php">Voltar</a>
				</small>
			</form>
		</div>
	</div>
</body>
</html>

<?php 
if(isset($_POST['email'])){

// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php 
	include "assets/PHPMailer-master/PHPMailerAutoload.php"; 

// Inicia a classe PHPMailer 
	$mail = new PHPMailer(); 

// Método de envio 
	$mail->IsSMTP(); 

// Enviar por SMTP 
	$mail->Host = "smtp.gmail.com"; 

// Você pode alterar este parametro para o endereço de SMTP do seu provedor 
	$mail->Port = 587; 


// Usar autenticação SMTP (obrigatório) 
	$mail->SMTPAuth = true; 

// Usuário do servidor SMTP (endereço de email) 
// obs: Use a mesma senha da sua conta de email 
	$mail->Username = 'recupera.senha.teste95@gmail.com'; 
	$mail->Password = '03041995@j'; 

// Configurações de compatibilidade para autenticação em TLS 
	$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 

// Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro. 
// $mail->SMTPDebug = 2; 

// Define o remetente 
// Seu e-mail 
	$mail->From = "recupera@gmail.com"; 

// Seu nome 
	$mail->FromName = "Recuperação de Senha"; 

// Define o(s) destinatário(s) 
	$mail->AddAddress('jackson12pk@hotmail.com', 'Jack'); 

// Definir se o e-mail é em formato HTML ou texto plano 
// Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
	$mail->IsHTML(true); 

// Charset (opcional) 
	$mail->CharSet = 'UTF-8'; 

// Assunto da mensagem 
	$mail->Subject = "TESTE DE E-MAIL"; 

// Corpo do email 
	$mail->Body = 'TESTE ENVIANDO SENHA'; 

// Opcional: Anexos 
// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 

// Envia o e-mail 
	$enviado = $mail->Send(); 

// Exibe uma mensagem de resultado 
	if ($enviado) 
	{ 
		echo "<script>alert('Enviado!');</script>"; 
	} else { 
		echo "<script>alert('Houve um erro enviando o email: ".$mail->ErrorInfo."');</script>"; 
	} 
}
?>