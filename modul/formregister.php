<!DOCTYPE html>
<html lang="en">

<head>

  <!-- POP UP -->

  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <title>Padang Gamers Roleplay</title>
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
  <title>GRegister</title>

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
  <?
  // $key = random_int(111,999)
  ?>

  <!-- <form class="formku" method="POST" action="index.php?page=register-awal"> -->
  <form class="formku" method="POST" id="registerForm">
   
    <!-- <form class="formku" method="POST" action="modul/createregister.php"> -->
    <h6>Pendaftaran Account UCP</h6>
    <div class="mb-3">
      <label for="email" class="form-label">Alamat Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password"
        required>
    </div>
    <div class="mb-3">
      <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
      <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password"
        placeholder="Masukkan kembali password" required>
      <div id="message" class="mt-2"></div>
    </div>
    <div class="btnku">
      <!-- <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" /> -->
      <input class="btn btn-success m-2" type="submit" name="Register" value="Register">
      <a class="btn btn-light m-2" href="./index.php?page=login" type="button" class="btn btn-secondary">Log in</a>
    </div>
  </form>

</body>

</html>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const urlParams = new URLSearchParams(window.location.search);
            const reff = urlParams.get('reff');
            const form = document.getElementById('registerForm');
            let actionUrl = 'index.php?page=register-awal';

            if (reff) {
                actionUrl += '&reff=' + reff;
            }

            form.setAttribute('action', actionUrl);
        });
    </script>