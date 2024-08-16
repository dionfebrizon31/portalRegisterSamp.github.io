
<?php
// $domain = "localhost:8080/pgrp";

// Fungsi untuk mengenkripsi teks menggunakan AES-256
// Fungsi untuk mengenkripsi data
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/vendor/autoload.php'; // Pastikan path ini sesuai dengan instalasi PHPMailer Anda




class database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "rulzz";
    private $connection;

    // Constructor untuk membuat koneksi
    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Fungsi untuk menghitung jumlah baris dalam sebuah tabel
    public function countRowsInTable($tableName, $columnName, $searchValue)
    {
        // Escape search value to prevent SQL injection
        $searchValue = $this->connection->real_escape_string($searchValue);

        // Query to count rows based on condition
        $query = "SELECT COUNT(*) AS total_rows FROM $tableName WHERE $columnName = '$searchValue'";

        // Execute query
        $result = $this->connection->query($query);

        // Check if query executed successfully
        if ($result) {
            // Fetch result
            $row = $result->fetch_assoc();
            // Return total rows
            return $row['total_rows'];
        } else {
            // If query failed, return 0
            return 0;
        }
    }

    // Fungsi untuk menutup koneksi
    public function closeConnection()
    {
        $this->connection->close();
    }
    function selectdb($con, $tb)
    {
        $hasil = array(); // Inisialisasi array untuk menyimpan hasil
        $data = mysqli_query($con, $tb); // Query SQL untuk mengambil data dari tabel
        while ($d = mysqli_fetch_array($data)) { // Looping untuk mengambil setiap baris hasil query
            $hasil[] = $d; // Menambahkan baris hasil ke array
        }
        return $hasil; // Mengembalikan hasil
    }
    function tampil_data($con, $tb)
    {
        $hasil = array(); // Inisialisasi array untuk menyimpan hasil
        $data = mysqli_query($con, "SELECT * FROM $tb"); // Query SQL untuk mengambil data dari tabel
        while ($d = mysqli_fetch_array($data)) { // Looping untuk mengambil setiap baris hasil query
            $hasil[] = $d; // Menambahkan baris hasil ke array
        }
        return $hasil; // Mengembalikan hasil
    }
    function tampilPlayerByReff($con, $reff)
    {
        $output = ''; // Untuk menampung hasil output HTML

        $no = 1;
        // Query untuk mengambil data dari tabel playerucp berdasarkan nilai reff
        $query_playerucp = "SELECT * FROM playerucp WHERE reff = '$reff'";
        $result_playerucp = mysqli_query($con, $query_playerucp);

        // Periksa apakah query berhasil dieksekusi
        if ($result_playerucp) {
            // Lakukan perulangan untuk menampilkan data
            while ($x = mysqli_fetch_assoc($result_playerucp)) {
                $output .= '<tr>';
                $output .= '<td>' . $no++ . '</td>';
                $output .= '<td>' . $x['ucp'] . '</td>';
                $output .= '<td></td>';
                $output .= '<td>' . $x['plate'] . '</td>';
                $output .= '</tr>';
            }
        } else {
            // Handle jika terjadi kesalahan dalam eksekusi query
            $output = "Error: " . mysqli_error($con);
        }

        return $output;
    }
    function decimalToDollar($decimalValue)
    {
        // Mengonversi nilai desimal menjadi format nilai dollar dengan koma di tengah
        $dollarFormat = '$' . number_format($decimalValue / 100, 2, ',', '.');
        return $dollarFormat;
    }

    function IsValidRoleplayName($name)
    {
        // Memeriksa apakah nama kosong atau tidak mengandung karakter '_'
        if (empty($name) || strpos($name, '_') === false) {
            return false;
        }

        $len = strlen($name);

        for ($i = 0; $i < $len; $i++) {
            // Memeriksa karakter pertama harus huruf besar
            if ($i == 0 && ($name[$i] < 'A' || $name[$i] > 'Z')) {
                return false;
            }

            // Memeriksa karakter setelah '_' harus huruf besar
            if ($i != 0 && $i < $len && $name[$i] == '_' && ($name[$i + 1] < 'A' || $name[$i + 1] > 'Z')) {
                return false;
            }

            // Memeriksa apakah karakter valid (huruf besar, huruf kecil, '_', atau '.')
            if (($name[$i] < 'A' || $name[$i] > 'Z') && ($name[$i] < 'a' || $name[$i] > 'z') && $name[$i] != '_' && $name[$i] != '.') {
                return false;
            }
        }
        return true;
    }
    function getUserIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    function generateUniqueRandomBrek($con)
    {
        do {
            $randomNbrek = rand(111111, 999999);
            $sqlku = "SELECT * FROM players WHERE brek = '$randomNbrek'";
            $resultbrek = mysqli_query($con, $sqlku);
        } while (mysqli_num_rows($resultbrek) > 0);

        return $randomNbrek;
    }
    function isOver15YearsOld($birthDate)
    {
        // Konversi tanggal lahir menjadi objek DateTime
        $birthDate = new DateTime($birthDate);
        // Dapatkan tanggal saat ini
        $currentDate = new DateTime();
        // Hitung selisih antara tanggal lahir dan tanggal saat ini
        $age = $currentDate->diff($birthDate)->y;

        // Periksa apakah umur lebih dari 15 tahun
        return $age > 16;
    }

    function showAlert($title, $text, $icon, $redirectUrl)
    {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>';
        echo 'Swal.fire({
                 title: "' . $title . '",
                 text: "' . $text . '",
                 icon: "' . $icon . '",
                 showCancelButton: false,
                 confirmButtonText: "OK",
                 closeOnConfirm: false
             }).then((result) => {
                 if (result.isConfirmed) {
                     window.location.href = "' . $redirectUrl . '";
                 }
                 else{
                    window.location.href = "' . $redirectUrl . '";
                }
             })';
        echo '</script>';
    }
    function checkPlayerExists($con, $usernamecreate)
    {
        // Melakukan query untuk mencari user dengan username yang cocok
        $sql = "SELECT * FROM `players` WHERE `username`= '$usernamecreate'";
        $query = mysqli_query($con, $sql);

        // Mengecek apakah ada hasil dari query
        $ketemu = mysqli_num_rows($query);

        if ($ketemu > 0) {
            // Mengambil data user jika ditemukan
            $r = mysqli_fetch_array($query);
            return array('status' => true, 'data' => $r);
        } else {
            // Mengembalikan status false jika user tidak ditemukan
            return array('status' => false, 'data' => null);
        }
    }
    function sendEmail($emailsend, $messagesend)
    {
        $mail = new PHPMailer();
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '3bcb01b382a478';
            $mail->Password = '68919d0b424978';

            // Sender and recipient settings
            $mail->setFrom('PG-RP@no-reply.com', 'PGRP');
            $mail->addAddress( $emailsend , 'User PG-RP');

            // Email content
            $mail->isHTML(false);
            $mail->Subject = 'Message from ' . $emailsend;
            $mail->Body = "You have received a new message from ($emailsend):\n\n$messagesend";

            // Send email
            if (!$mail->send()) {
                return 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } else {
                return 'Message has been sent';
            }
        } catch (Exception $e) {
            return "Message could not be sent. PHPMailer Error: {$mail->ErrorInfo}";
        }
    }



}
?>