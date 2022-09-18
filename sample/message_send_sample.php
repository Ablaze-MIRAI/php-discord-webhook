<?php

require_once __DIR__."/../vendor/autoload.php";

use Ablaze\PhpDiscordWebhook\Webhook;

$message = new Webhook("User Name", "https://github.com/qiita.png", "Message Content");
$response = $message->send("https://discord.com/api/webhooks/****/****");

if($message->ok()){
    echo "success";
}else{
    echo "error";

    // Request info
    var_dump($response);
}