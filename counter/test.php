<?php

function generateUniqueCode() {
    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomAlphabet = $alphabet[rand(0, strlen($alphabet) - 1)] . $alphabet[rand(0, strlen($alphabet) - 1)] . $alphabet[rand(0, strlen($alphabet) - 1)];
    
    $numericPart = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

    return $randomAlphabet . $numericPart;
}

$code = generateUniqueCode();

echo $code;

?>