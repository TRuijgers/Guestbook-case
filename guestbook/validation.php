<?php declare(strict_types=1);
function confirmInput($data){
    if (empty($_POST["message"])){
        $error = "Please fill in the form before submitting.";
    } elseif (empty($_POST["firstName"])){
        $error = "Your name is required.";
    } elseif (empty($_POST["lastName"])){
        $error = "Your name is required.";
    } else {
        validateInput($data);
    }
    echo '<p style="color:red">' . $error . '</p>';

}
function validateInput($data) {
    foreach($data as $key => $value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $data[$key] = $value;
    }
    return $data;
}