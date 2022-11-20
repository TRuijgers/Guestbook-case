<?php declare(strict_types=1);
require_once('classes/Message.php');
require_once('validation.php');

class Guestbook {
    const FILEPATH = './berichten/berichten.json';

    public static function addMessage(array $data) : void  {
        $messageArray = Guestbook::getMessages();
       
        $message = new Message($data['firstName'], 
            $data['lastName'], 
            date('h:i:s d F Y'),
            $data['message']);
        array_unshift($messageArray, $message);

        file_put_contents(self::FILEPATH, json_encode($messageArray, JSON_PRETTY_PRINT)); 
    }

    public static function getMessages() : array {
        $file = file_get_contents(self::FILEPATH);
        
        return (array) json_decode($file, null, 512, JSON_OBJECT_AS_ARRAY);
    }

    public static function deleteMessage() {
        // TODO: verwijder bericht
    }

    public static function updateMessage() {
        // TODO: bewerk bericht
    }
}