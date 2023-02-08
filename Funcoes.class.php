<?php


class Funcoes {

    private $enviarEmail;


    /*
     * *************************************************
     * ********* RESPONSAVEL POR ENVIAR EMAIL **********
     * *************************************************
     */

    static public function EnviarEmail(array $DadosEmail, PHPMailer $PHPMailer) {

        // die(var_dump($DadosEmail));
        $email = $PHPMailer;
        $email->IsSMTP(); // define que será usado SMTP:
        // Define os dados técnicos da Mensagem:
        $email->IsHTML(true);
        $email->CharSet = MAIL_CHARSET;
        $email->SMTPAuth = MAIL_SMTPAUTH; // Configurações do SMTP:
        // $email->SMTPSecure = MAIL_SMTPSECURE;
        $email->Host = MAIL_HOST;
        $email->Port = MAIL_PORT;
        $email->Username = MAIL_USER_NAME; // Usuário do servidor SMTP.
        $email->Password = MAIL_PASSWORD; // Senha do servidor SMTPmente
        $email->Subject = $DadosEmail ['asssunto']; // Define a mensagem (Assunto).
        // Define remetente:
        $email->From = $DadosEmail ['emailRementente'];
        $email->FromName = $DadosEmail ['remetente'];
        $email->AddReplyTo($DadosEmail ['emailResposta'], $DadosEmail ['nomeEmailResposta']); // Para quando responder, não vá para o email de autenticação.
        $email->AddAddress($DadosEmail ['emailDestino'], $DadosEmail ['nome']); // Define 0(s) destinatarios:
        $email->AddAddress($DadosEmail ['emailDestino2'], $DadosEmail ['nome']); // Define 0(s) destinatarios:
        $email->Body = $DadosEmail ['Body']; // corpo da mensagem:
        // corpo da mensagem em modo texto:
        $email->AltBody = $DadosEmail ['Body'];
        // anexa arquivo no corpo do email:
        if (!empty($DadosEmail ['nomeEpastaDoArquivoEmAnexo'])) {
            $email->AddAttachment($DadosEmail ['nomeEpastaDoArquivoEmAnexo']); // attachment
        }
        // Envia o e-mail:
        
        try {
	        if (!$email->send()) 
	            return var_dump($email->ErrorInfo);
	        else 
	            return true;
        } catch (Exception $e){
        	 
        }
    }

    
    
   


}
