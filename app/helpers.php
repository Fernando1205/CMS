<?php

function keyValueJson($json,$key) {
    if($json == null){
        return null;
    } else {
        $json = $json;
        $json = json_decode($json, true);
        if(array_key_exists($key, $json)){
            return $json[$key];
        } else {
            return null;
        }
    }
}
function getModulesArray() {
    return $a = [
        '0' => 'Productos',
        '1' => 'Blog'
    ];
}
