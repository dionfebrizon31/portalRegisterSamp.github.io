<?php

if (!isset($_SESSION['ucp'])) {
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        // Periksa nilai parameter 'page' untuk menentukan tindakan yang sesuai
        if ($page == "") {
            header("Location: index.php?page=login");
            exit; // Arahkan ke halaman login dan hentikan eksekusi skrip
        } elseif ($page == 'login') {
            // Lakukan sesuatu jika pengguna meminta halaman login
            include 'modul/formlogin.php';
            exit; // Hentikan eksekusi skrip setelah memuat form login
        } elseif ($page == 'verify') {
            // Lakukan sesuatu jika pengguna meminta halaman proses login
            include 'modul/formregisvery.php';
            exit;
        } elseif ($page == 'accepregister') {
            // Lakukan sesuatu jika pengguna meminta halaman proses login
            include 'modul/registerveryfy.php';
            exit;
        } elseif ($page == 'register') {
            // Lakukan sesuatu jika pengguna meminta halaman register

            include 'modul/formregister.php';
            exit; // Hentikan eksekusi skrip setelah memuat form registrasi
        } elseif ($page == 'register-awal') {
            // Lakukan sesuatu jika pengguna meminta halaman register

            include 'modul/registrasiawal.php';
            exit; // Hentikan eksekusi skrip setelah memuat form registrasi
        } elseif ($page == 'register-akhir') {
            // Lakukan sesuatu jika pengguna meminta halaman register

            include 'modul/registrasiakhir.php';
            exit; // Hentikan eksekusi skrip setelah memuat form registrasi
        }
    }
} else {
    // Jika sesi 'ucp' ada, arahkan pengguna ke halaman selanjutnya dengan menyertakan email dan key
    if (isset($_GET['email']) && isset($_GET['key'])) {
        $email = $_GET['email'];
        $key = $_GET['key'];
        header("Location: index.php?page=next_page&email=$email&key=$key");
        exit;
    } else {
    }

}
?>