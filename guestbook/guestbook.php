<?php declare(strict_types=1);
require_once('./Messages.php');

function init() {
    // TODO: berichten ophalen
    getMessages();
}

function addMessage() {
    // TODO: berichten toevoegen
    $path = './berichten/';
    $message = new Message($_POST['firstName'], 
        $_POST['lastName'], 
        $_POST['message'],
        $_POST['postDate']);

    file_put_contents($path . 'berichten.json', json_encode($message), FILE_APPEND);
}

function getMessages() {
    // TODO: berichten 
    $path = './berichten/';
    $file = file_get_contents($path . 'berichten.json');
    return $file;
}

function deleteMessage() {
    // TODO: verwijder bericht
}

function updateMessage() {
    // TODO: bewerk bericht
}

function validate() {
    // TODO: $_POST[] check
    addMessage();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    validate(); 
}
