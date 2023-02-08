	<?php
	date_default_timezone_set('America/Sao_Paulo');



	define('MAIL_SMTPAUTH', true);
	    define('MAIL_SMTPSECURE', 'ssl');
	    define('MAIL_HOST', 'smtp.seguidor.com.br');
	    define('MAIL_PORT', 587);
	    define('MAIL_USER_NAME', "seguidor@seguidor.com.br");
	    define('MAIL_PASSWORD', '33jps666');
	    define('MAIL_CHARSET', "iso-8859-1");

	require_once("phpmailer/class.phpmailer.php");
	require_once("phpmailer/class.smtp.php");
	include_once"Funcoes.class.php";

	$phpmailer = new PHPMailer;

	$nome       = $_POST['nome'];
	$email      = $_POST['email'];
	$telefone   = $_POST['telefone'];
	$assunto   = $_POST['assunto'];
	$mensagem   =  $_POST['mensagem'];
	 
	$msgCliente = "
		<h1>Contato Site Alarmes</h1>
		<ul>
			<li>Nome : {$nome}</li>
			<li>Email :  {$email}</li>
			<li>Tel: {$telefone}</li>
			<li>Assunto :  {$assunto}</li>
			<li>Mensagem : <br> {$mensagem}</li>
		</ul>
	";

	$DadosEmail ['asssunto'] = "Abertura de captacao";
     $DadosEmail ['emailRementente'] = 'contato@volpatorastreamento.com.br';
     $DadosEmail ['remetente'] = 'volpato rs';
     $DadosEmail ['emailDestino'] = 'simuladorvolpato@gmail.com';//simuladorvolpato@gmail.com
     $DadosEmail ['nome'] = $Dados ['captacao_cliente'];
     $DadosEmail ['emailResposta'] = '';
     $DadosEmail ['nomeEmailResposta'] = "";
     $DadosEmail ['Body'] = $msgCliente;
     $phpmailer = new PHPMailer;
     $RESPOSTA = (Funcoes::EnviarEmail($DadosEmail, $phpmailer)) ? 1 : 0;
if($RESPOSTA){
	echo'<script type="text/javascript">
		   location.href="obrigado.php";
		 </script>';
}else{
echo'nao';
}