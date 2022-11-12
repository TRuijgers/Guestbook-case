<?php

function delete(string $data) : string {
    $path = '../berichten/berichten.json';
    $file = file_get_contents($path);
    $test = (array) json_decode($file, null, 512, JSON_OBJECT_AS_ARRAY);

    for ($i = 0; $i < count($test); $i++) {
        if ($test[$i]['message'] == $data) {
            array_splice($test, $i, 1);
            file_put_contents($path, json_encode($test, JSON_PRETTY_PRINT));
            return 'succes';
        }
    }
    return 'failed';
}

echo delete($_POST['delete']);