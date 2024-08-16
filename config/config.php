<?php

$host = "localhost";
$userhos = "root";
$password = "";
$database = "rulzz";
$domain = 'http://localhost:8080/pgrp/';
//KONVERSI PHP KE PHP 7
// Membuat koneksi
$con = mysqli_connect($host, $userhos, $password, $database);

// Memeriksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>