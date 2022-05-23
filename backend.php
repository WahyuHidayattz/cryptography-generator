<?php

// global fungsi untuk mempermudah 

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

// inisialisasi variabel

$plaint_text = "";
$char = "B";
$error = false;
$def_char = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$jenis = '';

// aksi ketika tombol encyrpt di tekan

if (isset($_POST['input_encrypt'])) {
    $plaint_text = $_POST['input_plaint_text'];
    $char = strtoupper($_POST['input_char']);
    $jenis = 'encrypt';

    if ($char == "") {
        $error = true;
        $error_message = "Harap masukan Char Pengganti Huruf A !";
        return false;
    }

    $index = strcspn($def_char, $char);
    $char_value = strpbrk($def_char, $char) . substr($def_char, 0, $index);
    $char_array = array_combine(str_split($def_char), str_split($char_value));

    $char_in = str_split(strtoupper($plaint_text));
    $char_out = [];
    foreach ($char_in as $data) {
        $char_out[] = lookup($data, $char_array);
    }
    $display_char = implode($char_out);
}

// aksi ketika tombol decrypt ditekan

if (isset($_POST['input_decrypt'])) {
    $plaint_text = $_POST['input_plaint_text'];
    $char = strtoupper($_POST['input_char']);
    $jenis = 'decrypt';

    if ($char == "") {
        $error = true;
        $error_message = "Harap masukan Char Pengganti Huruf A !";
        return false;
    }

    $array_char = str_split($def_char);
    $result_text  = [];
    foreach ($array_char as $value) {
        // print_r("[A = " . $value . "] <br>");
        $index = strcspn($def_char, $value);
        $char_value = strpbrk($def_char, $value) . substr($def_char, 0, $index);
        $char_array = array_combine(str_split($char_value), str_split($def_char));

        $char_in = str_split(strtoupper($plaint_text));
        $char_out = [];
        foreach ($char_in as $data) {
            $char_out[] = lookup($data, $char_array);
        }
        $display_char = implode($char_out);
        // print_r(strtoupper($display_char . "<br>"));

        $result_text["[A = " . $value . "]"][] = strtoupper($display_char);
    }

    // $array_encrypt = [];
    // foreach ($def_array as $char) {
    //     $index = strcspn($def_char, $char);
    //     $char_value = strpbrk($def_char, $char) . substr($def_char, 0, $index);
    //     $char_array = array_combine(str_split($char_value), str_split($def_char));
    //     $array_encrypt[] = $char_array;
    // }

    // print_r($array_encrypt);
}
