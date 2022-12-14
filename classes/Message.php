<?php declare(strict_types=1);
require_once('IMessage.php');

class Message implements \JsonSerializable, IMessage {
    private $firstName;
    private $lastName;
    private $postDate;
    private $message;

    function __construct($firstName, $lastName, $postDate, $message ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
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

    public function getPostDate() : string {
        return $this->postDate;
    }
}