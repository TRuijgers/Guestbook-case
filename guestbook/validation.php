<?php declare(strict_types=1);

function validate($data) {
    foreach($data as $key => $value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $data[$key] = $value;
    }
      
    return $data;
}