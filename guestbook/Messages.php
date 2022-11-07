<?php declare(strict_types=1);

class Messages {
    protected $firstName;
    protected $lastName;
    protected $message;
    protected $postDate;

    function __construct($firstName, $lastName, $message, $postDate) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->message = $message;
        $this->postDate = $postDate;
    }

    function getFullMessage () {
        return new StdClass($this->firstName, 
                $this->lastName,
                $this->message, 
                $this->postDate);
    }
}