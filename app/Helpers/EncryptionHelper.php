<?php

namespace App\Helpers;

class EncryptionHelper {
    function encryptPassword($password, $key) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($password, 'aes-256-cbc', $key, 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }
    
    function decryptPassword($encryptedPassword, $key) {
        list($encryptedPassword, $iv) = explode('::', base64_decode($encryptedPassword), 2);
        return openssl_decrypt($encryptedPassword, 'aes-256-cbc', $key, 0, $iv);
    }
}
