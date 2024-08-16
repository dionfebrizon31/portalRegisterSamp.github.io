<?php
include "config/config.php";
include "config/fction.php"; // Periksa apakah file ini benar-benar diperlukan
include "config/Function.php";


echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';

if (isset($_POST['Register'])) {
    $email = $_POST['email'];
    $pass1 = $_POST['password'];
    $pass2 = $_POST['konfirmasi_password'];
    $db = new database();
    $nilaikey = mt_rand(111111, 999999);

    // Encrypt email and password
    $encrypted_email = encrypt($email, $nilaikey);
    $encrypted_password = encrypt($pass1, $nilaikey);

    // Check if email already exists
    $query = "SELECT * FROM playerucp WHERE email = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    include "modul/FormKosong1.php";

    if (mysqli_num_rows($result) > 0) {
        $reffku = isset($_GET['reff']) ? $_GET['reff'] : null;
        $redirectUrl = $reffku ? "index.php?page=register&reff=$reffku" : "index.php?page=register";
        $db->showAlert("Registration Failed", "Failed to register. Email already registered!", "error", $redirectUrl);
    } else {
        if ($pass1 !== $pass2) {
            $db->showAlert("Registration Failed", "Failed to register. Passwords do not match!", "error", "index.php?page=register");
        } else {
            $reffku = isset($_GET['reff']) ? $_GET['reff'] : null;
            $_SESSION['emailen'] = $encrypted_email;
            $_SESSION['passwordencr'] = $encrypted_password;
            $_SESSION['regkey'] = $nilaikey;
            $_SESSION['regreff'] = $reffku;

            $successMessage = $reffku ? "Successfully Registered With Reff $reffku" : "Successfully Registered";
            $redirectUrl = $reffku ? "index.php?page=verify&e=$encrypted_email&tkps=$encrypted_password&token=$nilaikey&reff=$reffku" : "index.php?page=verify&e=$encrypted_email&tkps=$encrypted_password&token=$nilaikey";
            $db->showAlert($successMessage, "", "success", $redirectUrl);
            $db->sendEmail($email,$domain."".$redirectUrl);

        }
    }
}

?>