<?php

require_once __DIR__."/../vendor/autoload.php";

use Ablaze\PhpDiscordWebhook\Webhook;
use Ablaze\PhpDiscordWebhook\Embed;

$embed = new Embed("Title", "Description");
$embed->setColor("#FFFFFF");
$embed->setAuthor("Author Name", "https://example.com", "https://raw.githubusercontent.com/Ablaze-MIRAI/php-discord-webhook/main/sample/image/icon.png");
$embed->setFooter("Footer", "https://raw.githubusercontent.com/Ablaze-MIRAI/php-discord-webhook/main/sample/image/icon.png");
$embed->setTimestamp(new DateTime("0:00"));
$embed->setImage("https://raw.githubusercontent.com/Ablaze-MIRAI/php-discord-webhook/main/sample/image/image.png");
$embed->setThumbnail("https://raw.githubusercontent.com/Ablaze-MIRAI/php-discord-webhook/main/sample/image/thumbnail.png");
$embed->addField("Field 1", "value");
$embed->addField("Field 2", "value(inline)", true);
$embed->addField("Field 3", "value(inline)", true);

$message = new Webhook("User Name", "https://raw.githubusercontent.com/Ablaze-MIRAI/php-discord-webhook/main/sample/image/icon.png", "Message Content");
$message->addEmbed($embed);
$response = $message->send("https://discord.com/api/webhooks/****/****");

if($message->ok()){
    echo "success";
}else{
    echo "error";

    // Request info
    var_dump($response);
}