<?php

try{

	if (isset($_POST['button-enviar'])) {
		
		$nome = $_POST['name'];
		$email = $_POST['email'];
		$assunto = $_POST['subject']; 
		$mensagem = $_POST['message'];
		//====================================================
		
		//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
		//==================================================== 
		$email_remetente = "marketing@praxisjr.com.br"; // deve ser uma conta de email do seu dominio 
		//====================================================
		
		//Configurações do email, ajustar conforme necessidade
		//==================================================== 
		$email_destinatario = "nathalia.ornellas@praxisjr.com.br"; // pode ser qualquer email que receberá as mensagens
		$email_reply = "$email"; 
		$email_assunto = "Contato BM Soccer"; // Este será o assunto da mensagem
		//====================================================
		
		//Monta o Corpo da Mensagem
		//====================================================
		$email_conteudo = "Nome = $nome \n"; 
		$email_conteudo .= "Email = $email \n";
		$email_conteudo .= "Assunto = $assunto \n"; 
		$email_conteudo .= "Mensagem = $mensagem \n"; 
		//====================================================
		
		//Seta os Headers (Alterar somente caso necessario) 
		//==================================================== 
		$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
		//====================================================
		
		//Enviando o email 
		//==================================================== 
		mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers);
		//====================================================

		header("location: ../indexusa.html");
	} 

	die();
} catch (phpmailerException $e) {
    die();
} catch (Exception $e) {
    die();
}
?>