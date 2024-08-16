<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "config/config.php";
include "config/Function.php";
// Menangkap data dari form
$ucp = $_SESSION['ucp'];
$email = $_SESSION['email'];

$usernamecreate = $_POST['username'];
$tanggalLahir = $_POST['tanggal'];
$gender = $_POST['Genderku'];
$reg_date = date(' Y-m-d  h:i:s');
$money = '250';
$dbku = new database();
$validbirthday = $dbku->isOver15YearsOld($tanggalLahir);
$validname = $dbku->IsValidRoleplayName($usernamecreate);
$DEFAULT_POS_X = '1744.3411';
$DEFAULT_POS_Y = '-1862.8655';
$DEFAULT_POS_Z = '13.3983';
$DEFAULT_POS_A = '270.0000';
$kepala = '100';
$perut = '100';
$lengankiri = '100';
$lengankanan = '100';
$kakikiri = '100';
$kakikanan = '100';
$randomrekuse = $dbku->generateUniqueRandomBrek($con);
$userIP = $dbku->getUserIP();


if ($gender === 'Male') {
    $skinselect = $_POST['skinMale'];

} else if ($gender === 'Female') {
    $skinselect = $_POST['skinFemale'];
} else if ($gender === '') {
    $skinselect = "";
}
$result = $dbku->checkPlayerExists($con, $usernamecreate);

if ($result['status']) {
    $dbku->showAlert("Registration Failed", "Nick Name Sudah ada", "error", "index.php?page=pgrp-acc");
} else {
    // User ditemukan, lakukan sesuatu dengan $result['data']
    if ($validname) {
        if ($validbirthday) {
            if ($skinselect) {
                if ($gender) {
                    $query = "INSERT INTO players 
                 (ucp,email,username,age,gender,reg_date, money , brek,posx, posy , posz ,posa , kepala, perut, lengankiri , lengankanan , kakikiri, kakikanan,ip)
          VALUES ('$ucp', '$email',  '$usernamecreate', '$tanggalLahir', '$skinselect', '$reg_date', '$money', '$randomrekuse', '$DEFAULT_POS_X', '$DEFAULT_POS_Y', '$DEFAULT_POS_Z', '$DEFAULT_POS_A', '$kepala', '$perut', '$lengankiri', '$lengankanan', '$kakikiri', '$kakikanan','$userIP')";
                    $result = mysqli_query($con, $query);
                    if ($result) {
                        $dbku->showAlert("Registration Sukses", "Pendaftaran Berhasil Silahkan Login jangan lupa /starterpack !!!", "success", "index.php?page=pgrp-acc");
                    } else {
                        $dbku->showAlert("Registration Failed", "Eror Simpan Coba Lagi !!!", "error", "index.php?page=pgrp-acc");
                    }

                } else {
                    $dbku->showAlert("Registration Failed", "Harap Memilih Skin yang disediakan !!!", "error", "index.php?page=pgrp-acc");
                }
            } else {
                $dbku->showAlert("Registration Failed", "Harap Memilih  Jenis Kelamin!!!", "error", "index.php?page=pgrp-acc");
            }

        } else {
            $dbku->showAlert("Registration Failed", "Umur Kurang dari 17 Tahun!", "error", "index.php?page=pgrp-acc");
        }

    } else {
        $dbku->showAlert("Registration Failed", "Bukan Nama Roleplay contoh: Vanja_Jostein!", "error", "index.php?page=pgrp-acc");
    }

}



// 
?>