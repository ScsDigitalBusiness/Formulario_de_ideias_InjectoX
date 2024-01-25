<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Inclui o autoload do PHPMailer
include("vendor/autoload.php");
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta as informações do formulário
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
    $contato = isset($_POST["contato"]) ? $_POST["contato"] : "";
    $descricao_ideia = isset($_POST["descricao-ideia"]) ? $_POST["descricao-ideia"] : "";
    $tipo_produto = isset($_POST["tipo-produto"]) ? $_POST["tipo-produto"] : "";
    $solucao = isset($_POST["solucao"]) ? $_POST["solucao"] : "";
    $descricao_problema = isset($_POST["descricao-problema"]) ? $_POST["descricao-problema"] : "";

    // Constrói a mensagem de e-mail
    $mensagem = "Nome: $nome\n";
    $mensagem .= "Contato: $contato\n";
    $mensagem .= "Descrição da Ideia do Produto: $descricao_ideia\n";
    $mensagem .= "Tipo de Produto: $tipo_produto\n";
    $mensagem .= "Solução que o Produto Oferece: $solucao\n";
    $mensagem .= "Descrição do Problema que o Produto Resolve: $descricao_problema\n";

    // Configuração do PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'atendimento@scsdigitalbusiness.com.br';
        $mail->Password   = 'Scs217433@';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // Remetente e destinatário
        $mail->setFrom('atendimento@scsdigitalbusiness.com.br', 'Projeto Ideias Sustentáveis');
        $mail->addAddress('lyra11522@gmail.com');

        // Conteúdo do e-mail
        $mail->isHTML(false);
        $mail->Subject = 'Nova Ideia Sustentável';
        $mail->Body    = $mensagem;

        // Envia o e-mail
        $mail->send();
        echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
        echo 'Erro ao enviar a mensagem. Detalhes do erro: ' . $mail->ErrorInfo;
    }
} else {
    // Se alguém tentar acessar diretamente o arquivo PHP, redireciona para o formulário
    header("Location: index.html");
    exit();
}
?>
