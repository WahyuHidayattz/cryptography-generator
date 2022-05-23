<?php

function lookup($lookup, $array)
{
    $res = "";
    foreach ($array as $key => $value) {
        if ($lookup == $key) {
            $res = $value;
        }
    }
    return $res == "" ? $lookup : $res;
}

$def_char = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

$text = 'wahyu hidayat';
$key = 'aku';

$arr_text = str_split($text);
$arr_key = str_split($key);

$output = [];
foreach ($arr_text as $data) {
    foreach ($arr_key as $key) {
        $output[] = lookup($data, $key);
    }
}
