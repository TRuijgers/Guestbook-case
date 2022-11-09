<?php declare(strict_types=1);
require_once('Message.php');
require_once('validation.php');

function init() {
    // TODO: berichten ophalen
    getMessages();
}

function addMessage() {
    // TODO: berichten toevoegen
    $messageArray = getMessages();
    $path = './berichten/';
    $message = new Message($_POST['firstName'], 
        $_POST['lastName'], 
        $_POST['message'],
        date('d-m-Y'));
    array_push($messageArray, $message);
    file_put_contents($path . 'berichten.json', json_encode($messageArray));
}

function getMessages() {
    // TODO: berichten 
    $path = './berichten/';
    $file = file_get_contents($path . 'berichten.json');
    return (array) json_decode($file, null, 512, JSON_OBJECT_AS_ARRAY);
}

function deleteMessage($message) {
    // TODO: verwijder bericht
    $temp = file_get_contents('./berichten/berichten.json');
    
}

function updateMessage() {
    // TODO: bewerk bericht
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    addMessage(confirmInput($_POST)); 
}
