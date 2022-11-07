<?php declare(strict_types=1);

class Message {
    public $firstName;
    public $lastName;
    public $message;
    public $postDate;

    function __construct($firstName, $lastName, $message, $postDate) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->message = $message;
        $this->postDate = $postDate;
    }
}