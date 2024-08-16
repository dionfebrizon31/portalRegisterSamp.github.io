<?php
// include "config/Function.php";

if (isset($_POST['Register'])) {
    $emai = $_POST['email'];
    $pass1 = $_POST['password'];
    $pass2 = $_POST['konfirmasi_password'];

    // Periksa apakah email sudah terdaftar
    $query = "SELECT * FROM playerucp WHERE email = '$email'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // Email sudah terdaftar, kembali ke halaman registrasi dengan pesan error
        header("Location: index.php?page=register");
        exit();
    }
    

    // Periksa apakah password sama dengan konfirmasi password
    if ($pass1 !== $pass2) {
        // Password tidak cocok, kembali ke halaman registrasi dengan pesan error
        header("Location: index.php?page=register");
        exit();
    }
   
    // Hash password menggunakan MD5
    // $hashed_pass1 = md5($pass1);

    // Generate random number
    $random_number = mt_rand(111111, 999999);
    $nilaikey =$random_number;
    // Encrypt email dan password
    // $encrypted_email = encrypt($email, $nilaikey);
    // $encrypted_password = encrypt($hashed_pass1, $nilaikey);

    // if (isset($_GET['reff']) && !empty($_GET['reff'])) {
    //     $reffku = $_GET['reff'];
    //     header("Location: index.php?page=createregister&e=$email&tkps=$pass1&token=$nilaikey&reff=$reffku");
        
    //   } else {
    //     header("Location: index.php?page=createregister&e=$email&tkps=$pass1&token=$nilaikey");
    // }
} else {
    // include "../config/safety.php";
}
?>