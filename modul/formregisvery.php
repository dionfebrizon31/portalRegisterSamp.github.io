<?php

include "config/Function.php";
include "config/config.php";
include "config/fction.php";

// // Ambil data dari URL
// $encryptedemail = $_GET['e'];
// $passget = $_GET['tkps'];
// // $key = $_GET['token'];
$key =  $_SESSION['regkey'];

$emailenSes= $_SESSION['emailen'];
// $passwordSes= $_SESSION['passwordencr'];
// // $keySes= $_SESSION['regkey'];
// // $_SESSION['regreff']
// // Dekripsi data
$encrypted_emailenku = decrypt($emailenSes, $key);
// $decrypted_PasswordSes = decrypt($passwordSes, $key);

$encrypted_email = decrypt($emailenSes, $key);
// $decrypted_data = decrypt($passwordSes, $key);

// // Tampilkan hasil dekripsi
// // echo "Decrypted Email: $encrypted_emailenku <br>";
// // echo "Decrypted password: $decrypted_PasswordSes <br>";
// // echo "Enkripsi Email: $encryptedemail <br>";
// // echo "Enkripsi key: $key <br>";

// // Jika formulir dikirimkan
// if (isset($_POST['RegisterVery'])) {
//   // Ambil data dari formulir
//   $passwordpos = $_POST['password'];
//   $reffku = $_POST['referal'];
//   $usernameku = $_POST['usernameku'];
//   $db = new database();

//   // Pengecekan jika password tidak sesuai dengan yang diberikan sebelumnya
//   if ($passwordpos != $decrypted_data) {
//     echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
//     echo '<script>';
//     echo 'Swal.fire({
//                  title: "Registration Failed",
//                  text: "Password Tidak Sama Dengan Password Email Sebelumnya!!",
//                  icon: "error",
//                  showCancelButton: false,
//                  confirmButtonText: "OK",
//                  closeOnConfirm: false
//              }).then((result) => {
//                  if (result.isConfirmed) {
//                      window.location.href = "index.php?page=verify&e=' . $encryptedemail . '&tkps=' . $passget . '&token=' . $key . '&reff=' . $reffku . '";
//                  }
//              })';
//     echo '</script>';
//     // header("Location: index.php?page=verify&e=$encryptedemail&tkps=$passget&token=$key&reff=$reffku");
//     // exit(); // Pastikan untuk menghentikan eksekusi skrip setelah pengalihan
//   } else {
//     // Pengecekan apakah email sudah terdaftar sebelumnya
//     $query = "SELECT * FROM playerucp WHERE ucp = '$usernameku'";
//     $result = mysqli_query($con, $query);

//     if (mysqli_num_rows($result) > 0) {
//       // Email sudah terdaftar, balik ke formulir dengan pesan kesalahan
//       include "modul/FormKosong2.php";
//       echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
//       echo '<script>';
//       echo 'Swal.fire({
//                    title: "Registration Failed",
//                    text: "Ucp already registered!",
//                    icon: "error",
//                    showCancelButton: false,
//                    confirmButtonText: "OK",
//                    closeOnConfirm: false
//                }).then((result) => {
//                    if (result.isConfirmed) {
//                        window.location.href = "index.php?page=verify&e=' . $encryptedemail . '&tkps=' . $passget . '&token=' . $key . '&reff=' . $reffku . '";
//                    }
//                })';
//       echo '</script>';
//       exit(); // Pastikan untuk menghentikan eksekusi skrip setelah menampilkan pesan
//     } else {
//       // Jika email belum terdaftar, lanjutkan dengan proses registrasi
//       // Generate salt
//       $pSalt = '';
//       for ($i = 0; $i < 16; $i++) {
//         $pSalt .= chr(rand(0, 94) + 33);
//       }

//       // Lakukan hashing menggunakan SHA256 enkripsi
//       $pHashedSalt1 = strtoupper(hash("sha256", $passwordpos . $pSalt));
//       $pSaltString = substr($pSalt, 0, 16);

//       // Tampilkan hasil hashing
//       // echo "pSaltString Salt: $pSaltString <br>";
//       // echo "Passwordget: $passget <br>";
//       // echo "Password: $passwordpos <br>";
//       // echo "Hashed Salt: $pHashedSalt1 <br>";
//       // echo "Email Salt: $encrypted_email <br>";

//       $sqliref = "INSERT INTO `referal` (`ucp`, `inviteucp`) VALUES ('$reffku','$usernameku')";
//       $result2 = mysqli_query($con, $sqliref);
//       // Query untuk insert data ke database
//       $sql = "INSERT INTO `playerucp` (`ucp`, `verifycode`, `password`, `salt`, `email`,`reff`) 
//            VALUES ('$usernameku', '$key', '$pHashedSalt1', '$pSaltString', '$encrypted_email','$reffku')";

//       // Jalankan query
//       $result = mysqli_query($con, $sql);

//       // Jika query berhasil dijalankan, tampilkan pesan sukses
//       if ($result && $result2) {
//         echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
//         echo '<script>';
//         echo 'Swal.fire({
//                    title: "Successfully Registered",
//                    icon: "success",
//                    showCancelButton: false,
//                    confirmButtonText: "OK",
//                    closeOnConfirm: false
//                }).then((result) => {
//                    if (result.isConfirmed) {
//                     window.location.href = "index.php?page=login";
//                    }
//                })';
//         echo '</script>';
//       } else {
//         // Jika query gagal, tampilkan pesan kesalahan
//         echo "Error: " . mysqli_error($con);
//       }
//     }


//   }


// } else {
//   // Jika formulir tidak dikirimkan
//   // include "../config/safety.php";
// }

?>

<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
    rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Design by foolishdeveloper.com -->
  <link rel="stylesheet" href="css/register.css">
  <title>Padang Gamers Roleplay</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <!--Stylesheet-->
  <style media="screen">


  </style>
</head>

<body>
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <!-- <form class="formku" method="POST" action="./index.php?page=accepregister"> -->
  <form class="formku" method="POST" action="index.php?page=register-akhir">
    <h6>Pendaftaran Account UCP</h6>
    <div class="mb-3">
      <label for="usernameku" class="form-label">username</label>
      <input type="text" class="form-control" id="usernameku" name="usernameku" placeholder="Masukkan username atau UCP"
        required>
    </div>
    <div class="mb-3">
      <label class="form-label" for="emailku">Alamat Email</label>

      <!-- <input class="form-control" type="email" name="emailku" id="emailku" value=""> -->
      <input class="form-control" type="email" name="emailku" id="emailku" placeholder="Email Otomatis Keisi"
        value="<?php echo $encrypted_email; ?>" style="color:white;background-color:black;" disabled >
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="text" class="form-control" id="password" name="password" placeholder=" Masukkan password" required>
    </div>
    <div class="mb-3">
      <label for="referal" class="form-label">Referal</label>
      <input type="text" class="form-control" id="referal" name="referal" placeholder="Masukkan referal" <?php
      if (isset($_GET['reff'])) {
        echo "value='" . $_GET['reff'] . "' style='color:white;background-color:black;' disabled";

      } else {
        echo "value=''";
      }
      ?>>

    </div>

    <div class="btnku">
      <input class="btn btn-success m-2" type="submit" name="RegisterVery" value="Register">
      <a class="btn btn-light m-2" href="./index.php?page=login" type="button" class="btn btn-secondary">Log in</a>
    </div>
  </form>
</body>

</html>