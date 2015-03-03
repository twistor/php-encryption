<?php

require_once('Crypto.php');

$key = Crypto::CreateNewRandomKey();
$msg = "Hello";
$ct = Crypto::Encrypt($msg, $key);
$ct[0] = 'a';
try {
Crypto::Decrypt($ct, $key);
} catch (InvalidCiphertextException $e) {
    echo "CAUGHT\n";
}
try {
Crypto::Decrypt($ct, $key);
} catch (InvalidCiphertextException $e) {
    echo "CAUGHT\n";
}
Crypto::Decrypt($ct, $key);
