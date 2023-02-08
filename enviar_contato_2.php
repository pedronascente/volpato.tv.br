<?php
date_default_timezone_set('America/Sao_Paulo');

//define('MAIL_CHARSET', "UTF-8");
define('MAIL_SMTPAUTH', true);
define('MAIL_SMTPSECURE', 'ssl');
define('MAIL_HOST', 'smtp.revendavolpato.com');
define('MAIL_PORT', 587);
define('MAIL_USER_NAME', "revendavolpato@revendavolpato.com");
define('MAIL_PASSWORD', 'admin@cairu');

require_once("phpmailer/class.phpmailer.php");
require_once("phpmailer/class.smtp.php");
include_once"Funcoes.class.php";

$phpmailer = new PHPMailer;

$nome       = $_POST['nome'];
$email      = $_POST['email'];
$ddd   = $_POST['ddd'];
$telefone   = $_POST['telefone'];
$assunto   = $_POST['assunto'];
$mensagem   =  $_POST['mensagem'];

$msgCliente = "
	<h1>CONTATO VOLPATO ALARMES </h1>
	<ul>
		<li>Nome : {$nome}</li>
		<li>Email :  {$email}</li>
		<li>DDD: {$ddd}</li>
		<li>Tel: {$telefone}</li>
		<li>Assunto :  {$assunto}</li>
		<li>Mensagem : <br> {$mensagem}</li>
	</ul>
";

$DadosEmail['asssunto'] = "Contato Rastreamento";
$DadosEmail['emailRementente'] = 'revendavolpato@revendavolpato.com';
$DadosEmail['remetente'] = 'volpatorastr.com';
$DadosEmail['emailDestino'] = "volpato@grupovolpato.com";
$DadosEmail['emailDestino2'] = "marketing@grupovolpato.com";
$DadosEmail['nome'] = $nome;
$DadosEmail['emailResposta'] = 'volpato@grupovolpato.com';
$DadosEmail['nomeEmailResposta'] = "Volpato Ratreamento";
$DadosEmail['Body'] = $msgCliente;

$RESPOSTA = (Funcoes::EnviarEmail($DadosEmail, $phpmailer)) ? 1 : 0;



if($RESPOSTA){
	echo'<script type="text/javascript">
		   location.href="contato.php";
		 </script>';
}else{
echo'nao';
}