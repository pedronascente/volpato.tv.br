<?php

function enviarEmail($Dados){
     $msgCliente = '
     <table>
        <tr><td><b>NOME      :</b>' .$Dados["captacao_cliente"] .'</td></tr>
        <tr><td><b>EMAIL     :</b>' .$Dados["captacao_email"].'   </td></tr>
        <tr><td><b>TELEFONE  :</b>' .$Dados["captacao_telefone1"]  .'</td> </tr>
        <tr><td><b>INTERESSE :</b>' .$Dados["captacao_interesse"] .'</td></tr>
        <tr><td><b>MENSAGEM  :</b>' .$Dados["captacao_obs"] .'</td> </tr>
        <tr><td><b>ORIGEM    :</b>' .$Dados["origem"]    .'</td></tr>
    </table>';
 
     $DadosEmail ['asssunto'] = "Abertura de captacao";
     $DadosEmail ['emailRementente'] = 'contato@volpatorastreamento.com.br';
     $DadosEmail ['remetente'] = 'volpato rs';
     $DadosEmail ['emailDestino'] = 'simuladorvolpato@gmail.com';
     $DadosEmail ['nome'] = $Dados ['captacao_cliente'];
     $DadosEmail ['emailResposta'] = '';
     $DadosEmail ['nomeEmailResposta'] = "";
     $DadosEmail ['Body'] = $msgCliente;
     $phpmailer = new PHPMailer;
     $RESPOSTA = (Funcoes::EnviarEmail($DadosEmail, $phpmailer)) ? 1 : 0;
}

function formatarDados($Dados){
    $Dados = array(
        'captacao_interesse' => !empty($Dados['captacao_interesse'] )?$Dados['captacao_interesse'] :'',
        'captacao_cliente' => !empty($Dados['captacao_cliente'])?trim($Dados['captacao_cliente']):'',
        'captacao_telefone1' => $Dados['captacao_telefone1'],
        'captacao_email' => $Dados['captacao_email'],
        'captacao_obs' =>$Dados['captacao_obs'],
        'origem' => $Dados['origem'],
        'captacao_indicador' => $Dados['origem'],
        'acao' =>'InsertCaptacao'
    );
    
    return $Dados;
}

function enviarCaptacao($Dados){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://gpi.ddns.me:9093/gpi/modulos/captacao/src/controllers/captacao.php');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $Dados);
    $result = curl_exec($ch);
    curl_close($ch);
}