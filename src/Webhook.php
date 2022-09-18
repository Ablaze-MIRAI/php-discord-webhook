<?php

namespace Ablaze\PhpDiscordWebhook;

class Webhook {
    /**
     * Definition of ContentType
     * 
     * @var string $ContentTypeJSON
     */
    private $ContentTypeJSON = "Content-type: application/json";

    /**
     * Initialize class and base content
     * 
     * @param string $name       User name
     * @param string $avater_url User icon url
     * @param string $content    Message content
     */
    public function __construct(string $name=null, string $avater_url=null, string $content=null)
    {
        $this->webhook_body = [];
        $this->webhook_body["embeds"] = [];
        if($name) $this->webhook_body["username"] = $name;
        if($avater_url) $this->webhook_body["avater_url"] = $avater_url;
        if($content) $this->webhook_body["content"] = $content;
    }

    /**
     * Add Embed
     * 
     * @param Embed $embed
     * @return void
     */
    public function addEmbed(Embed $embed): void
    {
        array_push($this->webhook_body["embeds"], $embed->embed_body);
    }

    /**
     * Send webhook
     * 
     * @param string $URL Webhook URL
     * @return array{ error: int, response: array }
     */
    public function send(string $URL): array
    {
        $result = $this->send_request($URL, $this->webhook_body);
        $this->result = $result;
        return $result;
    }

    /**
     * Check request
     * 
     * @return bool
     */
    public function ok(): bool{
        return !$this->res && !$this->ec;
    }
    
    private function send_request(string $URL, array $data): array
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [$this->ContentTypeJSON]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $response = curl_exec($ch);
        $error = curl_errno($ch);
        curl_close($ch);

        $this->res = $response;
        $this->ec = $error;
        return [
            "error" => $error,
            "response" => $response
        ];
    }
};