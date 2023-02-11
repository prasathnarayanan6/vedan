<?php

$plaintext = 'Vedanta@Xyma_19';
$password = 'vedanta256';

// CBC has an IV and thus needs randomness every time a message is encrypted
$method = 'aes-256-cbc';

// Must be exact 32 chars (256 bit)
// You must store this secret random key in a safe place of your system.
$key = substr(hash('sha256', $password, true), 0, 32);
echo "Password:" . $password . "\n";

// Most secure key
//$key = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));

// IV must be exact 16 chars (128 bit)
$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

// Most secure iv
// Never ever use iv=0 in real life. Better use this iv:
// $ivlen = openssl_cipher_iv_length($method);
// $iv = openssl_random_pseudo_bytes($ivlen);

// av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
$encrypted = base64_encode(openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv));

// My secret message 1234
$decrypted = openssl_decrypt(base64_decode($encrypted), $method, $key, OPENSSL_RAW_DATA, $iv);

// echo 'plaintext=' . $plaintext . "\n";
// echo 'cipher=' . $method . "\n";
echo 'encrypted to: ' . $encrypted . "\n";
echo 'decrypted to: ' . $decrypted . "\n\n";

$MAC = exec('getmac');
  
// Storing 'getmac' value in $MAC
$MAC = strtok($MAC, ' ');
  
// Updating $MAC value using strtok function, 
// strtok is used to split the string into tokens
// split character of strtok is defined as a space
// because getmac returns transport name after
// MAC address   
echo "MAC address of Server is: $MAC";

system('ipconfig/all');
$a = ob_get_contents();
ob_clean();
$mac = substr($a,(strpos($a,"physical")+36),17);
echo $mac;