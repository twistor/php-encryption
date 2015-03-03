<?php

require_once('Crypto.php');

if (count($argv) != 2) {
    die("Usage: php safe_exceptions.php <type>\n");
}

switch ($argv[1]) {
case "invalid_ciphertext":
    $key = Crypto::CreateNewRandomKey();
    Crypto::Decrypt("bad", $key);
    break;
case "tampered_ciphertext":
    $key = Crypto::CreateNewRandomKey();
    $ciphertext = Crypto::Encrypt("Hello!", $key);
    $ciphertext[strlen($ciphertext) - 1] = 'a';
    $ciphertext[strlen($ciphertext) - 2] = 'b';
    $ciphertext[strlen($ciphertext) - 3] = 'c';
    Crypto::Decrypt($ciphertext, $key);
    break;
case "bad_key":
    Crypto::Encrypt("Hello", "BadKey");
    break;
default:
    die("Bad <type>\n");
}
