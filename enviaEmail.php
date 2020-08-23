<?php 

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
$mail->From = "recupera.senha.teste95@gmail.com"; 
 
// Seu nome 
$mail->FromName = "Teste"; 
 
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
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->SMTPDebug = 2; //Alternative to above constant
 
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

 ?>