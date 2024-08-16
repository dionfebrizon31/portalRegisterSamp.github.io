<?php include "config/domain.php" ?>
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-50 p-4  ">
        <!-- <div class="container mt-2">
         
        </div> -->
        <div class="row">
                <p>Referral Code
                    Ajak teman kamu bermain di Padang Gamer RolePlay, dapatkan hadiah!. Berikan link ini ke teman kamu
                    saat
                    mendaftar:

            </div>
        <div class="col-md-4">
            <div class="input-group">

                <input type="text" class="form-control"
                    value=" <?php echo $domain ?>/ref.php?r=<?php echo $_SESSION['ucp']; ?>" id="textToCopy"
                    aria-label="Masukkan teks di sini" readonly>
                <button class="btn btn-primary" type="button" onclick="copyText()">Tombol</button>
            </div>
        </div>

        <script>
            function copyText() {
                var copyText = document.getElementById("textToCopy");
                copyText.select();
                document.execCommand("copy");
                alert("Teks telah di-copy: " + copyText.value);
            }
        </script>
        Untuk informasi lebih lanjut, kamu bisa baca informasi di sini.
        </p>
        <h6 class="mb-4">List Referal</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ucp</th>
                    <th scope="col">Charackter</th>

                    <th scope="col">Level</th>
                    <th scope="col">CS</th>
                </tr>
            </thead>
            <tbody>


                <?php
                include "config/Function.php";
                include "config/config.php";

                $db = new database();
                $no = 1;

                // Ambil nilai reff dari session
                $reff = $_SESSION['ucp'];

                // Query untuk mengambil data dari tabel playerucp berdasarkan nilai reff
                $query_playerucp = "SELECT * FROM playerucp WHERE reff = '$reff'";
                $result_playerucp = mysqli_query($con, $query_playerucp);

                // Periksa apakah query berhasil dieksekusi
                if ($result_playerucp) {
                    // Lakukan perulangan untuk menampilkan data
                    while ($x = mysqli_fetch_assoc($result_playerucp)) {

                        ?>

                        <tr>
                            <td><?php echo $no++; ?></td>

                            <td><?php echo $x['ucp']; ?></td>
                            <?php
                            // SQL query untuk mengambil data dari tabel players berdasarkan nilai ucp
                            $sql_players = "SELECT * FROM players WHERE ucp = '" . $x['ucp'] . "'";
                            $result_players = mysqli_query($con, $sql_players);

                            // Periksa apakah query berhasil dieksekusi
                            if ($result_players) {
                                // Ambil data dari hasil query
                                $z = mysqli_fetch_assoc($result_players);
                                echo "<td>" . $z['username'] . "</td>";
                                // Tampilkan username dari hasil query
                                echo "<td>" . $z['level'] . "</td>";
                                if ($z['characterstory'] == 1) {
                                    echo "<td> Sudah </td>";
                                } else {
                                    echo "<td>belum</td>";

                                }

                            }


                            // Menggunakan fungsi countRowsInTable untuk menghitung jumlah baris dalam tabel 'users'
                    

                            ?>
                        </tr>
                        <?php
                    }
                }

                ?>
            </tbody>

        </table>
        <div>
            <?php
            $totalRows = $db->countRowsInTable('playerucp', 'reff', $reff);
            echo "Total Invite " . $totalRows;
            ?>

        </div>

    </div>
</div>