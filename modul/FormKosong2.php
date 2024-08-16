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
    <form class="formku" method="POST">
        <h6>Pendaftaran Account UCP</h6>
        <div class="mb-3">
            <label for="usernameku" class="form-label">username</label>
            <input type="text" class="form-control" placeholder="Masukkan username atau UCP" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="emailku">Alamat Email</label>
            <input class="form-control" type="email" placeholder="Email Otomatis Keisi"
                value="<?php echo $encrypted_email; ?>" style="color:white;background-color:black;" disabled>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" placeholder=" Masukkan password">
        </div>

        <div class="mb-3">
            <label for="referal" class="form-label">Referal</label>
            <input type="text" class="form-control" placeholder="Masukkan referal" <?php
            if (isset($_GET['reff'])) {
                echo "value='" . $_GET['reff'] . "'";

            } else {
                echo "value=''";
            }
            ?>>

        </div>

        <div class="btnku">
            <input class="btn btn-success m-2" type="submit" value="Register">
            <a class="btn btn-light m-2" href="./index.php?page=login" type="button" class="btn btn-secondary">Log
                in</a>
        </div>
    </form>
</body>

</html>