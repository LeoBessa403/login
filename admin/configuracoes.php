<?php

function servidor_inicial()
{
    if ($_SERVER['HTTP_HOST'] == 'localhost') {
        $config = array(
            'HOME' => 'http://localhost/login/',
            'HOST' => 'localhost',
            'USER' => 'postgres',
            'PASS' => 'admin',
            'DBSA' => 'enovus10',
            'SCHEMA' => 'login',
            'BANCO' => 2, // 1 = mysql, 2 = postgres
            'DEBUG' => true,
            'PROD' => false,
            'TOKEN_PAGSEGURO' => "5FDD35645CC1412296CE57A3542E48D0",
            'URL_PAGSEGURO' =>
                "https://ws.sandbox.pagseguro.uol.com.br/v2/",
            'JS_PAGSEGURO' =>
                "sandbox.pagseguro.js",
        );
    } else {
        $ambTeste = strstr($_SERVER['SERVER_NAME'], 'dgt.editoraenovus.com.br');
        if ($ambTeste != null) {
            $config = array(
                'HOME' => 'https://dgt.editoraenovus.com.br/login/',
                'HOST' => 'localhost',
                'USER' => 'postgres',
                'PASS' => '@EnV@2021#digital',
                'DBSA' => 'postgres',
                'SCHEMA' => 'login',
                'BANCO' => 2, // 1 = mysql, 2 = postgres
                'DEBUG' => false,
                'PROD' => false,
                'TOKEN_PAGSEGURO' => "5FDD35645CC1412296CE57A3542E48D0",
                'URL_PAGSEGURO' =>
                    "https://ws.sandbox.pagseguro.uol.com.br/v2/",
                'JS_PAGSEGURO' =>
                    "sandbox.pagseguro.js",
            );
        } else {
            $config = array(
                'HOME' => 'https://sistemadabeleza.com.br/',
                'HOST' => 'localhost',
                'USER' => 'sistem25_dabelez',
                'PASS' => 'Admin101*',
                'DBSA' => 'sistem25_dabelez',
                'BANCO' => 2, // 1 = mysql, 2 = postgres
                'DEBUG' => false,
                'PROD' => true,
                'TOKEN_PAGSEGURO' => "e420df9f-b88a-4ba4-acfc-ef3dc796abd129194be145c3878bd1e90a4f65786848b0c0-51de-48b2-a242-7ae275f26890",
                'URL_PAGSEGURO' =>
                    "https://ws.pagseguro.uol.com.br/v2/",
                'JS_PAGSEGURO' =>
                    "pagseguro.js",
            );
        }
    }

    define('HOME', $config['HOME']);
    define('HOST', $config['HOST']);
    define('USER', $config['USER']);
    define('PASS', $config['PASS']);
    define('DBSA', $config['DBSA']);
    define('SCHEMA', $config['SCHEMA']);
    define('BANCO', $config['BANCO']);
    define('DEBUG', $config['DEBUG']);
    define('PROD', $config['PROD']);
    define('CO_USUARIO_PADRAO', 1);
    define('NO_USUARIO_PADRAO', 'Usuário Enovus');
    define("TOKEN_PAGSEGURO", $config['TOKEN_PAGSEGURO']);
    define("URL_PAGSEGURO", $config['URL_PAGSEGURO']);
    define("JS_PAGSEGURO", HOME . 'library/js/' . $config['JS_PAGSEGURO']);
    define("EMAIL_PAGSEGURO", "leodjx@hotmail.com");
    define("EMAIL_LOJA", "leodjx@hotmail.com");
    define("MOEDA_PAGAMENTO", "BRL");
    define("URL_NOTIFICACAO", HOME . "library/NotificacaoPagSeguro.php");
    define("API_WHATS_SERVER", false);
    define("API_WHATS_URL", "https://api.chat-api.com/instance117133/");
    define("API_WHATS_TOKEN", "wtnx36qqeqbxn21i");
    define("PERFIL_USUARIO_PADRAO", 3);
}
