<?php 
    setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "pt_BR.utf-8", "portuguese");
    
    include_once('phpmailer/PHPMailer.class.php'); 
    include_once('Funcoes.class.php');
    include_once('funcoes_helpers.php');
    include_once('RecaptchaGoogle.php'); 

    $Dados = $_POST;

    $array_captacao_interesse = [
        1=>'Alarme Comercial',
        2=>'Alarme Residencial'
    ];

    if(null==$Dados){
        header("Location:/obrigado.php");
    }

    $rg = new RecaptchaGoogle();
    $rg->set_recaptchaResponse($_POST['token_response']);
    $rg->set_url_api_recaptcha_google('https://www.google.com/recaptcha/api/siteverify');
    $rg->set_secret('6LdCd_IaAAAAANiJZlSr4zSmnM5EZsK5S0GtqLQK');
    $result = $rg->validaRecapchaGoogle();

    if($result['success']===true)
    {
        if(isset($Dados['captacao_telefone1']) && ( (null!==$Dados['captacao_cliente']) && (null !== $Dados['captacao_telefone1'])))
        {
            $Dados = formatarDados($Dados);
            
            enviarCaptacao($Dados);

            $Dados['captacao_interesse'] = $array_captacao_interesse[$Dados['captacao_interesse']];
            
            enviarEmail($Dados,new PHPMailer());
            
            header("Location:/obrigado.php");
        }else{
           header("Location:/obrigado.php");
        }
    }
    
    header("Location:/obrigado.php");