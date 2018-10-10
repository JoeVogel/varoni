<?php

// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "julianavaroni@gmail.com";
$subject = "Novo contato recebido:  $name";
$body = "Você recebeu uma nova mensagem do site Varoni.\n\n"."Estes são os detalhes do contato:\n\Nome: $name\n\nE-mail: $email\n\nFone: $phone\n\nMensagem:\n$message";
$header = "From: nao_responda@varoniacessorios.com.br\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
