<?php declare(strict_types=1);
require_once('classes/Message.php');
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
    $messageArray = getMessages();

    $message = new Message($_POST['firstName'], 
        $_POST['lastName'], 
        date('d-m-Y'),
        $_POST['message']);

    array_push($messageArray, $message);
    file_put_contents($path . 'berichten.json', json_encode($messageArray, JSON_PRETTY_PRINT));

}

function getMessages() {
    // TODO: berichten 
    $path = getFilePath();
    $file = file_get_contents($path . 'berichten.json');
    return (array) json_decode($file, null, 512, JSON_OBJECT_AS_ARRAY);
}

function deleteMessage($message) {
    // TODO: verwijder bericht
    $path = getFilePath();
    $file = json_decode(file_get_contents($path . 'berichten.json'));
    // array_splice($file, array_search($message), 1);
}

function updateMessage() {
    // TODO: bewerk bericht
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    confirmInput($_POST); 
}
