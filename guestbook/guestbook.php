<?php declare(strict_types=1);
require_once('classes/Message.php');
require_once('validation.php');

class Guestbook {
    public static function getFilePath() {
        return './berichten/berichten.json';
    }

    public static function addMessage($data) {
        // TODO: berichten toevoegen
        $path = Guestbook::getFilePath();
        $messageArray = Guestbook::getMessages();
    
        $message = new Message($data['firstName'], 
            $data['lastName'], 
            date('d-m-Y'),
            $data['message']);
    
        array_push($messageArray, $message);
        file_put_contents($path, json_encode($messageArray, JSON_PRETTY_PRINT));
        
    }

    public static function getMessages() {
        // TODO: berichten
        $path = Guestbook::getFilePath();
        $file = file_get_contents($path);
        
        return (array) json_decode($file, null, 512, JSON_OBJECT_AS_ARRAY);
    }

    public static function deleteMessage($message) {
        // TODO: verwijder bericht
        $path = Guestbook::getFilePath();
        $file = json_decode(file_get_contents($path . 'berichten.json'));
        // array_splice($file, array_search($message), 1);
    }

    public static function updateMessage() {
        // TODO: bewerk bericht
    }
}