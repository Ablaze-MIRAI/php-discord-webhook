<?php

namespace Ablaze\PhpDiscordWebhook;

class Embed {
    /**
     * Initialize class and base content
     * 
     * @param string $title       Embed title
     * @param string $description Embed description
     * @return void
     */
    public function __construct(string $title=null, string $description=null)
    {
        $this->embed_body = [];
        $this->embed_body["fields"] = [];
        if($title) $this->embed_body["title"] = $title;
        if($description) $this->embed_body["description"] = $description;
    }

    /**
     * Set url
     * 
     * @param string $title Embed url
     * @return void
     */
    public function setURL(string $URL)
    {
        $this->embed_body["url"] = $URL;
    }

    /**
     * Set timestamp
     * 
     * @param DateTime $timestamp Embed timestamp
     * @return void
     */
    public function setTimestamp(\DateTime $timestamp)
    {
        $this->embed_body["timestamp"] = $timestamp->format(\DateTime::ISO8601);
    }

    /**
     * Set color
     * 
     * @param string $color Embed color(Hex)
     * @return void
     */
    public function setColor(string $color)
    {
        //$hex = str_replace($color, "#", "");
        $this->embed_body["color"] = hexdec($color);
    }

    /**
     * Set footer
     * 
     * @param string $text Embed footer text
     * @param string $icon_url Embed footer icon url
     * @return void
     */
    public function setFooter(string $text=null, string $icon_url=null)
    {
        if($text) $this->embed_body["footer"]["text"] = $text;
        if($icon_url) $this->embed_body["footer"]["icon_url"] = $icon_url;
    }

    /**
     * Set image
     * 
     * @param string $URL Embed main image url
     * @return void
     */
    public function setImage(string $URL)
    {
        $this->embed_body["image"]["url"] = $URL;
    }

    /**
     * Set thumbnail
     * 
     * @param string $URL Embed thumbanil image url
     * @return void
     */
    public function setThumbnail(string $URL)
    {
        $this->embed_body["thumbnail"]["url"] = $URL;
    }

    /**
     * Set author
     * 
     * @param string $name     Embed author name
     * @param string $URL      Embed author url
     * @param string $icon_url Embed author icon url
     * @return void
     */
    public function setAuthor(string $name=null, string $URL=null, string $icon_url=null)
    {
        if($name) $this->embed_body["author"]["name"] = $name;
        if($URL) $this->embed_body["author"]["url"] = $URL;
        if($icon_url) $this->embed_body["author"]["icon_url"] = $icon_url;
    }

    /**
     * Add field
     * 
     * @param string $name     Embed field name
     * @param string $URL      Embed field value
     * @param string $icon_url Embed field inline
     * @return void
     */
    public function addField(string $name=null, string $value=null, bool $inline=false)
    {
        $field = ["inline" => $inline];
        if($name) $field["name"] = $name;
        if($value) $field["value"] = $value;
        array_push($this->embed_body["fields"], $field);
    }
};