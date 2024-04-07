<?php
require_once "vendor/autoload.php";

use \DiscordWebhooks\Client;
use \DiscordWebhooks\Embed;

$webook = new Client('https://discord.com/api/webhooks/1208135966540308550/-0E80keDl9SWdmhsKSw6d251-ZncE41eGCo1vm67_zixnX--NBd-ce_ipzK5JlC9RuhD', ['verify'=>false]);

$message = new Embed();
$nome = filter_input(INPUT_POST, 'nome');
$id_cidade = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$cidade = filter_input(INPUT_POST,'cidade');
$url = filter_input(INPUT_POST, 'url');
$data = filter_input(INPUT_POST, 'data');
$desc = filter_input(INPUT_POST, 'desc');

    /* $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];
    $id_cidade = $_POST['id'];
    $url = $_POST['url'];
    $desc = $_POST['desc'];*/

    $message ->description("
        Nome: ".$nome."
        Cidade: ".$cidade." ID: ".$id_cidade."
        URL:".$url."
        Descrição do Ocorrido:".$desc."
        "
    );
    $webook->username("Bot SpaceGroup")->message("Denuncia")->embed($message)->send();

?>