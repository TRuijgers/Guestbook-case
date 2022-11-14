<?php declare(strict_types=1);

function delete(string $data) : string {
    $path = '../berichten/berichten.json';
    $file = file_get_contents($path);
    $message = (array) json_decode($file, null, 512, JSON_OBJECT_AS_ARRAY);

    for ($i = 0; $i < count($message); $i++) {
        if ($message[$i]['message'] == $data) {
            array_splice($message, $i, 1);
            file_put_contents($path, json_encode($message, JSON_PRETTY_PRINT));
            return 'succes';
        }
    }
    return 'failed';
}

echo delete($_POST['delete']);