<?php declare(strict_types=1);
require_once('guestbook.php');

function confirmInput($data){
    
    global $firstNameError; 
    global $lastNameError;
    global $messageError;
    $errorArray = [];

    if (empty($_POST["firstName"])){
        $firstNameError = "* Your first name is required.";
        array_push($errorArray, $firstNameError);
    }
    if (empty($_POST["lastName"])){
        $lastNameError = "* Your last name is required.";
        array_push($errorArray, $lastNameError);
    }
    if (empty($_POST["message"])){
        $messageError = "* Please type a message before submitting.";
        array_push($errorArray, $messageError);
    }
   

    if (count($errorArray) == 0){
        Guestbook::addMessage(validate($data)); 
    } else {
        return $errorArray;
    }
}

function validate($data) {
    foreach($data as $key => $value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $data[$key] = $value;
    } 
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    confirmInput($_POST); 
}