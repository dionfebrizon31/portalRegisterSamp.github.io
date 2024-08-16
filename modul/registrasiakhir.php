<?php

include "config/Function.php";
include "config/config.php";
include "config/fction.php";

// Ambil data dari SEssion
// $encryptedemail = $_GET['e'];
// $passget = $_GET['tkps'];
// $key = $_GET['token'];


// Ambil data dari SEssion
$encryptedemail = $_SESSION['emailen'];
$passget = $_SESSION['passwordencr'];
// $key = $_GET['token'];
$key = $_SESSION['regkey'];

// $emailenSes= $_SESSION['emailen'];
// $passwordSes= $_SESSION['passwordencr'];
// $keySes= $_SESSION['regkey'];
// $_SESSION['regreff']
// Dekripsi data

// // Ambil data dari URL
// $encryptedemail = $_GET['e'];
// $passget = $_GET['tkps'];
// $key = $_GET['token'];

// Dekripsi data
$encrypted_email = decrypt($encryptedemail, $key);
$decrypted_data = decrypt($passget, $key);

// // Tampilkan hasil dekripsi
// echo "Decrypted Email: $encrypted_email <br>";
// echo "Decrypted password: $decrypted_data <br>";
// echo "Enkripsi Email: $emailenSes <br>";
// echo "Enkripsi key: $key <br>";

// Jika formulir dikirimkan
if (isset($_POST['RegisterVery'])) {
    include "modul/FormKosong2.php";
    // Ambil data dari formulir
    $passwordpos = $_POST['password'];
    $reffku = $_POST['referal'];
    $usernameku = $_POST['usernameku'];
    $db = new database();

    // Pengecekan jika password tidak sesuai dengan yang diberikan sebelumnya
    if ($passwordpos != $decrypted_data) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>';
        echo 'Swal.fire({
                 title: "Registration Failed",
                 text: "Password Tidak Sama Dengan Password Email Sebelumnya!!",
                 icon: "error",
                 showCancelButton: false,
                 confirmButtonText: "OK",
                 closeOnConfirm: false
             }).then((result) => {
                 if (result.isConfirmed) {
                     window.location.href = "index.php?page=verify&e=' . $encryptedemail . '&tkps=' . $passget . '&token=' . $key . '&reff=' . $reffku . '";
                 }
             })';
        echo '</script>';

        // header("Location: index.php?page=verify&e=$encryptedemail&tkps=$passget&token=$key&reff=$reffku");
        // exit(); // Pastikan untuk menghentikan eksekusi skrip setelah pengalihan
    } else {
        // Pengecekan apakah email sudah terdaftar sebelumnya
        $query = "SELECT * FROM playerucp WHERE ucp = '$usernameku'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            // Email sudah terdaftar, balik ke formulir dengan pesan kesalahan
            include "modul/FormKosong2.php";
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>';
            echo 'Swal.fire({
                   title: "Registration Failed",
                   text: "Ucp already registered!",
                   icon: "error",
                   showCancelButton: false,
                   confirmButtonText: "OK",
                   closeOnConfirm: false
               }).then((result) => {
                   if (result.isConfirmed) {
                       window.location.href = "index.php?page=verify&e=' . $encryptedemail . '&tkps=' . $passget . '&token=' . $key . '&reff=' . $reffku . '";
                   }
               })';
            echo '</script>';
            // exit(); // Pastikan untuk menghentikan eksekusi skrip setelah menampilkan pesan
        } else {
            // Jika email belum terdaftar, lanjutkan dengan proses registrasi
            // Generate salt
            $pSalt = '';
            for ($i = 0; $i < 16; $i++) {
                $pSalt .= chr(rand(0, 94) + 33);
            }

            // Lakukan hashing menggunakan SHA256 enkripsi
            $pHashedSalt1 = strtoupper(hash("sha256", $passwordpos . $pSalt));
            $pSaltString = substr($pSalt, 0, 16);

            // Tampilkan hasil hashing
            // echo "pSaltString Salt: $pSaltString <br>";
            // echo "Passwordget: $passget <br>";
            // echo "Password: $passwordpos <br>";
            // echo "Hashed Salt: $pHashedSalt1 <br>";
            // echo "Email Salt: $encrypted_email <br>";

            $sqliref = "INSERT INTO `referal` (`ucp`, `inviteucp`) VALUES ('$reffku','$usernameku')";
            $result2 = mysqli_query($con, $sqliref);
            // Query untuk insert data ke database
            $sql = "INSERT INTO `playerucp` (`ucp`, `verifycode`, `password`, `salt`, `email`,`reff`) 
           VALUES ('$usernameku', '$key', '$pHashedSalt1', '$pSaltString', '$encrypted_email','$reffku')";

            // Jalankan query
            $result = mysqli_query($con, $sql);

            // Jika query berhasil dijalankan, tampilkan pesan sukses
            if ($result && $result2) {
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>';
                echo 'Swal.fire({
                   title: "Successfully Registered",
                   icon: "success",
                   showCancelButton: false,
                   confirmButtonText: "OK",
                   closeOnConfirm: false
               }).then((result) => {
                   if (result.isConfirmed) {
                    window.location.href = "index.php?page=login";
                   }
               })';
                echo '</script>';
                include "modul/FormKosong1.php";

                unset($_SESSION['emailen']);
                unset($_SESSION['passwordencr']);
                unset($_SESSION['regkey']);
                unset($_SESSION['regreff']);
            } else {
                // Jika query gagal, tampilkan pesan kesalahan
                echo "Error: " . mysqli_error($con);
            }
        }


    }


} else {
    // Jika formulir tidak dikirimkan
    // include "../config/safety.php";
}

?>