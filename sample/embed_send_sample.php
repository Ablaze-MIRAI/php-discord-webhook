<?php

require_once __DIR__."/../vendor/autoload.php";

use Ablaze\PhpDiscordWebhook\Webhook;
use Ablaze\PhpDiscordWebhook\Embed;

$embed = new Embed("Title", "Description");
$embed->setColor("#FFFFFF");
$embed->setAuthor("Author Name", "https://example.com", "https://example.img");
$embed->setFooter("Footer", "https://example.img");
$embed->setImage("https://example.img");
$embed->setThumbnail("https://example.img");
$embed->addField("Field 1", "value");
$embed->addField("Field 2", "value(inline)", true);
$embed->addField("Field 3", "value(inline)", true);

$message = new Webhook("User Name", "https://github.com/qiita.png", "Message Content");
$message->addEmbed($embed);
$response = $message->send("https://discord.com/api/webhooks/****/****");

if($message->ok()){
    echo "success";
}else{
    echo "error";

    // Request info
    var_dump($response);
}