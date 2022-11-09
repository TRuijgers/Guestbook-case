<?php declare(strict_types=1);
require_once('Message.php');
require_once('validation.php');

function init() {
    // TODO: berichten ophalen
    getMessages();
}

function getFilePath() : string {
    return './berichten/';
}

function addMessage() {
    // TODO: berichten toevoegen
    $path = getFilePath();
    $message = new Message($_POST['firstName'], 
        $_POST['lastName'], 
        $_POST['message'],
        date('d-m-Y'));

    file_put_contents($path . 'berichten.json', json_encode($message, JSON_PRETTY_PRINT), FILE_APPEND);
}

function getMessages() {
    // TODO: berichten 
    $path = getFilePath();
    $file = file_get_contents($path . 'berichten.json');
    return $file;
}

function deleteMessage($message) {
    // TODO: verwijder bericht
    $path = getFilePath();
    $file = json_decode(file_get_contents($path . 'berichten.json'));
    array_splice($file, array_search($message), 1);
    
}

function updateMessage() {
    // TODO: bewerk bericht
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   addMessage(validate($_POST)); 
}
