<?php
class Funcoes{
    private $enviarEmail;

    /*
     * *************************************************
     * ********* RESPONSAVEL POR ENVIAR EMAIL **********
     * *************************************************
     */

    static public function EnviarEmail(array $DadosEmail, PHPMailer $PHPMailer, $charset = MAIL_CHARSET){

define('MAIL_SMTPAUTH', true);
        define('MAIL_SMTPSECURE', 'ssl');
        define('MAIL_HOST', 'smtp.seguidor.com.br');
        define('MAIL_PORT', 587);
        define('MAIL_USER_NAME', "seguidor@seguidor.com.br");
        define('MAIL_PASSWORD', '33jps666');
        define('MAIL_CHARSET', "iso-8859-1");
        
        $email = $PHPMailer;
        $email->IsSMTP(); // define que será usado SMTP:
        // Define os dados técnicos da Mensagem:
        $email->IsHTML(true);
        $email->CharSet = $charset;
        $email->SMTPAuth = MAIL_SMTPAUTH; // Configurações do SMTP:
        //$email->SMTPSecure = MAIL_SMTPSECURE;
        $email->Host = MAIL_HOST;
        $email->Port = MAIL_PORT;
        $email->Username = MAIL_USER_NAME; // Usuário do servidor SMTP.
        $email->Password = MAIL_PASSWORD; // Senha do servidor SMTPmente
        $email->Subject = $DadosEmail ['asssunto']; // Define a mensagem (Assunto). 
        //Define remetente:
        $email->From = $DadosEmail ['emailRementente'];
        $email->FromName = $DadosEmail ['remetente'];
        $email->AddReplyTo($DadosEmail ['emailResposta'], $DadosEmail ['nomeEmailResposta']); // Para quando responder, não vá para o email de autenticação.
        $email->AddAddress($DadosEmail ['emailDestino'], $DadosEmail ['nome']); // Define 0(s) destinatarios:
        $email->AddCC('desenvolvimento@grupovolpato.com', 'volpato.rs'); // Copia
        $email->Body = $DadosEmail ['Body']; // corpo da mensagem:
        // corpo da mensagem em modo texto:
        $email->AltBody = $DadosEmail ['Body'];
        // anexa arquivo no corpo do email:
        if(!empty($DadosEmail ['nomeEpastaDoArquivoEmAnexo'])) {
            $email->AddAttachment($DadosEmail ['nomeEpastaDoArquivoEmAnexo']); // attachment
        }
        // Envia o e-mail: 
        if ($email->send()){
            return true ;
        }else{
             $error =  $email->SMTPDebug = 2;
                 var_dump($email->ErrorInfo,$error);

                 return false;
        }

                
    }   
}
