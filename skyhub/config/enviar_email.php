<?php
	require 'PHPMailer/PHPMailerAutoload.php';
	
	$Mailer = new PHPMailer();
	
	//Define que será usado SMTP
	$Mailer->IsSMTP();

	$Mailer->SMTPDebug= 2;
	//Enviar e-mail em HTML
	//$Mailer->isHTML(true);
	$Mailer->Debugoutput = 'html';
	//Aceitar carasteres especiais
	//$Mailer->Charset = 'UTF-8';
	
	//Configurações
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'ssl';
	
	//nome do servidor
	$Mailer->Host = 'smtp.gmail.com';
	//Porta de saida de e-mail 
	$Mailer->Port = 465;
	
	//Dados do e-mail de saida - autenticação
	$Mailer->Username = 'bit.louc@gmail.com';
	$Mailer->Password = 'b1tl0uc@';
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = 'bit.louc@gmail.com';
	
	//Nome do Remetente
	$Mailer->FromName = 'Bit Louc';
	
	//Assunto da mensagem
	$Mailer->Subject = 'Titulo - Teste';
	
	//Corpo da Mensagem
	$Mailer->Body = 'Conteudo do E-mail';
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = 'conteudo do E-mail em texto';
	
	//Destinatario 
	$Mailer->AddAddress('bit.louc@gmail.com');
	
	if($Mailer->send()){
		echo "E-mail enviado com sucesso";
	}else{
		echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
	}
	
?>



