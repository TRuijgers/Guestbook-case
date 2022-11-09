<?php declare(strict_types=1);
require_once('IMessage');

class Message implements \JsonSerializable, IMessage {
    private $message;
    private $postDate;

    function __construct($message, $postDate) {
        $this->message = $message;
        $this->postDate = $postDate;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function getMessage() : string {
        return $this->message;
    }

    public function getPostDate() : date {
        return date('d-m-Y', $this->postDate);
    }
}