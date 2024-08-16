<?php
// include "../config/config.php";
// include "../config/fction.php";
// if (isset($_POST['Register'])) {
//   $email = $_POST['email'];
//   $pass1 = $_POST['password'];
//   $pass2 = $_POST['konfirmasi_password'];
//   echo "email $email";
//   echo "pw ;$pass1";
//   echo "pw 2$pass2";

//   // Periksa apakah email sudah terdaftar
//   $query = "SELECT * FROM playerucp WHERE email = '$email'";
//   $result = mysqli_query($con, $query);
//   if (mysqli_num_rows($result) > 0) {

//     echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
//     echo '<script>';
//     echo 'Swal.fire({
//                 title: "Registration Failed",
//                 text: "Failed to register. Email Sudah Terdaftar!!.",
//                 icon: "error",
//                 showCancelButton: false,
//                 confirmButtonText: "OK",
//                 closeOnConfirm: false
//             }).then((result) => {
//                 if (result.isConfirmed) {
//                     window.location.href = "../index.php?page=register";
//                 }
//             })';
//     echo '</script>';
//     // header("Location: ../index.php?page=register");
//     // echo "<script>alert('NIS sudah terdaftar');</script>";
//     exit();
//   } else {
//     echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
//     echo '<script>';
//     echo 'Swal.fire({
//                 title: "Successfully Registered",
//                 icon: "success",
//                 showCancelButton: false,
//                 confirmButtonText: "OK",
//                 closeOnConfirm: false
//             }).then((result) => {
//                 if (result.isConfirmed) {
//                     window.location.href = "../index.php?page=register";
//                 }
//             })';
//     echo '</script>';
//   }
//   // Periksa apakah password sama dengan konfirmasi password
//   if ($pass1 !== $pass2) {
//     // Password tidak cocok, kembali ke halaman registrasi dengan pesan error
//     header("Location: ../index.php?page=register");
//     exit();
//   }

//   // Hash password menggunakan MD5
//   // $hashed_pass1 = md5($pass1);

//   // Generate random number
//   $random_number = mt_rand(111111, 999999);
//   $nilaikey = $random_number;
//   // Encrypt email dan password
//   $encrypted_email = encrypt($email, $nilaikey);
//   $encrypted_password = encrypt($pass1, $nilaikey);
//   echo "<br>email: $encrypted_email ";
//   echo "<br>email: $encrypted_password ";
//   if (isset($_GET['reff']) && !empty($_GET['reff'])) {
//     $reffku = $_GET['reff'];
//     echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
//     echo '<script>';
//     echo 'Swal.fire({
//                 title: "Successfully Registered",
//                 icon: "success",
//                 showCancelButton: false,
//                 confirmButtonText: "OK",
//                 closeOnConfirm: false
//             }).then((result) => {
//                 if (result.isConfirmed) {
//                     window.location.href = "../index.php?page=verify&e=' . $encrypted_email . '&tkps=' . $encrypted_password . '&token=' . $nilaikey . '&reff=' . $reffku . '";
//                 }
//             })';
//     echo '</script>';
//   } else {
//     echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
//     echo '<script>';
//     echo 'Swal.fire({
//                 title: "Successfully Registered",
//                 icon: "success",
//                 showCancelButton: false,
//                 confirmButtonText: "OK",
//                 closeOnConfirm: false
//             }).then((result) => {
//                 if (result.isConfirmed) {
//                     window.location.href = "../index.php?page=verify&e=' . $encrypted_email . '&tkps=' . $encrypted_password . '&token=' . $nilaikey . '";
//                 }
//             })';
//     echo '</script>';
//   }
//   // if (isset($_GET['reff']) && !empty($_GET['reff'])) {
//   //   $reffku = $_GET['reff'];
//   //   header("Location: ../index.php?page=verify&e=$encrypted_email&tkps=$encrypted_password&token=$nilaikey&reff=$reffku");

//   // } else {
//   //   header("Location: ../index.php?page=verify&e=$encrypted_email&tkps=$encrypted_password&token=$nilaikey");
//   // }



// } else {
// }

?>