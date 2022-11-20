<?php
require_once('IUser.php');

class User implements IUser {
    private $firstName;
    private $lastName;
    private $userName;

    function __construct($firstName, $lastName, $userName = '') {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userName = $userName;
    }

    public function getUserName() : string {
        if ($this->username != '') {
            return $this->username;
        }
    }

    public function setUserName(string $userName) : void {
        $this->userName = $userName;
    }
}