<?php
function encrypt($data, $key) {
    // Ubah kunci menjadi 16 karakter untuk AES-128, 24 karakter untuk AES-192, dan 32 karakter untuk AES-256
    $key = hash('sha256', $key, true);
    
    // Buat IV (Initialization Vector)
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    
    // Enkripsi data menggunakan AES-256-CBC dengan kunci dan IV yang dibuat
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    
    // Gabungkan IV dengan data yang telah dienkripsi
    $result = base64_encode($iv . $encrypted);
    
    return $result;
}

// Fungsi untuk mendekripsi data
function decrypt($data, $key) {
    // Ubah kunci menjadi 16 karakter untuk AES-128, 24 karakter untuk AES-192, dan 32 karakter untuk AES-256
    $key = hash('sha256', $key, true);
    
    // Dekode data dari format base64
    $data = base64_decode($data);
    
    // Ambil IV (Initialization Vector) dari data yang didecode
    $iv_size = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($data, 0, $iv_size);
    $encrypted = substr($data, $iv_size);
    
    // Dekripsi data menggunakan AES-256-CBC dengan kunci dan IV yang diambil
    $decrypted = openssl_decrypt($encrypted, 'aes-256-cbc', $key, 0, $iv);
    
    return $decrypted;
}



?>